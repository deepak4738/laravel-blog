<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Models\Comment;
use Exception;

class PostController extends Controller
{
    public function post()
    {
        return view('users.dashboard.pages.create_post');
       
    }
    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required', 
            'tags' => 'required', 
            'description' => 'required', 
        ]);
        
        $post = new Post();
        $post['date'] = date("Y/m/d");
        $post['user_id'] = Auth::user()->id;
        $post['title'] = $request->title;
        $post['author'] = $request->author;
        $post['tags'] = $request->tags;
        $post['description'] = $request->description;
        if($post->save()){
            return redirect()->route('user.postList')->with("success", "Your Post Created Successfully");
        }
        return redirect()->route('user.post')->with("error", "your post has not been created");
        
    }

    public function postList()
    {
        $postList = Post::where('user_id', Auth::user()->id)->paginate(10);
        return view('users.dashboard.pages.post_list')->with(compact('postList'));
    }

    public function postEdit($id)
    {   
        if(Post::where('user_id', Auth::user()->id)->where('id',$id)->first()){
            $postData = Post::find($id);
            return view('users.dashboard.pages.edit_post')->with(compact('postData'));
        }
        return redirect()->route('user.postList')->with("error", "You can't edit someone else's post");
        
    }
    public function updatePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required', 
            'tags' => 'required', 
            'description' => 'required', 
        ]);

        Post::where('id', $request->id)
        ->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'tags'=>$request->tags,
            'description'=>$request->description
        ]);
        return redirect()->route('user.postList')->with("success", "Your post has been updated");
    }
    public function deletePost($id)
    {
        $postData = Post::find($id);
        if($postData->delete()){
            return redirect()->route('user.postList')->with("success", "Your post has been deleted");
        }
        
    }
}
