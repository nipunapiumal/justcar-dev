<?php

namespace App\Http\Controllers;

use App\Models\LangSpecialist;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class LocalizationController extends Controller
{

    private $lang = '';
    private $file;
    private $key;
    private $value;
    private $path;
    private $arrayLang = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //

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
        $validate = Validator::make(
            $request->all(),
            [
                'content' => 'required|json',
            ]
        );

        $lang = $request["lang"];

        if ($validate->fails()) {
            $message = $validate->getMessageBag();
            return redirect()->back()->with('error', $message->first());
        }

        $path = base_path() . "/resources/lang/$lang.json";
        file_put_contents($path, $request->content);

        return redirect()->back()->with('success', __('Updated Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang = '')
    {

        if (Auth::user()->type == 'super admin' || Auth::user()->type == 'language_specialist') {
            if (Auth::user()->type == 'super admin') {
                $languages = Utility::languages();
            } else {
                $languages = LangSpecialist::where("user_id", Auth::user()->id)->first();
                if($languages){
                    $languages = json_decode($languages->languages);
                }else{
                    return redirect()->route('dashboard')->with('error', __('Permission denied.'));
                }
            }
            if ($lang) {
                $path = base_path() . '/resources/lang/' . $lang . '.json';
            } else {
                $path = base_path() . '/resources/lang/en.json';
            }
            $jsonContent = file_get_contents($path);
            return view('localization.index', compact('languages', 'jsonContent', 'lang'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
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

    // public function getUsers(Request $request)
    // {




    // }
}
