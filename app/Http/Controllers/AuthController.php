<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auths.login');
    }
    public function postlogin(Request $request){

        if(Auth::attempt($request->only('email','password'))){
            return redirect('/suara');
        }
        return redirect('/login')->with('error','Email atau Password salah');
    }
    public function logout(){
        
        Auth::logout();
        return redirect('/login');
    }

    public function user(){
        $user = User::all();
        return view('auths.user',compact('user'));
    }

    public function profile($id){
        $users = User::find($id);
        return view('auths.profile',compact('users'));
    }

    public function getpassword($id){
        $user = User::find($id);
        return view('auths.editpassword',compact('user'));
    }

    public function postpassword(Request $request, $id){

        $this->validate($request, [

            'password' => 'required|min:8',
            'new_password' => 'min:8|different:password',
        ]);
        
        $data = $request->all();
        // dd($data);
        $user = auth()->user();
        if (!Hash::check($data['password'], $user->password)) {
            return back()->with('error', 'Password lama salah');
        } else {
            // write code to update password

            $user->update([

                'password' => bcrypt($request->new_password),
            ]);
            return redirect('/dashboard')->with('success','Berhasil ganti password');
        }
    }
        
}
