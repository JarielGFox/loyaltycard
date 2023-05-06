<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::All(); // metodo All() prende il contenuto della tabella "products"

        return view('catalogue.index', compact('products'));

        // VAI AD UN'ORA E TRENTATRE E RIPRENDI DA LI'!!!
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalogue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) { // verifichiamo che e se l'immagine c'è e sia valida

            $picName = $request->file('image')->getClientOriginalName(); // convertiamo nome immagine con quello del titolo
            $picFormat = $request->file('image')->extension(); // ci assicuriamo che l'immagine mantenga la sua estensione
            $product->image = $request->file('image')->storeAs('/public/images', $picName . '.' . $picFormat); // specifichiamo il percorso di storage dell'immagine, storeAs() restituisce il percorso dell'immagine

            $product->save();
        }

        return redirect()->route('catalogue.create')->with(['success' => 'The product has been successfully uploaded!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('catalogue.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
