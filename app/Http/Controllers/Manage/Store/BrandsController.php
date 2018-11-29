<?php

namespace App\Http\Controllers\manage\Store;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('manage.store.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.store.product.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->get('brand_image');
        $brand = new Brand();
        $brand->name = $data['brand_name'];
        $brand->slug = str_slug($data['brand_name']);
        $brand->description = $request->get('brand_description');

        if ($image) {
            $fileName = $this->generateString(20);
            $brand->addMediaFromRequest($request->get('brand_image'))
                ->usingFileName($fileName)
                ->usingName($brand->name)
                ->toMediaCollection('logos');
        }
        $brand->save();

        if ($request->get('modal')) {
            return redirect()->back()->withSuccess('Brand created successfully');
        }
        return redirect()->route('merchant.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('manage.store.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $request->all();
        $image = $request->get('brand_image');
        $brand->name = $data['brand_name'];
        $brand->slug = str_slug($data['brand_name']);
        $brand->description = $request->get('brand_description');

        if ($image) {
            $fileName = $this->generateString(20);
            $brand->addMediaFromRequest($request->get('brand_image'))
                ->usingFileName($fileName)
                ->usingName($brand->name)
                ->toMediaCollection('logos');
        }

        $brand->save();
        return redirect()->route('merchant.brands.index')->withSuccess('Brand was updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
