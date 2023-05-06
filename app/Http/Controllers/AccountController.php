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
}
