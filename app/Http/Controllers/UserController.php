<?php

namespace App\Http\Controllers;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginIn(Request $request)
    {
            $request->validate([
                 'nom' => "required|string|max:100",
                 'prenom' => "required|string|max:100",
                 'email' => "required|email",
                 'password'=> "required|string|max:8",
                 'role_id' => 'required|string'
    
             ]);
             $inscription = new User();
             $inscription->nom = $request->nom;
             $inscription->prenom = $request->prenom;
             $inscription->email = $request->email;
             $inscription->password= Hash::make($request->password);
             $inscription->role_id= 2;
             $inscription->save();
             return redirect()->route('managersListe')->with("success","Inscrit avec succès");
    
    
    }


}
