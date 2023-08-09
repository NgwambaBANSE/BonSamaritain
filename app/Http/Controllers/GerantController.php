<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GerantController extends Controller
{
    public function gerant(){
        return view('gerant.create');
    }
    public function gerantIndex(){
        $users = User::latest()->paginate(5);
        return view('gerant.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
        ;
    }
    public function gerantEdit(){
        return view('gerant.edit');
    }
    public function gerantStore(Request $request){
        $request->validate([
            'nom' => "required|string|max:100",
            'prenom' => "required|string|max:100",
            'email' => "required|email",
            'password'=> "required|string|max:8",
            // 'role_id' => 'required|string'

        ]);
        $gerant = new User();
        $gerant ->nom=$request->nom;
        $gerant ->prenom=$request->prenom;
        $gerant ->email=$request->email;
        $gerant ->password=Hash::make($request->password);
        $gerant ->role_id=2;
        $gerant->save();
        return redirect()->route('gerant.index')->with('success', 'Gerant ajouter avec succès');
    }
}
