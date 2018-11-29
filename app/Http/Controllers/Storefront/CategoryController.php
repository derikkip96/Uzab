<?php

namespace App\Http\Controllers\Storefront;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('Storefront.category.index',compact('categories'));
        
    }
}
