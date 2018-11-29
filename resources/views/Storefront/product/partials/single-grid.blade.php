<div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center">
    <div class="uk-card-media-top">
        <img data-src="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80"
             data-srcset="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80 650w,
                          https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=1300&h=866&q=80 1300w"
             sizes="(min-width: 650px) 650px, 100vw" width="650" height="433" alt="" uk-img>
    </div>

    <h5><a class="uk-link-heading" href="{{ route('products.show',$product->id) }}">{{ $product->name}}</a></h5>
    <h6>{{ $product->price }}</h6>
    <form action="{{route('cart.add',$product->id)}}"  method="POST">
        {!! csrf_field() !!}
        <input type="submit" class="uk-button-default uk-button-small uk-border-rounded" value="Add to Cart">
    </form>

</div>
