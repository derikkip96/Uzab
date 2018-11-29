@extends('manage.layouts.portal')


@section('breadcrumb-heading')
    @component('manage.partials.breadcrumb-heading')
        @slot('pageTitle')
            {{ __(' Products') }}
        @endslot
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('merchant.products.create') }}" class="btn btn-info btn-rounded m-t-10 float-right">{{ __('Add New product') }}</a>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Country</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->currency }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td><span class="text-muted"><i class="far fa-clock"></i> {{ $product->created_at }}</span> </td>
                                    <td>EN</td>
                                    <td colspan="">
                                            <span>
                                                 <a href="{{ route('merchant.products.edit',$product->id) }}" class="btn btn-info float-right">{{ __('Edit') }}</a>
                                            </span>
                                        <div class="form-group float-left">
                                            <a href="{{route('merchant.products.destroy',$product->id)}}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loop->iteration }}').submit();">
                                                <i class="os-icon os-icon-signs-11"></i>
                                                <span><button type="button" class="btn btn-danger">Delete</button></span>
                                            </a>
                                            <form id="delete-form-{{ $loop->iteration }}" action="{{route('merchant.products.destroy',$product->id)}}" method="POST"
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
@endsection
