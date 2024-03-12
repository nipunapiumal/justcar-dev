<?php

namespace App\Http\Controllers;

use App\Models\JobBoard;
use App\Models\JobCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->current_store;

        $job_categories = JobCategories::where('store_id', $user)->where('created_by', Auth::user()->creatorId())->get();

        return view('job_category.index', compact('job_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro_cat = JobCategories::where('name', $request->name)->where('store_id', Auth::user()->current_store)->first();
        if (!empty($pro_cat)) {
            return redirect()->back()->with('error', __('Category Already Exist!'));
        }
        $this->validate(
            $request,
            [
                'name' => 'required|max:100',
            ]
        );

        $jobCategories             = new JobCategories();
        $jobCategories['store_id'] = Auth::user()->current_store;
        $jobCategories['name']     = $request->name;
        $jobCategories['created_by'] = Auth::user()->creatorId();
        $jobCategories->save();

        return redirect()->back()->with('success', __('Category added!'));
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
    public function edit(JobCategories $job_categorie)
    {
        return view('job_category.edit', compact('job_categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobCategories $job_categorie)
    {
        $pro_cat = JobCategories::where('name', $request->name)->where('store_id', Auth::user()->current_store)->first();

        $this->validate(
            $request,
            [
                'name' => 'required|max:100',
            ]
        );

        $job_categorie['name'] = $request->name;
        $job_categorie['created_by'] = \Auth::user()->creatorId();
        $job_categorie->update();

        return redirect()->back()->with('success', __('Category updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategories $job_categorie)
    {
        $product = JobBoard::where('job_category', $job_categorie->id)->get();

        if ($product->count() != 0) {
            return redirect()->back()->with(
                'error',
                __('Category is used in job board!')
            );
        } else {
            $job_categorie->delete();

            return redirect()->back()->with(
                'success',
                __('Category has been deleted!')
            );
        }
    }
}
