<?php

namespace App\Http\Controllers;

use App\Models\ThreadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ThreadCategory::get();
        return view('thread_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->type == 'super admin') {
            return view('thread_category.create');
        } else {
            return back()->with('error', __('Error'));
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
        $category = ThreadCategory::where('name', $request->name)->first();
        if (!empty($category)) {
            return redirect()->back()->with('error', __('Category already exists!'));
        }
        $this->validate(
            $request,
            [
                'name' => 'required|max:40',
            ]
        );

        $thread_category = new ThreadCategory();
        $thread_category['name']     = $request->name;
        $thread_category['created_by'] = Auth::user()->creatorId();
        $thread_category->save();

        return redirect()->back()->with('success', __('Added Successfully'));
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
        if (\Auth::user()->type == 'super admin') {
            $category = ThreadCategory::find($id);
            return view('thread_category.edit', compact('category'));
        } else {
            return back()->with('error', __('Error'));
        }
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
        $category = ThreadCategory::find($id);

        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:thread_categories|max:40',
            ]
        );


        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }



        $category['name']     = $request->name;
        $category->update();

        return redirect()->back()->with('success', __('Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thread = ThreadCategory::where('id', $id)->first();
        $thread->delete();

        return redirect()->back()->with('success', __('Successfully deleted!'));
    }
}
