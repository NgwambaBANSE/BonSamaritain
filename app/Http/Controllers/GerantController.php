<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class GerantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('gerants.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('gerants.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gerants.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(User $users): View
    {

        return view('gerants.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
            return view('gerants.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user): RedirectResponse
    {
        $request->validate([
            
            'name_produit' => 'required',
            'prix' => 'required',
            'detail' => 'required'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $user->update($input);
        return redirect()->route('products.index')
            ->with('success', 'Modifier avecc succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('gerants.index')
            ->with('success', 'Vous venez de supprimer le gerant');

    }
}
