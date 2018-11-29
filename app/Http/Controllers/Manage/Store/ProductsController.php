<?php

namespace App\Http\Controllers\manage\Store;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('manage.store.inventory.product', compact('products'));
    }
    public function create ()
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();

        return view('manage.store.inventory.create', compact('categories','brands'));

    }

    public function store(ProductCreateRequest $request)
    {

        $data = $request->all();
        DB::beginTransaction();

        try {
            $product = new Product();
            $product->name = $data['product_name'];
            $product->slug = str_slug($data['product_name']);
            $product->price = $data['product_price'];
            $product->description = $data['product_description'];
            $product->category_id = $data['product_category'];
            $product->brand_id = $data['product_brand'];
            $product->quantity=$data['product_qty'];

            if ($request->get('product_image')) {
                $fileName = $this->generateString(20);

                $product->addMediaFromRequest($data['product_image'])
                    ->usingFileName($fileName)
                    ->usingName($product->name. '-pimage')
                    ->toMediaCollection('product-images');
            }

            $product->save();

            DB::commit();

            return redirect()->route('merchant.products.index')->withSuccess('Product created successfully');

        } catch (\Exception $exception) {
            throw $exception;
            DB::rollBack();
            return redirect()->back()->withInput($data)->withError('Product could not be created, an error occurred');
        }
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('manage.store.inventory.edit',compact('product','categories','brands'));
    }

    public function update(ProductUpdateRequest $request,Product $product)
    {
        $data = $request->all();
        DB::beginTransaction();

        try {
            $product = new Product();
            $product->name = $data['product_name'];
            $product->slug = str_slug($data['product_name']);
            $product->price = $data['product_price'];
            $product->description = $data['product_description'];
            $product->category_id = $data['product_category'];
            $product->brand_id = $data['product_brand'];
            $product->quantity=$data['product_qty'];

//            if ($request->get('product_image')) {
//                $fileName = $this->generateString(20);
//
//                $product->addMediaFromRequest($data['product_image'])
//                    ->usingFileName($fileName)
//                    ->usingName($product->name. '-pimage')
//                    ->toMediaCollection('product-images');
//            }

            $product->save();

            DB::commit();

            return redirect()->route('merchant.products.index')->withSuccess('Product created successfully');

        } catch (\Exception $exception) {
            throw $exception;
            DB::rollBack();
            return redirect()->back()->withInput($data)->withError('Product could not be created, an error occurred');
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
