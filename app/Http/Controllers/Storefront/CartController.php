<?php

namespace App\Http\Controllers\Storefront;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use LukePOLO\LaraCart\LaraCart;
use LukePOLO\LaraCart\Facades\LaraCart;



class CartController extends Controller
{
    public function index()
    {
        $items = LaraCart::getItems();
        return view('Storefront.shop.cart',compact('items'));
    }
    public function add($id)
    {
        $product = Product::find($id);
        LaraCart::add(
            $product->id,
            $product->name,
            $product->quantity,
            $product->price
             );
        return redirect()->route('products.index');
    }

    public function remove(Request $request)
    {
        LaraCart::removeItem($request->item);
        return redirect()->back()->with('success','success');
    }

    public function cartAddQty(Request $request)
    {
        $item = LaraCart::find(['itemHash' => $request->item]);
        $item->quantity = $item->quantity + 1;
        return redirect()->back()->with('success','success');

    }
}
