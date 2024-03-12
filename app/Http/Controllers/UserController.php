<?php

namespace App\Http\Controllers;

use App\Models\LangSpecialist;
use App\Models\Store;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\FacadesAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 'super admin') {
            $users = User::select(
                [
                    'users.*',
                ]
            )->where('users.created_by', Auth::user()->creatorId())->groupBy('users.id')->get();
            return view('users.index', compact('users'));
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if (Auth::user()->type == 'super admin') {
            $user = User::find($id);
            return view('users.edit', compact('user'));
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

        if (Auth::user()->type == 'super admin') {
            $user = User::find($id);
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required|max:120',
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                    ]
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $user['name'] = $request->name;
            $user['email'] = $request->email;
            $user->update();

            return redirect()->back()->with('success', __('Successfully Updated!'));
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

    public function getLangSpecialists()
    {
        if (Auth::user()->type == 'super admin') {
            $users = User::where('type', 'language_specialist')->where('is_verified', 1)->groupBy('id')->get();
            return view('users.language_specialist', compact('users'));
        }
    }
    public function editLangSpecialist(Request $request, $id)
    {

        if (Auth::user()->type == 'super admin') {
            $user = User::find($id);
            $langSpecialist = LangSpecialist::where("user_id",$id)->first();

            

            return view('users.edit_lang_spec', compact('user','langSpecialist'));
        }
    }
    public function updateLangSpecialist(Request $request, $user_id)
    {

        if (Auth::user()->type == 'super admin') {
            $langSpecialist = LangSpecialist::updateOrCreate(
                [
                    'user_id' => $user_id,
                ],
                [
                    'languages' => json_encode($request->lang),
                ],
            );

            if(!$request->lang){
                LangSpecialist::find($langSpecialist->id)->delete();
            }

            return redirect()->back()->with('success', __('Language change successfully.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function acceptTerms(Request $request)
    {

        Auth::user()->acceptTerms();
        return response()->json(
            [
                'status' => 'ok',
                'success' => __('Yes'),
            ]
        );

    }
}
