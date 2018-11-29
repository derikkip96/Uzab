<?php

namespace App\Http\Controllers\Storefront;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function cart()
    {
        return view('Storefront.shop.cart');
    }

    public function checkout()
    {
        return view('Storefront.shop.checkout');
    }
}
