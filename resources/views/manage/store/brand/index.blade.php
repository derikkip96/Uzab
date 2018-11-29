@extends('manage.layouts.portal')

@section('breadcrumb-heading')
    @component('manage.partials.breadcrumb-heading')
        @slot('pageTitle')
            {{ __(' Brands') }}
            @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#product-BrandModal">{{ __('Add New brand') }}</button>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>Product $product
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td><span class="text-muted"><i class="far fa-clock"></i> {{ $brand->created_at }}</span> </td>
                                    <td>
                                        <span>
                                                 <a href="{{ route('merchant.brands.edit',$brand->id) }}" class="btn btn-info float-right">{{ __('Edit') }}</a>
                                            </span>
                                        <div class="form-group ">
                                            <a href="{{route('merchant.brands.destroy',$brand->id)}}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loop->iteration }}').submit();">
                                                <i class="os-icon os-icon-signs-11"></i>
                                                <span><button type="button" class="btn btn-danger">Delete</button></span>
                                            </a>
                                            <form id="delete-form-{{ $loop->iteration }}" action="{{route('merchant.brands.destroy',$brand->id)}}" method="POST"
                                                  style="display: none;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--modal--}}
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
@endsection

