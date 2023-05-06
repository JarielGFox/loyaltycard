<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AccountController extends Controller
{
    public function card()
    {
        $products = Product::All();

        return view('account.card', compact('products'));
    }

    public function reward(Product $product)
    {
        $product->users()->attach(auth()->user()->id);

        // auth()->user()->products()->attach($product->id);

        return redirect()->back()->with(['success' => 'The item has been successfully ordered!']);
    }

    public function rewardUndo(Product $product)
    {
        $product->users()->detach(auth()->user()->id);

        return redirect()->back()->with(['success' => 'The order has been canceled!']);
    }
}
