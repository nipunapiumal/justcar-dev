<?php

namespace App\Http\Controllers;

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
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
            $vehicleModels = VehicleModel::all();

            return view('vehiclemodel.index', compact('vehicleModels'));
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
            $vehicleBrands = VehicleBrand::all();

            return view('vehiclemodel.create', compact('vehicleBrands'));
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
                    'brand' => 'required|max:120',
                    'name' => 'required|max:120',

                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $vehicleModel               = new VehicleModel();
            $vehicleModel->vehicle_brand_id =  $request['brand'];
            $vehicleModel->name         =  $request['name'];
            $vehicleModel->created_by = \Auth::user()->creatorId();
            $vehicleModel->save();

            return redirect()->back()->with('success', __('Vehicle model added!'));
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
     * @param \App\VehicleModel $vehicleModel
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($vehicleModel)
    {
        $vehicleModel = VehicleModel::find($vehicleModel);
        $vehicleBrands = VehicleBrand::all();

        return view('vehiclemodel.edit', compact('vehicleModel', 'vehicleBrands'));
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
        if (\Auth::user()->type == 'super admin') {
            $validator = \Validator::make(
                $request->all(),
                [
                    'brand' => 'required|max:120',
                    'name' => 'required|max:120',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $vehicleModel = VehicleModel::find($id);
            $vehicleModel->vehicle_brand_id =  $request['brand'];
            $vehicleModel->name         =  $request['name'];
            $vehicleModel->created_by = \Auth::user()->creatorId();
            $vehicleModel->save();

            return redirect()->back()->with(
                'success',
                __('Vehicle model updated!')
            );
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
        if (\Auth::user()->type == 'super admin') {

            $vehicleModel = VehicleModel::find($id);
            $vehicleModel->delete();

            return redirect()->back()->with(
                'success',
                __('Vehicle model deleted!')
            );
        }
    }
}
