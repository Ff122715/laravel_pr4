<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::get(),
            'img' => Image::get(),
            //'basket' => Basket::getBasket()->get()
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
}
