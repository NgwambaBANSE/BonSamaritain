<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(Request $request): View
    {   
        $search = $request['search']??"";
        if($search != ""){
            $products = Product::where('name_product', '=', $search)->get();
        }else{
            $products = Product::all();
        }
        $products = Product::latest()->with('Category')->paginate(5);
        return view('products.index', compact('products','search'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {  $categories = Category::all();
        return view('products.create', compact('categories'));
   }
    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        $util = new Product();
        $util->name_produit = $request->input('name_produit');
        $util->prix = $request->input('prix');
        // $part = ($request->input('prix') / 10000);
        // dd($part);
        $util->detail = $request->input('detail');
        $util->category_id = $request->input('category_id', 2);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $util->image = $filename;
        }
        $util->save();
             return redirect()->route('products.index')
                       ->with('success', 'Le produit Ajouter avec succes.');
        }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
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
        $product->update($input);
        return redirect()->route('products.index')
            ->with('success', 'Modifier avecc succès');
    }
    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Vous venez de supprimer le produit');
    }
    // button recherche
    public function search(){
        $q = request()->input('q');
        
        $products = Product::where('name_produit', 'like', '%$q%')
                    ->orWhere('detail', 'like' , '%$q%')
                    ->paginate(6);
                    return view('products.research')->with('product', $products);

    }
    
}