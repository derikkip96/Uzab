@extends('manage.layouts.portal')

@section('page-css')
    <link href="{{ asset('pro/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('pro/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb-heading')
    @component('manage.partials.breadcrumb-heading')
        @slot('pageTitle')
            {{ __(' Edit Category') }}
        @endslot

        @slot('breadcrumb')
            {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>--}}
            {{--<li class="breadcrumb-item">pages</li>--}}
            {{--<li class="breadcrumb-item active">Blank Page</li>--}}
            {{--</ol>--}}
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($category, [
                      'method' => 'PATCH',
                      'route' => ['merchant.categories.update', $category->id],
                      'class' => '',
                   ]) !!}
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="modal" value="product-CategoryModal">
                        <div class="form-group {{ $errors->has('category_name') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="name">Name of the category</label>
                            <input name="category_name" id="category_name" class="form-control" placeholder="Category name" value="{{$category->name}}" required>
                            @if ($errors->has('category_name'))
                                <small class="form-control-feedback">{{ $errors->first('category_name') }}</small>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('category_description') ? ' has-error has-danger' : '' }}">
                            <label class="control-label" for="category_description">Description of the category</label>
                            <textarea name="category_description" id="category_description" cols="30" rows="5" class="form-control" required>{{$category->description}}</textarea>
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
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection