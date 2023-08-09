<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AccueilController extends Controller
{
    public function accueil(){
        $products = Product::latest()->paginate(5);
        return view('accueil', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
