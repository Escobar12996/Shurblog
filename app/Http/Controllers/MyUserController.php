<?php

namespace App\Http\Controllers;

use App\Request\ValidationFormUserData;
use App\Request\ValidationFormUserImage;
use App\Request\ValidationFormUserPass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function update(ValidationFormUserData $request) {

        User::where('id', Auth::User()->id)->update(['user' => $request->user, 'email' => $request->email, 'name' => $request->name]);
        return redirect('myuser');

    }

    public function updateImage(ValidationFormUserImage $request) {
        $image = $request->file('image');
        $path = $image->store('imagenesUsuario');
        $usuario = User::find(Auth::User()->id);

        if ($usuario->image !== ''){
            unlink(storage_path('app\imagenesUsuario\\'.$usuario->image));
        }
        $usuario->image = str_replace('imagenesUsuario/', '', $path);
        $usuario->save();
        return redirect('myuser');
    }

    public function updatePassword(ValidationFormUserPass $request) {

        if (Hash::check($request->passwordv, Auth::user()->password) && strcmp($request->password ,$request->password_confirmed)){

            User::where('id', Auth::User()->id)->update(['password' => Hash::make($request->password)]);

            return redirect('myuser');
        } else {
            return view('user.myuser')->with('usuario', Auth::user())->with('notice', 'La contraseña actual no es correcta');
        }

        return redirect('myuser');
    }

    public function getviewusers() {
        $usuarios = User::orderBy('id', 'asc')->paginate(10);
        return view('user.editusers')->with('usuarios', $usuarios);
    }

    public function chtype(Request $request, $id) {
        $usuario = User::find($id);
        $usuario->type = $request->type;
        $usuario->save();

        return redirect('viewusers');
    }


}
