<?php

namespace App\Http\Controllers\manage\Store;

use App\Http\Requests\ProductCategoryCreateRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('manage.store.category.index', compact('categories'));
    }

    public function create()
    {
//        return view('manage.store.product.category.create');

    }

    public function store(ProductCategoryCreateRequest $request)
    {
        $data = $request->all();
        $category = new ProductCategory();

        $category->name = $data['category_name'];
        $category->slug = str_slug($data['category_name']);
        $category->description = $data['category_description'];

        if ($request->get('image')) {
            $fileName = $this->generateString(20);

            $category->addMediaFromRequest($data['category_image'])
                ->usingFileName($fileName)
                ->usingName($category->name. '-image')
                ->toMediaCollection('inventory-images');
        }
        $category->save();
        if ($request->get('modal')) {
            return redirect()->back()->withSuccess('Category created successfully');
        }

        return redirect()->route('merchant.categories.index');

    }

    public function edit(ProductCategory $category)
    {
        return view('manage.store.category.edit',compact('category'));

    }

    public function update(ProductCategoryUpdateRequest $request, ProductCategory $category)
    {
        $data = $request->all();
        $category->name = $data['category_name'];
        $category->slug = str_slug($data['category_name']);
        $category->description = $data['category_description'];

        $category->image_url = $request->category_image->storePubliclyAs(
            'category-images', str_slug($request->name) . $request->category_image->getClientOriginalExtension()
        );

        if ($request->get('category_image')) {
            $category->addMediaFromRequest('category_image')
                ->usingFileName(str_slug($data['name']).'-category-image'.$data['main_image']->getClientOriginalExtension())
                ->usingName($data['name']. 'category image')
                ->toMediaCollection('category-images');
        }
        $category->save();

        return redirect()->route('merchant.categories.index')->withSuccess('product was updated successfully');

    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return redirect()->back();

    }
}
