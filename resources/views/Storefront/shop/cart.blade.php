@extends('Storefront.layout.master')
@section('content')
    <div class="uk-section">
        <div class="uk-container">

            <table class="uk-table uk-table-middle  uk-table-divider uk-table-responsive ">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th class="uk-width-large"></th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Discount</th>
                    <th ><button class="uk-button-small uk-button-danger uk-border-rounded">CLEAR CART</button></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @forelse($items as $item)
                        <td>
                            <div class="p-img">
                                <img class="uk-preserve-width" data-src="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80"
                                     data-srcset="https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=650&h=433&q=80 650w,
                          https://images.unsplash.com/photo-1522201949034-507737bce479?fit=crop&w=1300&h=866&q=80 1300w"
                                     sizes="(min-width: 100px) 100px, 100vw" width="100" height="auto" alt="" uk-img>
                            </div>
                        <td> <div class="product-info">
                                {{$item->name}}
                            </div></td>
                        </td>
                        <td>

                            <a href="{{route('cart.add.qty')}}"
                               onclick="event.preventDefault(); document.getElementById('frm_add_qty{{ $loop->iteration }}').submit();">

                                <select class="uk-select uk-form-width-small uk-border-rounded" id="add_qty" type="submit" href="{{ route('cart.add.qty') }}">
                                    <option> {{ $item->quantity }}</option>
                                </select>
                            </a>
                            <form id="frm_add_qty{{ $loop->iteration }}" action="{{ route('cart.add.qty') }}" method="post" class="hidden">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->getHash() }}" name="item">

                            </form>

                        </td>
                        <td>{{ + $item->price * $item->qty }}</td>
                        <td>table data</td>

                        <td >

                            <div class="uk-form-group ">
                                <a href="{{ route('cart.remove')}}"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $loop->iteration }}').submit();">
                                    <span  uk-icon="icon: trash" uk-tooltip="remove item"> Clear </span>                                            </a>

                                <form id="delete-form-{{ $loop->iteration }}" action="{{ route('cart.remove')}}" method="POST" class="hidden">
                                    @csrf
                                    <input type="hidden" value="{{ $item->getHash() }}" name="item">
                                </form>
                            </div>

                        </td>
                </tr>

                @empty
                    <td colspan="6" class="uk-text-center">No products in cart</td>
                @endforelse
                <tr>
                    <td colspan="4">
                    </td>
                    <td class="td-total">
                        <b>Total</b>
                    </td>
                    <td class="td-price">
                        KSh {{ + LaraCart::total($formatted = false, $withDiscount = true) }}<small> </small>
                    </td>
                </tr>


                </tbody>
            </table>
            <hr>
            <div class="uk-float-left">
                <button class="uk-button uk-button-default uk-border-rounded" ><a href="/products"><span uk-icon="arrow-left"></span> CONTINUE SHOPING</a></button>
            </div>
            <div class="uk-float-right">

                <button class="uk-button uk-button-default uk-border-rounded"><a href="/checkout">CHECKOUT</a></button>
            </div>


        </div>
    </div>

@stop
