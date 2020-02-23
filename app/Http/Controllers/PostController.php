<?php

namespace App\Http\Controllers;

use App\Request\ValidatePost;
use App\Request\ValidationFormUserImage;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function uploadImage(ValidationFormUserImage $request){

        $file=$request->file('file');
        $path= url('/uploads/').'/'.$file->getClientOriginalName();
        $imgpath=$file->move(public_path('/uploads/'),$file->getClientOriginalName());
        $fileNameToStore= $path;


        return json_encode(['location' => $fileNameToStore]);

    }

    public function crearpost(){
        return view('posts.crearpost');
    }

    public function editPostedit (Request $request, $id){
        $post = Post::find($id);
        $post->tittle=$request->tittle;
        $post->body=$request->body;
        $post->save();


        return redirect('viewpost/'.$post->id);
    }

    public function editPost($id){
        $post = Post::find($id);
        return view('posts.editarpost')->with('post', $post);
    }

    public function createPost(ValidatePost $request){

        $post = new Post();
        $post->tittle=$request->tittle;
        $post->body=$request->body;
        $post->user_id=Auth::User()->id;
        $post->save();


        return redirect('viewpost/'.$post->id);
    }

    public function viewPost($id){
        $post = Post::where('id', $id)->first();

        if($post == null){
            return view('errors.404');
        }

        $message = Message::where('post', '=', $id)->get();
        return view('posts.verpost')->with('post', $post)->with('messages', $message);
    }

    public function viewAllPost(){
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.visorposts')->with('posts', $posts);
    }

    public function viewMyPost(){
        $posts = Post::where('user_id', '=', Auth::User()->id)->paginate(10);
        return view('posts.visorposts')->with('posts', $posts);
    }

    public function deletepost($id){

        Message::where('post', $id)->get()->each->delete();
        Post::where('id', $id)->get()->each->delete();
        return redirect()->back();
    }


}
