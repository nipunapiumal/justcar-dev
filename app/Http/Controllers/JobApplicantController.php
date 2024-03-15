<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use App\Models\JobBoard;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->current_store;

        $jobApplicants = DB::table('job_applicants')
            ->select(DB::raw('job_applicants.*,job_boards.title,position'))
            ->join('job_boards', 'job_boards.id', '=', 'job_applicants.job_board')
            ->where('job_applicants.store_id', $user)->get();

        return view('job_applicants.index', compact('jobApplicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug, JobBoard $jobBoard)
    {
        $store = Store::where('slug', $slug)->where('is_store_enabled', '1')->first();
        if (empty($store)) {
            return abort('404', 'Page not found');
        }

        return view('storefront.' . $store->theme_dir . '.job_board.apply', compact('store', 'jobBoard'));
        //return view('storefront.theme16.job_board.apply', compact('store', 'jobBoard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:100',
                'email' => 'required|max:100|unique:job_applicants,email', 
                'cv' => 'required|mimes:pdf|max:20480',
                'message' => 'max:1000',
            ]
        );
        if ($validate->fails()) {
            $message = $validate->getMessageBag();
            return redirect()->back()->with('error', $message->first());
        }


        if (!empty($request->cv)) {
            if (!empty($pro_cat->cv)) {
                if (asset(Storage::exists('uploads/job_applicant/' . $pro_cat->cv))) {
                    asset(Storage::delete('uploads/job_applicant/' . $pro_cat->cv));
                }
            }

            $filenameWithExt  = $request->file('cv')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('cv')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir              = storage_path('uploads/job_applicant/');
            // if (asset(Storage::exists('uploads/job_applicant/' . ($galleryCategorie['cv'])))) {
            //     asset(Storage::delete('uploads/job_applicant/' . $galleryCategorie['cv']));
            // }

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $path = $request->file('cv')->storeAs('uploads/job_applicant/', $fileNameToStores);
        }

        $jobApplicant             = new JobApplicant();
        $jobApplicant['name']     = $request->name;
        $jobApplicant['email']     = $request->email;
        $jobApplicant['store_id'] = Auth::user()->current_store;
        $jobApplicant['cv']     = $fileNameToStores;
        $jobApplicant['job_board']     = $request->job_board;
        $jobApplicant['message']     = $request->message;
        $jobApplicant->save();

        return redirect()->back()->with('success', __('Your Application Is Submitted Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JobApplicant $jobApplicant)
    {
        $jobBoard = JobBoard::where('id', $jobApplicant->job_board)->first();
        return view('job_applicants.show', compact('jobApplicant', 'jobBoard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
