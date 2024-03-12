<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleBrandController extends Controller
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
            $vehicleBrands = VehicleBrand::all();

            return view('vehiclebrand.index', compact('vehicleBrands'));
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

            $vehicleTypes = VehicleType::pluck('name', 'id');
            return view('vehiclebrand.create',compact('vehicleTypes'));
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
                'vehicle_type' => 'required|max:120',
                'name' => 'required|max:120',

            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $vehicle_brand               = new VehicleBrand();
        $vehicle_brand->vehicle_type_id =  $request['vehicle_type'];
        $vehicle_brand->name         =  $request['name'];
        $vehicle_brand->created_by = \Auth::user()->creatorId();
        $vehicle_brand->save();

        return redirect()->back()->with('success', __('Vehicle brand added!'));
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
     * @param \App\VehicleBrand $vehicleBrand
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($vehicleBrand)
    {
        $vehicleBrand = VehicleBrand::find($vehicleBrand);
        $vehicleTypes = VehicleType::pluck('name', 'id');
        return view('vehiclebrand.edit', compact('vehicleBrand','vehicleTypes'));
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
                'vehicle_type' => 'required|max:120',
                'name' => 'required|max:120',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $vehicleBrand = VehicleBrand::find($id);
        $vehicleBrand->name       = $request->name;
        $vehicleBrand->vehicle_type_id =  $request->vehicle_type;
        $vehicleBrand->created_by = \Auth::user()->creatorId();
        $vehicleBrand->save();

        return redirect()->back()->with(
            'success',
            __('Vehicle brand updated!')
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

        $vehicleBrand = VehicleBrand::find($id);
        $vehicleBrand->delete();

        return redirect()->back()->with(
            'success',
            __('Vehicle brand deleted!')
        );
    }
}
