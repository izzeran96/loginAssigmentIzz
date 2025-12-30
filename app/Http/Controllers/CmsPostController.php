<?php

namespace App\Http\Controllers;

use App\Models\PostContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsPostController extends Controller
{
    //
    public function index(){
        $cmsContent = PostContent::where('user_id',Auth::id())->get();
        return view('Dashboard.cms.index',compact('cmsContent'));
    }

    public function cmsContent(){
        return view('Dashboard.cms.create');
    }


    public function cmsPostContent(Request $request){
        $user = Auth::user();
        $postCreate = PostContent::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tags' => $request->input('tags'),
        ]);
        $user->activities()->create([
            'activity' => 'Post Created => '.$postCreate->title .' '.$postCreate->user->name,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);
            return redirect()
                ->route('cms.index')
                ->with('success', 'Content has been posted successfully!');
    }

    public function edit($title, $id)
    {
        $content = PostContent::findOrFail($id);

        return view('Dashboard.cms.edit', compact('content'));
    }

    public function editPost(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);
    }
}
