<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller {

    public function createComentario(Request $request, $post){
        $comentario = new Message();
        $comentario -> message = $request -> message;
        $comentario -> post = $post;
        $comentario -> user_id = Auth::User()->id;
        $comentario -> save();
        return redirect()->back();
    }


}
