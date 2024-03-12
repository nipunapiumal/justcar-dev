<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Thread;
use App\Models\ThreadReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = \Validator::make(
            $request->all(),
            [
                'body' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $thread_reply = new ThreadReply();
        $thread_reply['thread_id']     = $request->thread_id;
        $thread_reply['body']     = $request->body;
        $thread_reply['created_by'] = Auth::user()->creatorId();
        $thread_reply->save();

        $thread = Thread::find($request->thread_id);
        $thread_owner = User::find($thread->created_by);


        if (\Auth::user()->type != 'super admin') {
            $store = Store::find(\Auth::user()->current_store);
            Utility::sendEmailTemplate('Joining the Discussion', $thread_owner->email, null, $store, null);
        }


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
    public function edit(ThreadReply $threadReply)
    {
        return view('thread_reply.edit', compact('threadReply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThreadReply $threadReply)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'body' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $threadReply['body']     = $request->body;
        $threadReply->save();

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
        $thread = ThreadReply::where('id', $id)->first();
        $thread->delete();

        return redirect()->back()->with('success', __('Successfully deleted!'));
    }
}
