<?php

namespace App\Http\Controllers;

use App\Models\ExteriorColor;
use App\Models\FuelType;
use App\Models\InteriorColor;
use App\Models\InteriorDesign;
use App\Models\Language;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\ProductCategorie;
use App\Models\ProductLangs;
use App\Models\Store;
use App\Models\User;
use App\Models\Utility;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleEquipment;
use App\Models\VehicleModel;
use App\Models\VehicleRequest;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{

    public function __construct()
    {
        if (Auth::check()) {

            $userlang = \Auth::user()->lang;
            \App::setLocale($userlang);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user             = \Auth::user();
        $store_id         = Store::where('id', $user->current_store)->first();
        $products         = Product::where('store_id', $store_id->id)->where('product_type', 2)->orderBy('id', 'DESC')->get();
        $productcategorie = ProductCategorie::where('store_id', $store_id->id)->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        $creator       = User::find($user->creatorId());
        $plan          = Plan::find($creator->plan);

        return view('vehicle.index', compact('products', 'productcategorie', 'plan','store_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user              = Auth::user();
        $vehicleBrands = VehicleBrand::pluck('name', 'id');;
        $vehicleTypes = VehicleType::all();


        // print_r($vehicleTypes);

        // $vehicleTypes->prepend(__('Please Select'));
        $fuelTypes = FuelType::all();
        $vehicleEquipments = VehicleEquipment::all();
        $exteriorColors = ExteriorColor::all();
        $interiorColors = InteriorColor::all();
        $interiorDesigns = InteriorDesign::all();
        $store_id          = Store::where('id', $user->current_store)->first();
        $product_categorie = ProductCategorie::where('store_id', $store_id->id)
            ->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        return view('vehicle.create', compact('vehicleBrands', 'product_categorie', 'fuelTypes', 'vehicleEquipments', 'exteriorColors', 'interiorColors', 'interiorDesigns', 'vehicleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user     = \Auth::user();
        $store_id = Store::where('id', $user->current_store)->first();
        $lang =  App::currentLocale();

        $validator = \Validator::make(
            $request->all(),
            [
                'vehicle_type_id' => 'required|max:120',
                'brand_id' => 'required|max:120',
                'brand_id' => 'required|max:120',
                'model_id' => 'required|max:120',
                'vehicle_number' => 'required|max:120',
                'register_year' => 'required|max:120',
                'register_month' => 'required|max:120',
                'millage' => 'required|max:120',
                'fuel_type_id' => 'required|max:120',
                'transmission_id' => 'required|max:120',
                'prev_owners' => 'required|max:120',
                'power' => 'required|max:120',
                'power_type' => 'required|max:120',
                'equipments' => 'required',
                'exterior_color' => 'required|max:120',
                'interior_design' => 'required',
                'interior_color' => 'required|max:120',
                // 'title' => 'required|max:120',
                'product_categorie' => 'required',
                "$lang" . '_name' => 'required|max:120',
                "$lang" . '_description' =>  'required',
                // 'description' => 'required',
                'price' => 'required|max:120',
                'is_cover_image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
            ]
        );


        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            $msg['flag'] = 'error';
            $msg['msg']  = $messages->first();

            return $msg;
        }



        $file_name = [];
        if (!empty($request->multiple_files) && count($request->multiple_files) > 0) {
            foreach ($request->multiple_files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // $file_name[]     = $fileNameToStore; 
                $dir             = storage_path('uploads/product_image/');
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $img = \Image::make($file);
                if ($img->width() >= 1280) {
                    $img->fit(1280, 720);
                }
                
                $img->save($dir . $fileNameToStore, 90);
                $file_name[] = ["name"=>$fileNameToStore,"size"=>($img->filesize()/1048576)];//MB
                // $path = $file->storeAs('uploads/product_image/', $fileNameToStore);
            }

           

            
        }


        if(Utility::getStorageUsage() >= $user->total_storage ){
            //available storage exceeded
            $msg['flag'] = 'error';
            $msg['msg']  = __('Your available storage is over! Please upgrade storage plan');

            //remove uploaded files
            if (!empty($file_name)) {
                foreach ($file_name as $file) {
                    $image = $dir . $file["name"];
                    if (\File::exists($image)) {
                        chmod($image, 0755);
                        \File::delete($image);
                    }
                    
                }
                
            }
            return $msg;
        }

        if (!empty($request->is_cover_image)) {
            $filenameWithExt  = $request->file('is_cover_image')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('is_cover_image')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/is_cover_image/');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $img = \Image::make($request->file('is_cover_image'));
            if ($img->width() >= 1280) {
                $img->fit(1280, 720);
            }

            $img->save($dir . $fileNameToStores, 90);
            // $path = $request->file('is_cover_image')->storeAs('uploads/is_cover_image/', $fileNameToStores);
        }

        if (!empty($request->product_categorie)) {
            if (count($request->product_categorie) > 1 && in_array(0, $request->product_categorie)) {
                $msg['flag'] = 'error';
                $msg['msg']  = __('Please select valid Categorie');

                return $msg;
            }
        }


        $user          = \Auth::user();
        $creator       = User::find($user->creatorId());
        $total_product = $user->countProducts();
        $plan          = Plan::find($creator->plan);


        if ($total_product < $plan->max_products || $plan->max_products == -1) {


            $vehicle = new Product();

            if (!empty($request->product_categorie)) {
                $vehicle['product_categorie'] = implode(',', $request->product_categorie);
            } else {
                $vehicle['product_categorie'] = $request->product_categorie;
            }


            $vehicle->vehicle_type_id = $request->vehicle_type_id;
            $vehicle->store_id = $store_id->id;
            $vehicle->brand_id = $request->brand_id;
            $vehicle->model_id = $request->model_id;
            $vehicle->register_year = $request->register_year;
            $vehicle->register_month = $request->register_month;
            $vehicle->millage = $request->millage;
            $vehicle->vehicle_number = $request->vehicle_number;
            $vehicle->fuel_type_id = $request->fuel_type_id;
            $vehicle->transmission_id = $request->transmission_id;
            $vehicle->prev_owners = $request->prev_owners;
            $vehicle->power = $request->power;
            $vehicle->power_type = $request->power_type;
            $vehicle->equipments = json_encode($request->equipments);
            $vehicle->exterior_color = $request->exterior_color;

            if ($request->is_metallic) {
                $vehicle->is_metallic = $request->is_metallic;
            } else {
                $vehicle->is_metallic = 0;
            }

            $vehicle->interior_design = json_encode($request->interior_design);
            $vehicle->interior_color = $request->interior_color;
            $vehicle->youtube_video = $request->youtube_video;
            // $vehicle->name = $request->title;
            // $vehicle->description = $request->description;
            $vehicle->multi_lang_description = json_encode([App::currentLocale() => $request->description]);
            $vehicle->price = $request->price;
            $vehicle->net_price = $request->net_price;
            $vehicle->last_price = $request->price;
            $vehicle->quantity = 1;
            $vehicle->is_active = 1;
            $vehicle->product_type = 2;
            $vehicle->is_cover = !empty($request->is_cover_image) ? $fileNameToStores : '';
            $vehicle->product_display = isset($request->product_display) ? 'on' : 'off';
            $vehicle->fin_number = $request->fin_number;
            $vehicle->fin_number_display = isset($request->fin_number_display) ? 'on' : 'off';

            $vehicle->save();



            //save product details in different languages
            $store_languages = Utility::getStoreLanguages();

            foreach ($store_languages as $lang) {

                $name  = $request["$lang" . '_name'];
                $description  = $request["$lang" . '_description'];

                if ($name) {
                    $data = [
                        'parent_id' => $vehicle->id,
                        'lang' => $lang,
                        'name' => $name,
                        'description' => $description,
                    ];
                    ProductLangs::create($data);
                }
            }


            if (!empty($file_name)) {
                foreach ($file_name as $file) {
                    $objStore = Product_images::create(
                        [
                            'product_id' => $vehicle->id,
                            'product_images' => $file["name"],
                            'image_size' => number_format($file["size"],2),
                        ]
                    );
                }

                //update storage usage for gallery images
                $user->updateStorageUsage(Utility::getStorageUsage());
            }


            if (!empty($vehicle)) {
                $msg['flag'] = 'success';
                $msg['msg']  = __('Product Successfully Created');
            } else {
                $msg['flag'] = 'error';
                $msg['msg']  = __('Product Created Failed');
            }

            return $msg;
        } else {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Your product limit is over Please upgrade plan');

            return $msg;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);


        $productDesc = json_decode($product->multi_lang_description, true);
        if (isset($productDesc[App::currentLocale()])) {
            $product->description = $productDesc[App::currentLocale()];
        }


        $vehicle_brands = VehicleBrand::pluck('name', 'id');
        $vehicle_types = VehicleType::pluck('name', 'id');
        $vehicle_models = VehicleModel::where('vehicle_brand_id', $product->brand_id)->pluck('name', 'id');
        $fuel_types = FuelType::pluck('name', 'id');
        $vehicleEquipments = VehicleEquipment::all();
        $exteriorColors = ExteriorColor::all();
        $interiorColors = InteriorColor::all();
        $interiorDesigns = InteriorDesign::all();

        $powers = array(1 => 'Petrol', 2 => 'Diesel');

        $user              = \Auth::user();
        $store_id          = Store::where('id', $user->current_store)->first();
        $product_categorie = ProductCategorie::where('store_id', $store_id->id)->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $product_image     = Product_images::where('product_id', $product->id)->get();

        return view('vehicle.edit', compact('product', 'product_categorie', 'product_image', 'vehicle_brands', 'vehicle_models', 'fuel_types', 'powers', 'vehicleEquipments', 'exteriorColors', 'interiorColors', 'interiorDesigns', 'vehicle_types'));
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


        $vehicle = Product::find($id);
        $user     = \Auth::user();
        $store_id = Store::where('id', $user->current_store)->first();
        $lang =  App::currentLocale();

        $validator = \Validator::make(
            $request->all(),
            [
                'vehicle_type_id' => 'required|max:120',
                'brand_id' => 'required|max:120',
                'model_id' => 'required|max:120',
                'register_year' => 'required|max:120',
                'register_month' => 'required|max:120',
                'millage' => 'required|max:120',
                'vehicle_number' => 'required|max:120',
                'fuel_type_id' => 'required|max:120',
                'transmission_id' => 'required|max:120',
                'prev_owners' => 'required|max:120',
                'power' => 'required|max:120',
                'power_type' => 'required|max:120',
                'equipments' => 'required',
                'exterior_color' => 'required|max:120',
                'interior_design' => 'required',
                'interior_color' => 'required|max:120',
                'product_categorie' => 'required',
                "$lang" . '_name' => 'required|max:120',
                "$lang" . '_description' =>  'required',
                'price' => 'required|max:120',
                'is_cover_image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
            ]
        );


        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            $msg['flag'] = 'error';
            $msg['msg']  = $messages->first();

            return $msg;
        }





        $file_name = [];
        if (!empty($request->multiple_files) && count($request->multiple_files) > 0) {
            foreach ($request->multiple_files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/product_image/');
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }

                $img = \Image::make($file);
                if ($img->width() >= 1280) {
                    $img->fit(1280, 720);
                }
                
                $img->save($dir . $fileNameToStore, 90);
                $file_name[] = ["name"=>$fileNameToStore,"size"=>($img->filesize()/1048576)];//MB
                // $path = $file->storeAs('uploads/product_image/', $fileNameToStore);
            }
        }
        
        if(Utility::getStorageUsage() >= $user->total_storage ){
            //available storage exceeded
            $msg['flag'] = 'error';
            $msg['msg']  = __('Your available storage is over! Please upgrade storage plan');

            //remove uploaded files
            if (!empty($file_name)) {
                foreach ($file_name as $file) {
                    $image = $dir . $file["name"];
                    if (\File::exists($image)) {
                        chmod($image, 0755);
                        \File::delete($image);
                    }
                    
                }
                
            }
            return $msg;
        }

        

        if (!empty($request->is_cover_image)) {
            if (asset(Storage::exists('uploads/is_cover_image/' . $vehicle->is_cover))) {
                asset(Storage::delete('uploads/is_cover_image/' . $vehicle->is_cover));
            }

            $filenameWithExt  = $request->file('is_cover_image')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('is_cover_image')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/is_cover_image/');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $img = \Image::make($request->file('is_cover_image'));
            if ($img->width() >= 1280) {
                $img->fit(1280, 720);
            }

            $img->save($dir . $fileNameToStores, 90);
            // $path = $request->file('is_cover_image')->storeAs('uploads/is_cover_image/', $fileNameToStores);
        }

        if (!empty($request->product_categorie)) {
            if (count($request->product_categorie) > 1 && in_array(0, $request->product_categorie)) {
                $msg['flag'] = 'error';
                $msg['msg']  = __('Please select valid Categorie');

                return $msg;
            }
        }


        $user          = \Auth::user();
        $creator       = User::find($user->creatorId());
        $total_product = $user->countProducts();
        $plan          = Plan::find($creator->plan);


        if ($total_product < $plan->max_products || $plan->max_products == -1) {

            if (!empty($request->product_categorie)) {
                $vehicle['product_categorie'] = implode(',', $request->product_categorie);
            } else {
                $vehicle['product_categorie'] = $request->product_categorie;
            }


            $vehicle->store_id = $store_id->id;
            $vehicle->vehicle_type_id = $request->vehicle_type_id;
            $vehicle->brand_id = $request->brand_id;
            $vehicle->model_id = $request->model_id;
            $vehicle->register_year = $request->register_year;
            $vehicle->register_month = $request->register_month;
            $vehicle->millage = $request->millage;
            $vehicle->vehicle_number = $request->vehicle_number;
            $vehicle->fuel_type_id = $request->fuel_type_id;
            $vehicle->transmission_id = $request->transmission_id;
            $vehicle->prev_owners = $request->prev_owners;
            $vehicle->power = $request->power;
            $vehicle->power_type = $request->power_type;
            $vehicle->equipments = json_encode($request->equipments);
            $vehicle->exterior_color = $request->exterior_color;
            $vehicle->is_metallic = $request->is_metallic;
            $vehicle->interior_design = json_encode($request->interior_design);
            $vehicle->interior_color = $request->interior_color;
            $vehicle->youtube_video = $request->youtube_video;
            // $vehicle->name = $request->name;
            // $vehicle->description = $request->description;

            $vehicleDesc = json_decode($vehicle->multi_lang_description, true);
            $vehicleDesc[App::currentLocale()] = $request->description;
            $vehicle->multi_lang_description = json_encode($vehicleDesc);


            $vehicle->price = $request->price;
            $vehicle->net_price = $request->net_price;
            $vehicle->last_price = $request->price;
            $vehicle->quantity = 1;
            $vehicle->is_active = 1;
            $vehicle->product_type = 2;
            if (!empty($request->is_cover_image)) {
                $vehicle->is_cover = $fileNameToStores;
            }
            $vehicle->product_display = isset($request->product_display) ? 'on' : 'off';
            $vehicle->fin_number = $request->fin_number;
            $vehicle->fin_number_display = isset($request->fin_number_display) ? 'on' : 'off';
            $vehicle->save();


            //save product details in different languages
            $store_languages = Utility::getStoreLanguages();

            foreach ($store_languages as $lang) {

                $name  = $request["$lang" . '_name'];
                $description  = $request["$lang" . '_description'];

                if ($name) {
                    $data = [
                        // 'parent_id' => $vehicle->id,
                        // 'lang' => $lang,
                        'name' => $name,
                        'description' => $description,
                    ];
                    ProductLangs::updateOrCreate(
                        [
                            'parent_id' => $vehicle->id,
                            'lang' => $lang,
                        ],
                        $data
                    );
                }
            }

            if (!empty($file_name)) {
                foreach ($file_name as $file) {
                    $objStore = Product_images::create(
                        [
                            'product_id' => $vehicle->id,
                            'product_images' => $file["name"],
                            'image_size' => number_format($file["size"],2),
                        ]
                    );
                }
                
               //update storage usage for gallery images
               $user->updateStorageUsage(Utility::getStorageUsage());
            }

            if (!empty($vehicle)) {
                $msg['flag'] = 'success';
                $msg['msg']  = __('Product Successfully Created');
            } else {
                $msg['flag'] = 'error';
                $msg['msg']  = __('Product Created Failed');
            }

            return $msg;
        } else {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Your product limit is over Please upgrade plan');

            return $msg;
        }
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


    public function getModels(Request $request, $slug = null)
    {


        $data["code"] = 403;
        $data["output"] = "<option value=''>Please Select</option>";


        if ($slug) {
            $store = Store::where('slug', $slug)->where('is_store_enabled', '1')->first();
            $vehicleModels = Product::select(DB::raw('DISTINCT vehicle_models.*'))
            ->join('vehicle_types', 'vehicle_types.id', '=', 'products.vehicle_type_id')
            ->join('vehicle_brands', 'vehicle_brands.id', '=', 'products.brand_id')
            ->join('vehicle_models', 'vehicle_models.id', '=', 'products.model_id')
            ->where('products.brand_id', $request->brand)
            ->where('store_id', $store->id)
            ->where('product_display', 'on')
            ->get();
        } else {
            $vehicleModels = VehicleModel::where('vehicle_brand_id', $request->brand)->get();
        }





        foreach ($vehicleModels as $vehicleModel) {
            $data["output"] .= "<option value=" . $vehicleModel->id . ">" . $vehicleModel->name . "</option>";
        }

        return response()->json($data);
    }
    public function getVehicleBrands(Request $request, $slug = null)
    {

        $data["code"] = 403;
        $data["output"] = "<option value=''>Please Select</option>";


        if ($slug) {
            $store = Store::where('slug', $slug)->where('is_store_enabled', '1')->first();
            $vehicleBrands = Product::select(DB::raw('DISTINCT vehicle_brands.*'))
                ->join('vehicle_types', 'vehicle_types.id', '=', 'products.vehicle_type_id')
                ->join('vehicle_brands', 'vehicle_brands.id', '=', 'products.brand_id')
                ->join('vehicle_models', 'vehicle_models.id', '=', 'products.model_id')
                ->where('products.vehicle_type_id', $request->vehicleType)
                ->where('store_id', $store->id)
                ->where('product_display', 'on')
                ->get();
        } else {
            $vehicleBrands = VehicleBrand::where('vehicle_type_id', $request->vehicleType)->get();
        }

        // dump($vehicleBrands);

        foreach ($vehicleBrands as $vehicleBrand) {
            $data["output"] .= "<option value=" . $vehicleBrand->id . ">" . $vehicleBrand->name . "</option>";
        }

        return response()->json($data);
    }

    public function request(Request $request)
    {
        // $user              = Auth::user();
        // $store_id          = Store::where('id', $user->current_store)->first();
        return view('vehicle.request');
    }
    public function storeRequest(Request $request)
    {
        $user     = \Auth::user();
        $store_id = Store::where('id', $user->current_store)->first();

        $validator = \Validator::make(
            $request->all(),
            [
                'vehicle_brand' => 'required|max:255',
                'vehicle_model' => 'required|max:255',
                'equipments' => 'required',
                'interior_design' => 'required',
                'exterior_color' => 'required|max:255',
                'interior_color' => 'required|max:255',

            ]
        );


        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            $msg['flag'] = 'error';
            $msg['msg']  = $messages->first();

            return $msg;
        }

        $vehicle = new VehicleRequest();
        $vehicle->vehicle_brand = $request->vehicle_brand;
        $vehicle->vehicle_model = $request->vehicle_model;
        $vehicle->equipments = $request->equipments;
        $vehicle->interior_design = $request->interior_design;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->interior_color = $request->interior_color;
        $vehicle->created_by = \Auth::user()->creatorId();

        $vehicle->save();

        if (!empty($vehicle)) {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Vehicle Brand Requested Successfully');
        } else {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Vehicle Brand Requested Failed');
        }

        return $msg;
    }
    public function viewVehicleRequests(Request $request)
    {
        if (\Auth::user()->type == 'super admin') {
            $vehicle_requests = VehicleRequest::all();
            return view('vehicle_request.index', compact('vehicle_requests'));
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }
}
