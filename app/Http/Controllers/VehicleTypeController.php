<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
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
            $vehicleTypes = VehicleType::all();

            return view('vehicletype.index', compact('vehicleTypes'));
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
            return view('vehicletype.create');
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
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required|max:120',

            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $vehicleType               = new VehicleType();
        $vehicleType->name         =  $request['name'];
        $vehicleType->created_by = \Auth::user()->creatorId();
        $vehicleType->save();

        return redirect()->back()->with('success', __('Vehicle type added!'));
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
     * @param \App\VehicleType $vehicleType
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($vehicleType)
    {
        $vehicleType = VehicleType::find($vehicleType);
        return view('vehicletype.edit', compact('vehicleType'));
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
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required|max:120',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $vehicleType = VehicleType::find($id);
        $vehicleType->name       = $request->name;
        $vehicleType->created_by = \Auth::user()->creatorId();
        $vehicleType->save();

        return redirect()->back()->with(
            'success',
            __('Vehicle type updated!')
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

        $vehicleType = VehicleType::find($id);
        $vehicleType->delete();

        return redirect()->back()->with(
            'success',
            __('Vehicle type deleted!')
        );
    }
}
