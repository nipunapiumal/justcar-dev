<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Thread;
use App\Models\ThreadCategory;
use App\Models\ThreadReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function thread()
    {
    }
    public function index()
    {
        //forum home page
        //add thread create/store
        //edit thread edit/update
        //view single thread index
        $lang = Utility::getValByName('default_language');
        App::setLocale($lang);
        $threads = Thread::latest()->get();
        return view('thread.home', compact('lang', 'threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ThreadCategory::pluck('name', 'id');
        return view('thread.create', compact('categories'));
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
                'title' => 'required',
                'description' => 'required',
                'category_id' => 'required|max:120',
                'body' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $thread = new Thread();
        $thread['title']     = $request->title;
        $thread['description']     = $request->description;
        $thread['category_id']     = $request->category_id;
        $thread['body']     = $request->body;
        $thread['created_by'] = Auth::user()->creatorId();
        $thread->save();


        if (\Auth::user()->type != 'super admin') {
            $users = User::where('type', 'super admin')->get();
            $store = Store::find(\Auth::user()->current_store);
            foreach ($users as $user) {
                Utility::sendEmailTemplate('Thread Posted', $user->email, null, $store, null);
            }
        }

        return redirect()->route('forum-threads')->with('success', __('Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::find($id);
        $sub_threads = ThreadReply::where('thread_id', $id)->latest()->get();
        return view('thread.index', compact('thread', 'sub_threads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = ThreadCategory::pluck('name', 'id');
        $thread = Thread::find($id);
        if (\Auth::user()->type == 'super admin') {
            // return view('thread.edit', compact('thread'));
        } else if (Auth::user()->creatorId() == $thread->created_by) {
            // return view('thread.edit', compact('thread'));
        } else {
            return back();
        }
        return view('thread.edit', compact('thread', 'categories'));
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
                'title' => 'required',
                'category_id' => 'required|max:120',
                'description' => 'required',
                'body' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $thread = Thread::find($id);
        $thread['title']     = $request->title;
        $thread['description']     = $request->description;
        $thread['category_id']     = $request->category_id;
        $thread['body']     = $request->body;
        $thread->update();

        return redirect()->route('forum-threads')->with('success', __('Updated Successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thread = Thread::where('id', $id)->first();
        $thread->delete();

        return redirect()->back()->with('success', __('Successfully deleted!'));
    }
    public function viewThreads()
    {
        if (Auth::user()->type == 'super admin') {
            $threads = Thread::latest()->get();
        } else {
            $threads = Thread::where('created_by', Auth::user()->creatorId())->latest()->get();
        }
        return view('thread.threads', compact('threads'));
    }
    public function search(Request $request)
    {
        $threads = Thread::where('title', 'LIKE', '%' . $request->keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $request->keyword . '%')
            ->latest()
            ->get();
        return view('thread.home', compact('threads'));
    }
}
