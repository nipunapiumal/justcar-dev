<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use App\Models\JobBoard;
use App\Models\JobCategories;
use App\Models\PageOption;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->current_store;

        $job_boards = JobBoard::where('store_id', $user)->where('created_by', Auth::user()->creatorId())->get();
        return view('job_boards.index', compact('job_boards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobCategories = JobCategories::where('store_id', Auth::user()->current_store)->pluck('name', 'id');
        return view('job_boards.create', compact('jobCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro_cat = JobBoard::where('title', $request->title)->where('store_id', Auth::user()->current_store)->first();
        if (!empty($pro_cat)) {
            return redirect()->back()->with('error', __('Job Board Already Exist!'));
        }
        $this->validate(
            $request,
            [
                'title' => 'required|max:100',
                'position' => 'required|max:100',
                'job_category' => 'required',
            ]
        );

        $jobBoard             = new JobBoard();
        $jobBoard['title']     = $request->title;
        $jobBoard['position']     = $request->position;
        $jobBoard['job_category']     = $request->job_category;
        $jobBoard['store_id'] = Auth::user()->current_store;
        $jobBoard['meta_description'] = $request->meta_description;
        $jobBoard['vacancy'] = $request->vacancy;
        $jobBoard['job_context'] = $request->job_context;
        $jobBoard['job_responsibility'] = $request->job_responsibility;
        $jobBoard['educational_requirements'] = $request->educational_requirements;
        $jobBoard['experience_requirements'] = $request->experience_requirements;
        $jobBoard['additional_requirements'] = $request->additional_requirements;
        $jobBoard['employment_status'] = $request->employment_status;
        $jobBoard['compensation_other_benefits'] = $request->compensation_other_benefits;
        $jobBoard['salary'] = $request->salary;
        $jobBoard['created_by'] = Auth::user()->creatorId();
        $jobBoard->save();

        return redirect()->back()->with('success', __('Job Board added!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $store = Store::where('slug', $slug)->where('is_store_enabled', '1')->first();
        if (empty($store)) {
            return abort('404', 'Page not found');
        }
        $page_slug_urls = PageOption::get_page_slug_urls($store);
        $jobBoards = JobBoard::where('store_id', $store->id);
        $jobBoards = $jobBoards->orderBy('id', 'DESC')->get();
        $storethemesetting = \App\Models\Utility::demoStoreThemeSetting($store->id, $store->theme_dir);
        
        return view('storefront.' . $store->theme_dir . '.job_board.index', compact('store', 'jobBoards','storethemesetting','page_slug_urls'));
        //return view('storefront.theme16.job_board.index', compact('store', 'jobBoards','storethemesetting','page_slug_urls'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobBoard $jobBoard)
    {

        $jobCategories = JobCategories::pluck('name', 'id');
        return view('job_boards.edit', compact('jobBoard', 'jobCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobBoard $jobBoard)
    {
        $pro_cat = JobBoard::where('id', $request->id)->where('store_id', Auth::user()->current_store)->first();
        $this->validate(
            $request,
            [
                'title' => 'required|max:100',
                'position' => 'required|max:100',
                'job_category' => 'required',
            ]
        );

        $jobBoard['title'] = $request->title;
        $jobBoard['position']     = $request->position;
        $jobBoard['job_category']     = $request->job_category;
        $jobBoard['created_by'] = \Auth::user()->creatorId();
        $jobBoard['meta_description'] = $request->meta_description;
        $jobBoard['vacancy'] = $request->vacancy;
        $jobBoard['job_context'] = $request->job_context;
        $jobBoard['job_responsibility'] = $request->job_responsibility;
        $jobBoard['educational_requirements'] = $request->educational_requirements;
        $jobBoard['experience_requirements'] = $request->experience_requirements;
        $jobBoard['additional_requirements'] = $request->additional_requirements;
        $jobBoard['employment_status'] = $request->employment_status;
        $jobBoard['compensation_other_benefits'] = $request->compensation_other_benefits;
        $jobBoard['salary'] = $request->salary;
        $jobBoard->update();

        return redirect()->back()->with('success', __('Job Board updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobBoard $jobBoard)
    {
        $jobBoard->delete();

        return redirect()->back()->with(
            'success',
            __('Job board has been deleted!')
        );
    }

    
  
}
