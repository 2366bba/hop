<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationsController extends Controller
{
    public function login(){
        return view('pages.authentications.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = array(
            'email' => $request['email'],
            'password' => $request['password'],
        );

        if(Auth::guard('web')->attempt($credentials)){
            if(auth()->user()->status_verifikasi == 'terverifikasi'){
                if(auth()->user()->status_aktif == 'aktif'){
                    if(auth()->user()->level == 'superadmin'){
                        return redirect()->route('superadmin.dashboard');
                    }elseif(auth()->user()->level == 'admin'){
                        return redirect()->route('admin.dashboard');
                    }
                }else{
                    Auth::guard('web')->logout();
                    return redirect()->route('login')->with('fail', 'Your account has been disabled');
                }
            }else{
                return redirect()->route('login')->with('fail', 'This account was not verified yet. Please verifiy your account first');
            }
        }else{
            return redirect()->route('login')->with('fail', 'The email or password you entered is incorrect. Please try again');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
