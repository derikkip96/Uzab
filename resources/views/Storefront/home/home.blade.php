@extends('Storefront.layout.master')
@section('content')
    @include('Storefront.partials.slider')
    <div class="uk-container ">

        <div class="uk-section uk-section-default">
            <div class="uk-text-center">
                <h2>Featured products </h2>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div uk-slider>

                    <div class="uk-position-relative uk-visible-toggle ">

                        <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-2@s uk-child-width-1-1@xs uk-grid uk-grid-small">
                            @foreach($products as $product)
                                <li>
                                    @include('Storefront.product.partials.single-grid', $product)
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                </div>
            </div>
            <br>

            {{--product by category--}}
            <div class="uk-text-center">
                <h2>Product by category</h2>
            </div>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-child-width-1-3@s uk-grid-small uk-grid-match" uk-grid>
                    @foreach($categories as $category)
                        @include('Storefront.category.partials.single-grid', $category)
                    @endforeach
                </div>
            </div>

            <br>
            <center>
                <a class="uk-button-default uk-button-small  uk-border-rounded" href="{{ route('categories.index') }}">ALL CATEGORIES</a>
            </center>
            <br>

            {{--product by brand section--}}

            <div class="uk-text-center">
                <h2>Product by Brand</h2><br>
            </div>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-child-width-1-3@s uk-grid-small uk-grid-match " uk-grid>
                    @foreach($brands as $brand)
                        @include('Storefront.brand.partials.single-grid', $brand)
                    @endforeach
                </div>
            </div>

            <br>
            <center>
                <a class="uk-button-default uk-border-rounded" href="{{ route('brands.index') }}">ALL BRANDS</a>
            </center>
            <br>
        </div>
    </div>
@stop
