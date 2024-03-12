<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SoapClient;
use SoapHeader;
use stdClass;

class CarCopyController extends Controller
{


    private $user;
    private $apiKey;
    private $wsdlFile;
    private $language;
    private $client;
    private $CCAPI_LANG;
    private $store_settings;
    public static $CCAPI_CACHEDIR;
    public static $CCAPI_CACHETIME;


    public function __construct()
    {

        if (Auth::check()) {
            $this->user = Auth::user();
            $this->store_settings = Store::where('id', $this->user->current_store)->first();
            \App::setLocale(isset($this->store_settings->lang) ? $this->store_settings->lang : 'en');
        }
        
        $this->language = \App::getLocale();
        $this->apiKey = $this->store_settings["car_hpm_api_key"];//"fc4d4179697cb179524809cb96fc53bf";
        $this->wsdlFile = "http://www.car-copy.com/ws/carapi/service.wsdl";
        ini_set("soap.wsdl_cache_enabled", "1");

        // define('CCAPI_CACHEDIR', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR);


        CarCopyController::$CCAPI_CACHEDIR = storage_path('uploads/carcopycache/cache/');
        CarCopyController::$CCAPI_CACHETIME = 3600; // Eine Stunde Cachen

        // define('CCAPI_CACHEDIR', storage_path('uploads/carcopycache/cache/'));
        // define('CCAPI_CACHETIME', 3600); 

        $params = array();
        $params['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
        // try {
        $this->client = new SoapClient($this->wsdlFile, $params);
        $key = new SoapHeader('http://www.carcopy.com/WS/WXApi/1.0/', 'apikey', $this->apiKey);

        // setzen der soapheader
        $this->client->__setSoapHeaders(array($key));
        $this->translate();
        // } catch (Exception $e) {
        //     echo '<div class="error">--';
        //     echo $e->getMessage();
        //     echo '--</div>';
        // }
    }

    public function search()
    {

        $filterRequest = $_POST;
        // print_r($filterRequest);
        $filterSerial = serialize($filterRequest);
        $thisSearchKey = sha1($filterSerial);

        $cacheFileName = CarCopyController::$CCAPI_CACHEDIR . 'search' . DIRECTORY_SEPARATOR . $thisSearchKey . '.post';
        file_put_contents($cacheFileName, $filterSerial);

        return Redirect::route('carcopy.result', [urlencode($thisSearchKey)]);
        // header('Location: list.php?search=' . urlencode($thisSearchKey));
    }

    public function translate()
    {

        $lables = $this->chachedLabels('Fuel', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['fuel'][$oneItem->Key] = $oneItem->Translation;
        }

        $lables = $this->chachedLabels('Color', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['colors'][$oneItem->Key] = $oneItem->Translation;
        }

        $lables = $this->chachedLabels('Gearbox', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['gearbox'][$oneItem->Key] = $oneItem->Translation;
        }


        $lables = $this->chachedLabels('Type', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['type'][$oneItem->Key] = $oneItem->Translation;
        }

        $lables = $this->chachedLabels('Emissionstd', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['sskl'][$oneItem->Key] = $oneItem->Translation;
        }

        $lables = $this->chachedLabels('FullCategory', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['karo'][$oneItem->Key] = $oneItem->Translation;
        }

        $lables = $this->chachedLabels('AccsList', $this->language, $this->client);
        foreach ($lables->Translations as $oneItem) {
            $this->CCAPI_LANG['accs'][$oneItem->Key] = $oneItem->Translation;
        }
    }


    public function generateMailHeader($header)
    {
        $string = "";
        foreach ($header as $headerName => $headerContent) {
            $string .= $headerName . ': ' . trim($headerContent) . "\n";
        }

        return $string;
    }

    public function getGroupData($obj)
    {
        $arrTemp = array();

        if (is_object($obj) && isset($obj->Fields)) {
            foreach ($obj->Fields as $oneReturn) {
                $arrTemp[$oneReturn->Key] = $oneReturn->Value;
            }
        }

        return $arrTemp;
    }

    public static function generateOption($name, $array, $formatFunction = '', $translateArray = array(), $filterRequest = array())
    {
        $return = '';
        if (is_array($array) && count($array) > 0) {
            $return .= '<option value="">---</option>' . "\n";
            foreach ($array as $key => $value) {
                if ($value != '') {
                    if (array_key_exists($key, $translateArray)) {
                        $value = $translateArray[$key];
                    }

                    if (function_exists($formatFunction)) {
                        $value = call_user_func($formatFunction, $value);
                    }

                    $return .= '<option value="' . $key . '" ' . CarCopyController::isOptionSelected($filterRequest, $name, $key) . '>' . $value . '</option>' . "\n";
                }
            }
        }
        return $return;
    }

    public static function isCheckboxChecked($arr, $name, $value = 1)
    {
        if (is_array($arr)) {
            if (array_key_exists($name, $arr)) {
                if ($arr[$name] == $value) {
                    return ' checked="checked" ';
                }
            }
        }
    }

    public static function isOptionSelected($arr, $name, $value)
    {
        if (is_array($arr)) {
            if (array_key_exists($name, $arr)) {
                if ($arr[$name] == $value && $arr[$name] != '') {
                    return ' selected="selected" ';
                }
            }
        }
    }

    public function formatDate($datestring)
    {
        if ($datestring == '0000-00-00') {
            return '00.00.0000';
        } else {
            $arrdate = explode('-', $datestring);

            $string = '';
            if ($arrdate[1] != '00') {
                if ($arrdate[2] != '00') {
                    $string .= $arrdate[2] . '.';
                }

                $string .= $arrdate[1] . '.';
            }

            $string .= $arrdate[0];
            return $string;
        }
    }

    public function formatKW($kw)
    {
        return sprintf('%u kw', $kw);
    }

    public static function formatKM($km)
    {
        return sprintf('%u km', $km);
    }

    public static function formatEZ($ez)
    {
        $return = '';
        if ($ez != '' && $ez != '0000-00-00') {
            $parts = explode('-', $ez);

            if (intval($parts[1]) > 0) {
                $return .= $parts[1] . '/';
            }

            $return .= $parts[0];
        } else {
            $return .= '-';
        }
        return $return;
    }

    public static function formatAccs($accs, $CCAPI_LANG)
    {
        //$accs = $oneCar->AccsList->Accs;
        $namen = array();
        foreach ($accs as $obj) {
            $tmpname = $CCAPI_LANG['accs'][$obj->Key . '.' . $obj->Value];
            $namen[$tmpname] = $tmpname;
        }
        ksort($namen);

        return (implode(', ', $namen));
        //        echo '<div class="accs"><h3>Ausstattung</h3>';
        //        echo '<div>',htmlentities( implode(', ',$namen) ),'</div>';
        //        echo '</div>';
    }


    /**
     * do a cached search for vehicles
     *
     * @param array $query
     * @param SoapClient $client
     */
    public function cachedSearchCar($query, $client)
    {
        $key = CarCopyController::getCacheResultKey($query, $client, 'search', 'doVehicleFilterView');
        $return = $this->getCachedResult($key, 'search');
        return $return;
    }

    /**
     * do a cached search for vehicles
     *
     * @param array $query
     * @param SoapClient $client
     */
    public function cachedViewCar($query, $client)
    {
        $key = CarCopyController::getCacheResultKey($query, $client, 'vehicle', 'doVehicleFilterView');
        $return = $this->getCachedResult($key, 'vehicle');
        return $return;
    }

    /**
     * do a cached search for vehicles
     *
     * @param array $query
     * @param SoapClient $client
     */
    public function cachedSearchList($query, $client)
    {
        $key = CarCopyController::getCacheResultKey($query, $client, 'lists', 'doVehicleFieldGroupView');
        $return = $this->getCachedResult($key, 'lists');
        return $return;
    }

    /**
     * do a cached search for vehicles
     *
     * @param string $label
     * @param string $lang
     * @param SoapClient $client
     */
    public function chachedLabels($label, $lang, $client)
    {
        $key = CarCopyController::getCacheResultKey(array($label, $lang), $client, 'labels', 'getValueTranslations');
        $return = $this->getCachedResult($key, 'labels');
        return $return;
    }

    /**
     * do a cached webservice call
     *
     * @param array $query
     * @param SoapClient $client
     * @param string $folder
     * @param string $function
     * @return string
     */
    public static function getCacheResultKey($query, $client, $folder, $function)
    {
        $querySerial = serialize($query);
        $key = sha1($querySerial);

        $cacheFileName = CarCopyController::$CCAPI_CACHEDIR . $folder . DIRECTORY_SEPARATOR . $key;

        $maxAge = time() - CarCopyController::$CCAPI_CACHETIME;

        if (!file_exists($cacheFileName) || filemtime($cacheFileName) < $maxAge) {
            try {
                error_log(var_export($query, true));
                $return = call_user_func_array(array($client, $function), $query);
                $sResult = serialize($return);
                file_put_contents($cacheFileName, $sResult);
            } catch (Exception $e) {
                echo $e->getMessage();
                if (!file_exists($cacheFileName)) // use old cache if its there
                {
                    $key = false;
                }
            }
        }

        return $key;
    }

    /**
     * get cached results
     *
     * @param string $key
     * @param string $folder
     * @return mixed
     */
    public function getCachedResult($key, $folder)
    {
        $cacheFileName = CarCopyController::$CCAPI_CACHEDIR . $folder . DIRECTORY_SEPARATOR . $key;
        if (file_exists($cacheFileName)) {
            $file = file_get_contents($cacheFileName);
            return unserialize($file);
        } else {
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if($this->store_settings['is_car_hpm_enabled'] == 'off' ){
            return redirect()->back()->with('error', __('Please Enable CarHPM'));
        }
        // echo $this->store_settings['is_car_hpm_enabled'];
        
        
        $filterRequest = false;
        $thisSearchKey = '';
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && array_key_exists('search', $_GET)) {
            $thisSearchKey = $_GET['search'];
            $cacheFileName = CarCopyController::$CCAPI_CACHEDIR . 'search' . DIRECTORY_SEPARATOR . $thisSearchKey . '.post';

            if (file_exists($cacheFileName)) {
                $tmpData = file_get_contents($cacheFileName);
                $filterRequest = unserialize($tmpData);
            }
        }

        $_POST_accs = array();
        if (is_array($filterRequest) && array_key_exists('accs', $filterRequest)) {
            $_POST_accs = $filterRequest['accs'];
        }


        try {
            $VehicleFilterRequest = new stdClass;
            $VehicleFilterMin = new stdClass;
            $VehicleFilterMax = new stdClass;

            $VehicleFilterRequest->State = new stdClass;

            // keine Verkauften Fahrzeuge
            $VehicleFilterRequest->State->Sold = false;
            // keine geloeschten Fahrzeuge
            $VehicleFilterRequest->State->Deleted = false;


            $filter = new stdClass();
            $filter->BaseValue = $VehicleFilterRequest;
            $filter->MinValue = $VehicleFilterMin;
            $filter->MaxValue = $VehicleFilterMax;

            $plainFilter = clone $filter;
            $plainFilter->BaseValue = clone $filter->BaseValue;
            $plainFilter->MinValue = clone $filter->MinValue;
            $plainFilter->MaxValue = clone $filter->MaxValue;

            // hersteller
            if (is_array($filterRequest) && array_key_exists('make', $filterRequest) && $filterRequest['make'] != '') {
                $filter->BaseValue->Manufacturer = new stdClass();
                $filter->BaseValue->Manufacturer->Id = intval($filterRequest['make']);
            }

            // treibstoff
            if (is_array($filterRequest) && array_key_exists('fuel', $filterRequest) && $filterRequest['fuel'] != '') {
                $filter->BaseValue->Fuel = intval($filterRequest['fuel']);
            }

            // model
            if (is_array($filterRequest) && array_key_exists('model', $filterRequest) && $filterRequest['model'] != '') {
                $filter->BaseValue->Model = intval($filterRequest['model']);
            }

            // smodel
            if (is_array($filterRequest) && array_key_exists('version', $filterRequest) && $filterRequest['version'] != '') {
                $filter->BaseValue->SModel = intval($filterRequest['version']);
            }

            // color
            if (is_array($filterRequest) && array_key_exists('acolor', $filterRequest) && $filterRequest['acolor'] != '') {
                $filter->BaseValue->Color = new stdClass();
                $filter->BaseValue->Color->External = intval($filterRequest['acolor']);
            }

            // colormetallic
            if (is_array($filterRequest) && array_key_exists('colormetallic', $filterRequest) && $filterRequest['colormetallic'] == '1') {
                if (!isset($filter->BaseValue->Color)) {
                    $filter->BaseValue->Color = new stdClass();
                }
                $filter->BaseValue->Color->Metalic = 1;
            }

            // unfallfrei
            if (is_array($filterRequest) && array_key_exists('accidentcar', $filterRequest) && $filterRequest['accidentcar'] != '') {
                $filter->BaseValue->FreeOfAccident = intval($filterRequest['accidentcar']);
            }

            // KW
            if (is_array($filterRequest) && array_key_exists('kw_from', $filterRequest) && $filterRequest['kw_from'] != '') {
                $filter->MinValue->Power = intval($filterRequest['kw_from']);
            }

            if (is_array($filterRequest) && array_key_exists('kw_to', $filterRequest) && $filterRequest['kw_to'] != '') {
                $filter->MaxValue->Power = intval($filterRequest['kw_to']);
            }

            // Accs
            if (is_array($filterRequest) && array_key_exists('accs', $filterRequest) && is_array($filterRequest['accs'])) {
                //$filter->MaxValue->Power = intval($filterRequest['kw_to']);

                $filter->BaseValue->AccsList = new stdClass;
                foreach ($filterRequest['accs'] as $accs_name => $accs_value) {
                    $filter->BaseValue->AccsList->Accs[] = array('Key' => $accs_name, 'Value' => $accs_value);
                }
            }

            // KM
            if (is_array($filterRequest) && array_key_exists('km_from', $filterRequest) && $filterRequest['km_from'] != '') {
                $filter->MinValue->Km = intval($filterRequest['km_from']);
            }

            if (is_array($filterRequest) && array_key_exists('km_to', $filterRequest) && $filterRequest['km_to'] != '') {
                $filter->MaxValue->Km = intval($filterRequest['km_to']);
            }

            // Erstzulassung
            if (is_array($filterRequest) && array_key_exists('ez_from', $filterRequest) && $filterRequest['ez_from'] != '') {
                $filter->MinValue->Regdate = ($filterRequest['ez_from']);
            }

            if (is_array($filterRequest) && array_key_exists('ez_to', $filterRequest) && $filterRequest['ez_to'] != '') {
                $filter->MaxValue->Regdate = ($filterRequest['ez_to']);
            }

            // Preis
            if (is_array($filterRequest) && array_key_exists('ep_from', $filterRequest) && $filterRequest['ep_from'] != '') {
                $filter->MinValue->Price = new stdClass();
                $filter->MinValue->Price->Client = intval($filterRequest['ep_from']);
            }

            if (is_array($filterRequest) && array_key_exists('ep_to', $filterRequest) && $filterRequest['ep_to'] != '') {
                $filter->MaxValue->Price = new stdClass();
                $filter->MaxValue->Price->Client = intval($filterRequest['ep_to']);
            }


            $dropdownData = array();
            $dropdownData['power'] = array();


            $groupReturn = $this->cachedSearchList(array('Power', $plainFilter), $this->client);
            $dropdownData['power'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('Fuel', $plainFilter), $this->client);
            $dropdownData['fuel'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('Manufacturer', $plainFilter), $this->client); //$client->doVehicleFieldGroupView( 'Manufacturer', $plainFilter );
            $dropdownData['manufacturer'] = $this->getGroupData($groupReturn);
            unset($dropdownData['manufacturer'][0]);

            $groupReturn = $this->cachedSearchList(array('RegDate', $plainFilter), $this->client);
            $dropdownData['regdate'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('Km', $plainFilter), $this->client);
            $dropdownData['km'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('Price.Client', $plainFilter), $this->client);
            $dropdownData['price'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('Type', $plainFilter), $this->client);
            $dropdownData['type'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('Area', $plainFilter), $this->client);
            $dropdownData['area'] = $this->getGroupData($groupReturn);

            $groupReturn = $this->cachedSearchList(array('FullCategory', $plainFilter), $this->client);
            $dropdownData['karoform'] = $this->getGroupData($groupReturn);

            $tmp = array();
            foreach ($dropdownData['karoform'] as $key => $label) {
                if (substr($label, -2) == '.0') {
                    $label = substr($label, 0, -2);
                }

                if (isset($this->CCAPI_LANG['karo'][$label])) {
                    $tmp[$key] = $this->CCAPI_LANG['karo'][$label];
                }
            }
            $dropdownData['karoform'] = $tmp;


            $groupReturn = $this->cachedSearchList(array('Gearbox', $plainFilter), $this->client);
            $dropdownData['getriebe'] = $this->getGroupData($groupReturn);


            $groupReturn = $this->cachedSearchList(array('Color.External', $plainFilter), $this->client);
            $dropdownData['colors'] = $this->getGroupData($groupReturn);

            $dropdownData['model'] = array();
            if (is_array($filterRequest) && array_key_exists('make', $filterRequest)) {
                $groupReturn = $this->cachedSearchList(array('Model', $filter), $this->client);
                $dropdownData['model'] = $this->getGroupData($groupReturn);
            }

            $CCAPI_LANG = $this->CCAPI_LANG;

            return view('carcopyapi.index', compact('filterRequest', 'dropdownData', 'CCAPI_LANG', '_POST_accs'));
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function view(Request $request)
    {

        // print_r($request->cid);
        // print_r($request->search);
        
        if (!isset($request->cid)) {
            // header('Location: search.php');
            exit();
        }
        
        $thisSearchKey = $request->search;
        $cid = $request->cid;

        $filter = new stdClass();
        $filter->BaseValue = new stdClass();
        $filter->BaseValue->Id = intval($request->cid);

        $filter->MinValue = new stdClass();
        $filter->MaxValue = new stdClass();

        $limit = 1;
        $tmpcarData = $this->cachedViewCar(array($filter, array(), 0, $limit, 'Id', 'ASC'), $this->client);

        $carData = $tmpcarData['VehicleFilterResponse'];
        $resultcount = $tmpcarData['Count'];
        $totalcount = $tmpcarData['TotalCount'];


        $car = $carData->Vehicle[0];

        if (isset($car->FullCategory)) {
            if (substr($car->FullCategory, -2) == '.0') {
                $car->FullCategory = substr($car->FullCategory, 0, -2);
            }
        }

        $site = array_key_exists('site', $_GET) ? $_GET['site'] : 'overview';

        $templateFile['overview'] = 'view.overview.php';
        $templateFile['details'] = 'view.details.php';
        $templateFile['pics'] = 'view.pics.php';

        $CCAPI_LANG = $this->CCAPI_LANG;
        $template = '';
        switch ($site) {
            case 'pics':
                $template = $templateFile['pics'];

                break;

            case 'details':
                $template = $templateFile['details'];
                break;

            case 'overview':
            default:
                return view('carcopyapi.view_overview', compact('car','thisSearchKey','CCAPI_LANG','cid'));
                // $template = $templateFile['overview'];
                break;
        }

        include $template;
    }

    public function result($id)
    {
        $thisSearchKey = $id;
        $cacheFileName = CarCopyController::$CCAPI_CACHEDIR . 'search' . DIRECTORY_SEPARATOR . $thisSearchKey . '.post';

        if (file_exists($cacheFileName)) {
            $tmpData = file_get_contents($cacheFileName);
            $filterRequest = unserialize($tmpData);
        } else {
            // header('Location: search.php?re=nosearchid');
        }


        $VehicleFilterRequest = new stdClass;
        $VehicleFilterMin = new stdClass;
        $VehicleFilterMax = new stdClass;

        $VehicleFilterRequest->State = new stdClass;
        // keine Verkauften Fahrzeuge
        $VehicleFilterRequest->State->Sold = 0;
        // keine geloeschten Fahrzeuge
        $VehicleFilterRequest->State->Deleted = 0;

        $filter = new stdClass();
        $filter->BaseValue = $VehicleFilterRequest;
        $filter->MinValue = $VehicleFilterMin;
        $filter->MaxValue = $VehicleFilterMax;

        // hersteller
        if (is_array($filterRequest) && array_key_exists('make', $filterRequest) && $filterRequest['make'] != '') {
            $filter->BaseValue->Manufacturer = new stdClass();
            $filter->BaseValue->Manufacturer->Id = intval($filterRequest['make']);
        }

        // treibstoff
        if (is_array($filterRequest) && array_key_exists('fuel', $filterRequest) && $filterRequest['fuel'] != '') {
            $filter->BaseValue->Fuel = intval($filterRequest['fuel']);
        }

        // model
        if (is_array($filterRequest) && array_key_exists('model', $filterRequest) && $filterRequest['model'] != '') {
            $filter->BaseValue->Model = $filterRequest['model'];
        }

        // kategorie
        if (is_array($filterRequest) && array_key_exists('kfzkat', $filterRequest) && $filterRequest['kfzkat'] != '') {
            $filter->BaseValue->Type = intval($filterRequest['kfzkat']);
        }

        // smodel
        if (is_array($filterRequest) && array_key_exists('version', $filterRequest) && $filterRequest['version'] != '') {
            $filter->BaseValue->SModel = $filterRequest['version'];
        }

        // karoform
        if (is_array($filterRequest) && array_key_exists('karoform', $filterRequest) && $filterRequest['karoform'] != '') {
            $filter->BaseValue->FullCategory = $filterRequest['karoform'];
        }



        // color
        if (is_array($filterRequest) && array_key_exists('acolor', $filterRequest) && $filterRequest['acolor'] != '') {
            $filter->BaseValue->Color = new stdClass();
            $filter->BaseValue->Color->External = intval($filterRequest['acolor']);
        }

        // colormetallic
        if (is_array($filterRequest) && array_key_exists('colormetallic', $filterRequest) && $filterRequest['colormetallic'] == '1') {
            if (!isset($filter->BaseValue->Color)) {
                $filter->BaseValue->Color = new stdClass();
            }
            $filter->BaseValue->Color->Metalic = 1;
        }

        // unfallfrei
        if (is_array($filterRequest) && array_key_exists('accidentcar', $filterRequest) && $filterRequest['accidentcar'] != '') {
            $filter->BaseValue->FreeOfAccident = intval($filterRequest['accidentcar']);
        }

        // KW
        if (is_array($filterRequest) && array_key_exists('kw_from', $filterRequest) && $filterRequest['kw_from'] != '') {
            $filter->MinValue->Power = intval($filterRequest['kw_from']);
        }

        if (is_array($filterRequest) && array_key_exists('kw_to', $filterRequest) && $filterRequest['kw_to'] != '') {
            $filter->MaxValue->Power = intval($filterRequest['kw_to']);
        }

        // Accs
        if (is_array($filterRequest) && array_key_exists('accs', $filterRequest) && is_array($filterRequest['accs'])) {
            //$filter->MaxValue->Power = intval($filterRequest['kw_to']);

            $filter->BaseValue->AccsList = new stdClass;
            foreach ($filterRequest['accs'] as $accs_name => $accs_value) {
                $filter->BaseValue->AccsList->Accs[] = array('Key' => $accs_name, 'Value' => $accs_value);
            }
        }

        // KM
        if (is_array($filterRequest) && array_key_exists('km_from', $filterRequest) && $filterRequest['km_from'] != '') {
            $filter->MinValue->Km = intval($filterRequest['km_from']);
        }

        if (is_array($filterRequest) && array_key_exists('km_to', $filterRequest) && $filterRequest['km_to'] != '') {
            $filter->MaxValue->Km = intval($filterRequest['km_to']);
        }

        // Erstzulassung
        if (is_array($filterRequest) && array_key_exists('ez_from', $filterRequest) && $filterRequest['ez_from'] != '') {
            $filter->MinValue->RegDate = ($filterRequest['ez_from']);
        }

        if (is_array($filterRequest) && array_key_exists('ez_to', $filterRequest) && $filterRequest['ez_to'] != '') {
            $filter->MaxValue->RegDate = ($filterRequest['ez_to']);
        }

        // Preis
        if (is_array($filterRequest) && array_key_exists('ep_from', $filterRequest) && $filterRequest['ep_from'] != '') {
            $filter->MinValue->Price = new stdClass();
            $filter->MinValue->Price->Client = intval($filterRequest['ep_from']);
        }

        if (is_array($filterRequest) && array_key_exists('ep_to', $filterRequest) && $filterRequest['ep_to'] != '') {
            $filter->MaxValue->Price = new stdClass();
            $filter->MaxValue->Price->Client = intval($filterRequest['ep_to']);
        }

        try {

            $limit = 10;
            $start = 0;

            if (array_key_exists('page', $_GET)) {
                $page = ceil(abs($_GET['page']));
                if ($page > 0) {
                    $start = ($page - 1) * $limit;
                }
            } else {
                $page = 1;
            }

            $fields = array();
            $fields[] = 'Pictures';
            $fields[] = 'Price.Client';
            $fields[] = 'State.Sold';
            $fields[] = 'State.Deleted';
            $fields[] = 'Km';
            $fields[] = 'Id';
            $fields[] = 'Manufacturer.Name';
            $fields[] = 'Manufacturer.Id';
            $fields[] = 'Model';
            $fields[] = 'SModel';
            $fields[] = 'RegDate';
            $fields[] = 'Freetext.Default';

            $mtstart = microtime(true);
            $tmpreturn = $this->cachedSearchCar(array($filter, $fields, $start, $limit, 'Id', 'ASC'), $this->client);
            $mtstop = microtime(true);

            echo $mtstop - $mtstart;

            $return = $tmpreturn['VehicleFilterResponse'];
            $resultcount = $tmpreturn['Count'];
            $totalcount = $tmpreturn['TotalCount'];


            return view('carcopyapi.result', compact('thisSearchKey', 'start', 'resultcount', 'totalcount', 'limit', 'return'));
        } catch (Exception $e) {
            echo '<div class="error">--';
            echo $e->getMessage();
            echo '--</div>';

            print_r($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function carHPM()
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $store_settings = $this->store_settings;
            // $plan = Plan::where('id', $this->user->plan)->first();
            return view('carcopyapi.car_hpm', compact('store_settings'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function storeCarHPM(Request $request)
    {
        if (Auth::user()->type == 'Owner' && $this->store_settings) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'is_car_hpm_enabled' => 'required',
                    'car_hpm_mode' => 'required|string|max:10',
                    'car_hpm_api_key' => 'required|string',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $this->store_settings['is_car_hpm_enabled'] = $request->is_car_hpm_enabled ?? 'off';
            $this->store_settings['car_hpm_mode'] = $request->car_hpm_mode;
            $this->store_settings['car_hpm_api_key'] = $request->car_hpm_api_key;
            $this->store_settings->update();

            return redirect()->back()->with('success', __('Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
