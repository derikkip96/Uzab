@extends('Storefront.layout.master')
@section('content')
    <div class="uk-container">
        <div class="uk-section">
            <div class="uk-grid">
                <div class="uk-width-3-4 " >
                    <ul class="uk-flex-center uk-child-width-expand uk-tab " data-uk-tab uk-switcher>
                        <li class="uk-active "><a href="">1. Address</a></li>
                        <li><a href="">2. SHIPPING</a></li>
                        <li><a href="">3. PAYMENT</a></li>
                    </ul>
                    <ul class="uk-switcher uk-margin">
                        <li>
                            <h5 class="uk-heading-divider">Address</h5>
                            <form class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label" for="form-horizontal-text">First Name</label>
                                    <input class="uk-input uk-border-rounded" type="text">
                                </div>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label" for="form-horizontal-text">Last Name</label>
                                    <input class="uk-input uk-border-rounded" type="text" >
                                </div>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label" for="form-horizontal-text">Phone Number</label>
                                    <input class="uk-input uk-border-rounded" type="text" placeholder="50">
                                </div>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label" for="form-horizontal-text">Email Address</label>
                                    <input class="uk-input uk-border-rounded" type="text" placeholder="name@gmail.com">
                                </div>
                                <div class="uk-width-1-1@s">
                                    <label class="uk-form-label" for="form-horizontal-text">Delivery Address</label>
                                    <textarea class="uk-input uk-border-rounded" type="text" ></textarea>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label" for="form-horizontal-text">State/Region</label>
                                    <input class="uk-input uk-border-rounded" type="text" placeholder="50">
                                </div>
                                <div class="uk-width-1-2@s">
                                    <label class="uk-form-label" for="form-horizontal-text">City</label>
                                    <input class="uk-input uk-border-rounded" type="text" >
                                </div>
                                <div>
                                    <button class="uk-button uk-button-default uk-border-rounded">Proceed to next</button>
                                </div>

                            </form>
                        </li>
                        {{--shipping--}}
                        <li>
                            <table class="uk-table uk-table-divider">
                                <thead>
                                <tr>
                                    <th class="uk-width-large">Shipping Method</th>
                                    <th>Delivery Time</th>
                                    <th>Delivery Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Table Data</td>
                                    <td>Table Data</td>
                                    <td>Table Data</td>
                                </tr>
                                <tr>
                                    <td>Table Data</td>
                                    <td>Table Data</td>
                                    <td>Table Data</td>
                                </tr>
                                <tr>
                                    <td>Table Data</td>
                                    <td>Table Data</td>
                                    <td>Table Data</td>
                                </tr>
                                </tbody>
                            </table>
                        </li>

                        <li>
                            <div>
                                <h6 class="uk-heading-divider ">Choose Payment Method</h6>
                                <ul  uk-accordion="collapsible: false">
                                    <li>

                                        <a class="uk-accordion-title" href="#">Pay with Credit Card <span uk-icon="icon:credit-card"></span></a>
                                        <div class="uk-accordion-content">
                                            <p>we accept the following credit:</p><br>
                                            <form action="" class="uk-grid-small" uk-grid>
                                                <div class="uk-width-1-2@s">
                                                    <input class="uk-input uk-border-rounded" type="text" placeholder="Card Number" >
                                                </div>
                                                <div class="uk-width-1-2@s">
                                                    <input class="uk-input uk-border-rounded" type="text" placeholder="Full Name" >
                                                </div>
                                                <div class="uk-width-1-3@s">
                                                    <input class="uk-input uk-border-rounded" type="text" placeholder="MM/YY">
                                                </div>
                                                <div class="uk-width-1-3@s">
                                                    <input class="uk-input uk-border-rounded" type="text" placeholder="CVC">
                                                </div>
                                                <div class="uk-width-1-3@s">
                                                    <button class="uk-button uk-button-default uk-border-rounded"> SUBMIT</button>
                                                </div>
                                            </form>
                                        </div>

                                    </li>
                                    <li>
                                        <a class="uk-accordion-title" href="#">Pay with PayPal</a>
                                        <div class="uk-accordion-content">
                                            <p>PayPal - the safer, easier way to pay</p>
                                            <form action="" class="uk-grid-small" uk-grid>
                                                <div class="uk-width-1-2@s">
                                                    <input class="uk-input uk-border-rounded" type="text" placeholder="Email" >
                                                </div>
                                                <div class="uk-width-1-2@s">
                                                    <input class="uk-input uk-border-rounded" type="text" placeholder="password" >
                                                </div>
                                                <div>
                                                    <button class="uk-button uk-button-default uk-border-rounded"> SUBMIT</button>
                                                </div>

                                            </form>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    </ul>


                </div>
                <div class="uk-width-1-4">
                    <h6 class="uk-heading-divider ">ORDER SUMMARY</h6>
                    <table>
                        <tbody>
                        <tr>
                            <td class="uk-width-small">Subtotal</td>
                            <td>KSH</td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">Tax</td>
                            <td>KSH</td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">Shipping</td>
                            <td>KSH</td>
                        </tr>
                        <tr>
                            <td class="uk-width-small">Total</td>
                            <td>KSH</td>
                        </tr>

                        </tbody>
                    </table>



                </div>
            </div>

        </div>
    </div>
@stop
