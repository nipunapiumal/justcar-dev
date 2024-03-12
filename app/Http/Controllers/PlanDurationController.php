<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanDuration;
use Illuminate\Http\Request;

class PlanDurationController extends Controller
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
            $planDurations = PlanDuration::all();

            return view('plan_duration.index', compact('planDurations'));
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
            $plans = Plan::all();

            return view('plan_duration.create', compact('plans'));
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
                    'plan_id' => 'required|max:120',
                    'duration' => 'required|max:120',
                    'price' => 'required',

                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $planDuration               = new PlanDuration();
            $planDuration->plan_id =  $request['plan_id'];
            $planDuration->duration         =  $request['duration'];
            $planDuration->price         =  $request['price'];
            $planDuration->save();

            return redirect()->back()->with('success', __('Added Successfully'));
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
        $planDuration = PlanDuration::find($id);
        $plans = Plan::all();

        return view('plan_duration.edit', compact('planDuration', 'plans'));
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
                    'plan_id' => 'required|max:120',
                    'duration' => 'required|max:120',
                    'price' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $planDuration               = PlanDuration::find($id);;
            $planDuration->plan_id =  $request['plan_id'];
            $planDuration->duration         =  $request['duration'];
            $planDuration->price         =  $request['price'];
            $planDuration->save();
            
            return redirect()->back()->with(
                'success',
                __('Updated Successfully!')
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
        //
    }
}
