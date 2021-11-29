<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use DB;
use Exception;

class FrontendController extends Controller
{
    public function index() {
        $postList = Post::withCount('comments')->paginate(2);
        
        return view('frontend.pages.front_page')->with(compact('postList'));
    }

    public function view($id) {
        $post = Post::with(['comments'])->find($id);
        return view('frontend.pages.view')->with(compact('post'));
    }

    public function Addcomment(Request $request, $id){
        $user = Auth::user();
        $comment = new Comment;
        $comment['comment'] = $request->comment;
        $comment['post_id'] = $id;
        $comment->save();
        return redirect()->back();
    }
}
