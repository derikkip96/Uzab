@extends('manage.layouts.portal')

@section('page-css')
    <link href="{{ asset('pro/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pro/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb-heading')
    @component('manage.partials.breadcrumb-heading')
        @slot('pageTitle')
            {{ __(' Edit Product') }}
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {!! Form::model($product, [
                       'method' => 'PATCH',
                       'route' => ['merchant.products.update', $product->id],
                    ]) !!}
                    @csrf
                    <input type="hidden" value="put" name="_method" >
                    <div class="form-body">
                        <h3 class="card-title">{{ __('Product information') }}</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('product_name') ? ' has-error has-danger' : '' }}">
                                    <label class="control-label" for="product_name">Name</label>
                                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Name of the product" value="{{ $product->name }}"   autofocus>
                                    @if ($errors->has('product_name'))
                                        <small class="form-control-feedback">{{ $errors->first('product_name') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('product_price') ? ' has-error has-danger' : '' }}">
                                    <label class="control-label" for="product_price">Price</label>
                                    <div class="input-group">
                                        <input type="number" id="product_price" name="product_price" class="form-control" placeholder="The price of the product" value="">
                                        @if ($errors->has('product_price'))
                                            <small class="form-control-feedback">{{ $errors->first('product_price') }}</small>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('product_qty') ? ' has-error has-danger' : '' }}">
                                    <label class="control-label" for="product_qty">Quantity available</label>
                                    <input type="number" id="product_qty" name="product_qty" class="form-control"  value="{{ $product->quantity }}"  required>
                                    @if ($errors->has('product_qty'))
                                        <small class="form-control-feedback">{{ $errors->first('product_qty') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('product_image') ? ' has-error has-danger' : '' }}">
                                <label class="control-label" for="product_image">Image of the Product</label>
                                <input name="product_image" id="product_image" type="file" class="form-control" value="{{ old('product_image') }}" accept="image/*">
                                @if ($errors->has('product_image'))
                                    <small class="form-control-feedback">{{ $errors->first('product_image') }}</small>
                                @endif
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('product_description') ? ' has-error has-danger' : '' }}">
                                    <label class="control-label" for="product_description">Description of the product</label>
                                    <textarea name="product_description" id="product_description" cols="30" rows="5" class="form-control" required>{{ $product->description }}</textarea>
                                    @if ($errors->has('product_description'))
                                        <small class="form-control-feedback">{{ $errors->first('product_description') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('product_category') ? ' has-error has-danger' : '' }}">
                                    <label class="control-label" for="product_category">Category</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="product_category" id="product_category" data-placeholder="Choose a Category" tabindex="1" required>
                                            <option></option>
                                            @foreach($categories as $product_category)
                                                <option value="{{ $product_category->id }}" @if(old('product_category') == $product_category->id) selected @endif> {{ $product_category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn input-group-append">
                                                <button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button" data-toggle="modal" data-target="#product-CategoryModal">+</button>
                                            </span>
                                    </div>
                                    @if ($errors->has('product_category'))
                                        <small class="form-control-feedback">{{ $errors->first('product_category') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('product_brand') ? ' has-error has-danger' : '' }}">
                                    <label class="control-label" for="product_brand">Brand</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="product_brand" id="product_brand" data-placeholder="Choose a Brand" tabindex="1">
                                            <option></option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" @if(old('product_brand') == $brand->id) selected @endif> {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn input-group-append">
                                                <button class="btn btn-secondary btn-outline bootstrap-touchspin-up" type="button" data-toggle="modal" data-target="#product-BrandModal">+</button>
                                            </span>
                                    </div>
                                    @if ($errors->has('product_brand'))
                                        <small class="form-control-feedback">{{ $errors->first('product_brand') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="product-CategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createCategoryModal">Create new category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('merchant.categories.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="modal" value="product-CategoryModal">
                        <div class="form-group {{ $errors->has('category_name') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="name">Name of the category</label>
                            <input name="category_name" id="category_name" class="form-control" placeholder="Category name" value="{{ old('category_name') }}" required>
                            @if ($errors->has('category_name'))
                                <small class="form-control-feedback">{{ $errors->first('category_name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('parent_category') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="parent_category">Parent Category</label>
                            <select class="form-control custom-select" name="parent_category" id="parent_category" data-placeholder="Choose the parent category" tabindex="1">
                                <option value="0">Parent category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('parent_category'))
                                <small class="form-control-feedback">{{ $errors->first('parent_category') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('category_description') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="category_description">Description of the category</label>
                            <textarea name="category_description" id="category_description" cols="30" rows="5" class="form-control" required>{{ old('category_description') }}</textarea>
                            @if ($errors->has('category_description'))
                                <small class="form-control-feedback">{{ $errors->first('category_description') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('category_image') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="category_image">Image of the category</label>
                            <input name="category_image" id="category_image" type="file" class="form-control" value="{{ old('category_image') }}" accept="image/*">
                            @if ($errors->has('category_image'))
                                <small class="form-control-feedback">{{ $errors->first('category_image') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="product-BrandModal" tabindex="-1" role="dialog" aria-labelledby="createBrandModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createBrandModal">{{ __('Create new Brand') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="POST" action="{{ route('merchant.brands.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="modal" value="product-BrandModal">
                        <div class="form-group {{ $errors->has('brand_name') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="name">Name of the brand</label>
                            <input name="brand_name" id="brand_name" class="form-control" placeholder="Brand name" value="{{ old('brand_name') }}" required>
                            @if ($errors->has('brand_name'))
                                <small class="form-control-feedback">{{ $errors->first('brand_name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('brand_description') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="brand_description">Description of the brand</label>
                            <textarea name="brand_description" id="brand_description" cols="30" rows="5" class="form-control" required>{{ old('brand_description') }}</textarea>
                            @if ($errors->has('brand_description'))
                                <small class="form-control-feedback">{{ $errors->first('brand_description') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('brand_image') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="brand_image">Image of the brand</label>
                            <input name="brand_image" id="brand_image" type="file" class="form-control" value="{{ old('brand_image') }}" accept="image/*">
                            @if ($errors->has('brand_image'))
                                <small class="form-control-feedback">{{ $errors->first('brand_image') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection

@section('page-scripts')
    <script src="{{ asset('pro/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('pro/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script type="application/javascript">
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    </script>

@endsection
