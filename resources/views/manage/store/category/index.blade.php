@extends('manage.layouts.portal')

@section('breadcrumb-heading')
    @component('manage.partials.breadcrumb-heading')
        @slot('pageTitle')
            {{ __(' Categories') }}
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#product-CategoryModal ">{{ __('Add New category') }}</button>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><span class="text-muted"><i class="far fa-clock"></i> {{ $category->created_at }}</span> </td>
                                    <td>
                                            <span>
                                                 <a href="{{ route('merchant.categories.edit',$category->id) }}" class="btn btn-info float-right">{{ __('Edit') }}</a>
                                            </span>
                                        <div class="form-group ">
                                            <a href="{{route('merchant.categories.destroy',$category->id)}}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loop->iteration }}').submit();">
                                                <i class="os-icon os-icon-signs-11"></i>
                                                <span><button type="button" class="btn btn-danger">Delete</button></span>
                                            </a>
                                            <form id="delete-form-{{ $loop->iteration }}" action="{{route('merchant.categories.destroy',$category->id)}}" method="POST"
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
@endsection

