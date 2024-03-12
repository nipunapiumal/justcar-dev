<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->type == 'super admin') {

            $user         = \Auth::user()->current_store;
            $advertisements = Advertisement::all();

            return view('advertisement.index', compact('advertisements'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->type == 'super admin') {
            return view('advertisement.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (\Auth::user()->type == 'super admin') {
            if ($request['advertisement_type'] == 1) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'device' => 'required|max:120',
                        'advertisement_type' => 'required|max:120',
                        'info' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
                        'url' => 'required',
                    ]
                );
            }
            else if ($request['advertisement_type'] == 2) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'device' => 'required|max:120',
                        'advertisement_type' => 'required|max:120',
                        // 'info' => 'required',
                    ]
                );
            } 
            else if ($request['advertisement_type'] == 3) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'device' => 'required|max:120',
                        'advertisement_type' => 'required|max:120',
                        'url' => 'required'
                    ]
                );
            } 

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
           
            $advertisement = new Advertisement();
            if (!empty($request->info) && $request['advertisement_type'] == 1) {

                $filenameWithExt  = $request->file('info')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('info')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir              = storage_path('uploads/advertisement/');
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('info')->storeAs('uploads/advertisement/', $fileNameToStores);
                $advertisement->info         =  $fileNameToStores;
                $advertisement->url         =  $request['url'];

            }else if ($request['advertisement_type'] == 3) {
                $advertisement->url         =  $request['url'];
            } 
            else {
                $advertisement->info         =  html_entity_decode
            }

            $advertisement->created_by = \Auth::user()->creatorId();
            $advertisement->device = $request['device'];
            $advertisement->advertisement_type = $request['advertisement_type'];
            $advertisement->save();

            return redirect()->back()->with('success', __('Advertisement added!'));
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
        $advertisement = Advertisement::find($id);
        return view('advertisement.edit', compact('advertisement'));
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
        if ($request['advertisement_type'] == 1) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'device' => 'required|max:120',
                    'advertisement_type' => 'required|max:120',
                    'info' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
                    'url' => 'required',
                ]
            );
        }
        else if ($request['advertisement_type'] == 2) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'device' => 'required|max:120',
                    'advertisement_type' => 'required|max:120',
                    'info' => 'required',
                ]
            );
        } 
        else if ($request['advertisement_type'] == 3) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'device' => 'required|max:120',
                    'advertisement_type' => 'required|max:120',
                    'url' => 'required'
                ]
            );
        } 

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        // $validator = \Validator::make(
        //     $request->all(),
        //     [
        //         'device' => 'required|max:120',
        //         'advertisement_type' => 'required|max:120',
        //         'info' => ($request['advertisement_type'] == 2 ? 'required' : 'required|mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480'),
        //         'url' => ($request['advertisement_type'] == 1 ? 'required' : ''),
        //     ]
        // );
        // if ($validator->fails()) {
        //     $messages = $validator->getMessageBag();

        //     return redirect()->back()->with('error', $messages->first());
        // }
        $advertisement = Advertisement::find($id);


        if (!empty($request->info) && $request['advertisement_type'] == 1) {
            $filenameWithExt  = $request->file('info')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('info')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/advertisement/');
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('info')->storeAs('uploads/advertisement/', $fileNameToStores);
            $advertisement->info         =  $fileNameToStores;
            $advertisement->url         =  $request['url'];
        } else if ($request['advertisement_type'] == 3) {
            $advertisement->url         =  $request['url'];
        } else {
            $advertisement->info         =  $request['info'];
        }

        $advertisement->created_by = \Auth::user()->creatorId();
        $advertisement->device = $request['device'];
        $advertisement->advertisement_type = $request['advertisement_type'];
        $advertisement->save();

        return redirect()->back()->with(
            'success',
            __('Advertisement updated!')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->type == 'super admin') {

            $object = Advertisement::find($id);
            $object->delete();

            return redirect()->back()->with(
                'success',
                __('Advertisement deleted!')
            );
        }
    }
}
