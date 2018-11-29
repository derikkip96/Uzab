@extends('manage.layouts.portal')

@section('page-css')
    <link href="{{ asset('pro/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pro/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb-heading')
    @component('manage.partials.breadcrumb-heading')
        @slot('pageTitle')
            {{ __(' Edit Brand') }}
        @endslot
    @endcomponent
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($brand, [
                        'method' => 'PATCH',
                        'route' => ['merchant.brands.store', $brand->id],
                        'class' => '',
                     ]) !!}

                    @csrf
                    <input type="hidden" name="modal" value="product-BrandModal">
                    <div class="form-group {{ $errors->has('brand_name') ? ' has-error has-danger' : '' }}">
                        <label class="control-label" for="name">Name of the brand</label>
                        <input name="brand_name" id="brand_name" class="form-control" placeholder="Brand name" required>
                        @if ($errors->has('brand_name'))
                            <small class="form-control-feedback">{{ $errors->first('brand_name') }}</small>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('brand_description') ? ' has-error has-danger' : '' }}">
                        <label class="control-label" for="brand_description">Description of the brand</label>
                        <textarea name="brand_description" id="brand_description" cols="30" rows="5" class="form-control" required></textarea>
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
                    <button class="btn btn-primary"> Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection