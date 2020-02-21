<?php

namespace App\Http\Controllers;

use App\Request\ValidationFormUserData;
use App\Request\ValidationFormUserImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }


    public function getindex() {
        $usuario = User::find(Auth::User()->id);
        return view('user.myuser')->with('usuario', $usuario);
    }

    public function update(ValidationFormUserData $request, $id) {

        User::where('id', $id)->update(['user' => $request->user, 'email' => $request->email, 'name' => $request->name]);
        return redirect()->back();

    }

    public function updateImage(ValidationFormUserImage $request, $id) {
        $image = $request->file('image');
        $path = $image->store('imagenesUsuario');
        $usuario = User::find($id);

        if ($usuario->image !== ''){
            unlink(storage_path('app\imagenesUsuario\\'.$usuario->image));
        }
        $usuario->image = str_replace('imagenesUsuario/', '', $path);
        $usuario->save();
        return redirect()->back();
    }

    public function updatePassword(ValidationFormUserPass $request, $id) {
        $image = $request->file('image');
        $path = $image->store('imagenesUsuario');
        $usuario = User::find($id);


        $usuario->image = $path;
        $usuario->save();
        return redirect()->back();
    }
}
