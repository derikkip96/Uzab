<div uk-sticky="cls-active: uk-navbar-sticky">
    <nav class="uk-navbar-container  uk-sticky uk-margin" uk-navbar="mode: click">
        <div class=" uk-navbar-left">
            <a class="uk-navbar-item uk-logo uk-margin-large-left" href="{{ route('home') }}">Logo</a>
        </div>

        <div class=" uk-navbar-center">
            <ul class="uk-navbar-nav uk-visible@m">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('categories.index') }}">Shop by Category</a></li>
                <li><a href="{{ route('brands.index') }}">Shop by Brand</a></li>
            </ul>
        </div>

        <div class="uk-navbar-right ">
            <ul class="uk-iconnav uk-navbar-nav uk-visible@m uk-margin-large-right">
                <li>
                    <a><span uk-icon="user"></span></a>
                </li>
                <li>
                    <a href="#offcanvas-cart" class="uk-navbar-toggle" data-uk-toggle><span
                                class="uk-margin-small-right" uk-icon="icon: cart; ratio: 1.5"></span></a>
                </li>
            </ul>
            <a href="#offcanvas-usg" class="uk-navbar-item uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"
               uk-navbar-toggle-icon data-uk-toggle></a>
        </div>
    </nav>
</div>

<div class="uk-offcanvas-content">
    <div id="offcanvas-usg" uk-offcanvas>
        <div class="uk-offcanvas-bar">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <ul class="uk-nav uk-nav-offcanvas">
                <li><a class="uk-navbar-item uk-logo" href="#">Logo</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('categories.index') }}">Shop by Category</a></li>
                <li><a href="{{ route('brands.index') }}">Shop by Brand</a></li>
                <br>
            </ul>
            <br>
            <span uk-icon="icon: user; ratio: 2"></span>
            <span uk-icon="icon: heart; ratio: 2"></span>
            <span class="uk-margin-small-right" uk-icon="icon: cart; ratio: 2"></span>
        </div>
    </div>

    {{--cart off-canvas--}}
    <div class="uk-offcanvas-content">
        <div id="offcanvas-cart" uk-offcanvas>
            <div class="uk-offcanvas-bar ">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <div class="uk-section">
                    <h5 class="uk-heading-line uk-text-center"><span>Products in Cart</span></h5><br>
                    @if(LaraCart::count()>0)
                        @forelse(LaraCart::getitems() as $item )
                            <div uk-grid>
                                <div class="uk-width-1-2@s">
                                    <img
                                            data-src="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80"
                                            data-srcset="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80 650w,
                                https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=1300&h=866&q=80 1300w"
                                            sizes="(min-width: 650px) 650px, 100vw" width="650" height="433" alt="" uk-img>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <p><span>{{$item->name}}</span></p>
                                    <p><span>{{ + $item->price * $item->qty }}</span></p>
                                </div>
                            </div>
                        @empty
                            <p>no product in cart</p>
                        @endforelse
                    @endif
                    <br>
                    <p>Subtotal: {{ + LaraCart::total($formatted = false, $withDiscount = true) }}</p>
                </div>

                <button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom"><a href="/checkout">CHECKOUT</a>
                </button>
                <button class="uk-button uk-button-default uk-width-1-1"><a href="{{route('cart.index')}}"><span uk-icon="icon: cart"
                                                                                                                 class="uk-margin-small-right"></span>CART</a>
                </button>

            </div>
        </div>
    </div>
</div>


