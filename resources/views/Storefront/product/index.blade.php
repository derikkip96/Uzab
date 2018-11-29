@extends('Storefront.layout.master')
@section('content')
    <div class="uk-container">
        <div class="uk-section uk-section-default">
            <div class="uk-grid">
                <div class="uk-width-1-4 " >
                    <h5 class="uk-heading-line uk-text-center"><span>SHOP CATEGORIES</span></h5>
                    <h5 class="uk-heading-line uk-text-center"><span>FILTER BY BRAND</span></h5>
                </div>
                <div class="uk-width-3-4 ">
                    <div class="uk-child-width-1-3@s uk-grid-small uk-grid-match " uk-grid>
                        @foreach($products as $product)
                            @include('Storefront.product.partials.single-grid')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
