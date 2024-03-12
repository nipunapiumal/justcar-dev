<?php
namespace App\Http\Controllers;

use App\Models\InteriorColor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InteriorColorController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 'super admin') {
            $user         = Auth::user()->current_store;
            $entries = InteriorColor::all();

            return view('interiorcolor.index', compact('entries'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type == 'super admin') {
            $entries = InteriorColor::all();
            return view('interiorcolor.create', compact('entries'));
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
        if (Auth::user()->type == 'super admin') {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',

                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $object               = new InteriorColor();
            $object->name         = $request['name'];
            $object->created_by = Auth::user()->creatorId();
            $object->save();

            return redirect()->back()->with('success', __('Interior color added!'));
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
     * @param \App\VehicleModel $object
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($object)
    {
        $object = InteriorColor::find($object);
        return view('interiorcolor.edit', compact('object'));
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
        if (Auth::user()->type == 'super admin') {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $object = InteriorColor::find($id);
            $object->name         =  $request['name'];
            $object->created_by = Auth::user()->creatorId();
            $object->save();

            return redirect()->back()->with(
                'success',
                __('Interior color updated!')
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
        if (Auth::user()->type == 'super admin') {

            $object = InteriorColor::find($id);
            $object->delete();

            return redirect()->back()->with(
                'success',
                __('Interior color deleted!')
            );
        }
    }
}
