<?php

namespace App\Http\Controllers\Storefront;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('Storefront.brand.index',compact('brands'));
    }

    public function productBrand(Brand $brand)
    {
        $products = DB::table('products')->where('brand_id',$brand->id)->get();
        return view('Storefront.product.index',compact('products'));
    }
}
