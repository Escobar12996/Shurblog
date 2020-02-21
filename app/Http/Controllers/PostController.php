<?php

namespace App\Http\Controllers;

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

    public function crearpost(Request $request){
        return view('posts.crearpost');
    }

    public function createPost(Request $request){

        $post = new Post();
        $post->tittle=$request->tittle;
        $post->body=$request->body;
        $post->create=Auth::User()->id;
        $post->save();
        return redirect()->back();
    }

    public function viewPost($nombrepost){
        $post = DB::table('post')->where('tittle', $nombrepost)->first();
        $message = Message::where('post', '=', $post->id)->get();
        return view('posts.verpost')->with('post', $post)->with('messages', $message);
    }
}
