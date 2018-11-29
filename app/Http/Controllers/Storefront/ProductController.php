<?php

namespace App\Http\Controllers\Storefront;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Storefront.product.index',compact('products'));
    }

    public function show(Product $product)
    {
        return view('Storefront.product.detail',compact('product'));
    }

    public function productCat(ProductCategory $category)
    {
        $products = DB::table('products')->where('category_id',$category->id)->get();
        return view('Storefront.product.index',compact('products'));
    }
}
