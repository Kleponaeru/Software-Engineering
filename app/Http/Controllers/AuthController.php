<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    // view
    public function login(){
        return view('login');
    }

    // validate
    public function validateLogin(Request $request){
        // validate
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // validate input request
        $datalogin = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];
        if(Auth::attempt($datalogin)){
            //hak akses
            if(Auth::user()->role == 'Pemilik'){
                return redirect('/pemilik/dashboard');
            } 
            elseif(Auth::user()->role == 'Pengambil'){
                return redirect('/pengambil/dashboard');
            }
            elseif(Auth::user()->role == 'Bank'){
                return redirect('/bank/dashboard');
            }
        }
        else{
            return redirect('/login')->withErrors('Email atau Password tidak sesuai!');
        }
    }

    // logout
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
