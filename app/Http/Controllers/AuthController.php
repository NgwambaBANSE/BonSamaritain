<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    public function connexion(Request $request){
        $credentials = $request->validate([
            'email' => "required|email",
            'password'=> "required",
        ]);
        if(Auth::attempt($credentials) && Auth::user()->role_id === 1){
            $request->session()->regenerate();
            return redirect()->route('home')->with('status', "");
        }elseif(Auth::attempt($credentials) && Auth::user()->role_id === 2){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'Email ou mot de pass invalide',
        ]);
        
    
    }



}
