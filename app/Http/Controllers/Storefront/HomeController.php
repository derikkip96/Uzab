<?php

namespace App\Http\Controllers\Storefront;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();
//        dd($categories);
        return view('Storefront.home.home',compact('products','brands','categories'));

    }
}
