<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosController extends Controller {

    /**
     * @param Request $request
     * @param $post
     * @return \Illuminate\Http\RedirectResponse
     *
     * Crea el comentario para los posts
     */
    public function createComentario(Request $request, $post){
        $comentario = new Message();
        $comentario -> message = $request -> message;
        $comentario -> post = $post;
        $comentario -> user_id = Auth::User()->id;
        $comentario -> save();
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * Elimina el comentario de los posts
     */
    public function deleteComentario( Request $request, $id){
        $comentario = Message::find($id);
        $comentario->delete();
        return redirect()->back();

    }

}
