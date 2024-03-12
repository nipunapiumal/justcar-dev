<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\PageOption;
use App\Models\PageOptionLangs;
use App\Models\Store;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PageOptionController extends Controller
{
    public function __construct()
    {
        if (\Auth::check()) {
            \App::setLocale(\Auth::user()->lang);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store_id    = Auth::user();
        $store_settings = Store::where('id', $store_id->current_store)->first();
        $pageoptions = PageOption::where('store_id', $store_settings->id)
            // ->where('language', App::currentLocale())
            ->where('created_by', \Auth::user()->creatorId())->get();

        // Get the remote domain
        $store = Store::where('id', $store_settings->id)->where('enable_domain', 'on')->first();

        // If the subdomain exists
        $sub_store = \App\Models\Store::where('id', $store_settings->id)->where('enable_subdomain', 'on')->first();


        return view('pageoption.index', compact('pageoptions', 'store_id', 'store_settings', 'store', 'sub_store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pageoption.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $lang =  App::currentLocale();

        $validator = \Validator::make(
            $request->all(),
            [
                "$lang" . '_name' => 'required|max:120',
                "$lang" . '_meta_title' => 'required|max:255',
                "$lang" . '_meta_description' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }


        $store_languages = Utility::getStoreLanguages();


        $data = [
            'slug' => $request["" . $lang . "_name"],
            'store_id' => \Auth::user()->current_store,
            'enable_page_header' => !empty($request->enable_page_header) ? $request->enable_page_header : 'off',
            'enable_page_footer' => !empty($request->enable_page_footer) ? $request->enable_page_footer : 'off',
            'created_by' => \Auth::user()->creatorId(),
        ];
        $pageslug = PageOption::create($data);

        foreach ($store_languages as $lang) {

            $name  = $request["$lang" . '_name'];
            $meta_title  = $request["$lang" . '_meta_title'];
            $meta_description  = $request["$lang" . '_meta_description'];
            $contents  = $request["$lang" . '_contents'];

            if ($name) {
                $data = [
                    'parent_id' => $pageslug->id,
                    'lang' => $lang,
                    'name' => $name,
                    'contents' => $contents,
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
                ];
                PageOptionLangs::create($data);
            }
        }

        return redirect()->back()->with('success', __('Page Successfully added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\PageOption $pageOption
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PageOption $pageOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\PageOption $pageOption
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageOption = PageOption::find($id);
        return view('pageoption.edit', compact('pageOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\PageOption $pageOption
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lang =  App::currentLocale();
        $pageOption = PageOption::find($id);


        $validator = \Validator::make(
            $request->all(),
            [
                "$lang" . '_name' => 'required|max:120',
                "$lang" . '_meta_title' => 'required|max:255',
                "$lang" . '_meta_description' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        // $pageOption->name     = $request->name;
        // $pageOption->language = $request->lang;
        // $pageOption->contents = $request->contents;
        // $pageOption->meta_title = $request->meta_title;
        // $pageOption->meta_description = $request->meta_description;
        $pageOption->enable_page_header = $request->enable_page_header;
        $pageOption->enable_page_footer = $request->enable_page_footer;
        $pageOption->update();


        $store_languages = Utility::getStoreLanguages();

        foreach ($store_languages as $lang) {

            $name  = $request["$lang" . '_name'];
            $meta_title  = $request["$lang" . '_meta_title'];
            $meta_description  = $request["$lang" . '_meta_description'];
            $contents  = $request["$lang" . '_contents'];

            if ($name) {
                $data = [
                    // 'parent_id' => $pageslug->id,
                    // 'lang' => $lang,
                    'name' => $name,
                    'contents' => $contents,
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
                ];
                // PageOptionLangs::create($data);

                PageOptionLangs::updateOrCreate(
                    [
                        'parent_id' => $id,
                        'lang' => $lang,
                    ],
                    $data
                );
            }
        }





        return redirect()->back()->with('success', __('Page Successfully Updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\PageOption $pageOption
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pageOption = PageOption::find($id)->delete();
        PageOptionLangs::where('parent_id', $id)->delete();

        return redirect()->back()->with('success', __('Page Deleted!'));
    }
    public function predefine()
    {

        Utility::createDummyPage("Imprint");
        Utility::createDummyPage("Terms and Policy");
        Utility::createDummyPage("Cookies");
    }
}
