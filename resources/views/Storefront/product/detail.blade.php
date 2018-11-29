@extends('Storefront.layout.master')
@section('content')
    <div class="uk-section uk-section-default">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
                <div class="product-img">
                    <img data-src="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80"
                         data-srcset="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80 650w,
                      https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=1300&h=866&q=80 1300w"
                         sizes="(min-width: 650px) 650px, 100vw"  alt="" uk-img>
                </div>

                <div class="product-desc">
                    <h3>{{$product->name}} </h3>

                    <h>{{$product->price}}</h>
                    <p>
                        {{$product->description}}
                    </p>
                    <hr>
                    <form action="{{route('cart.add',$product->id)}}"  method="POST">
                        {!! csrf_field() !!}
                        <input type="submit" class="uk-button-default uk-button-small uk-border-rounded" value="Add to Cart">
                    </form>

                </div>
            </div>

        </div>
    </div>


@stop
