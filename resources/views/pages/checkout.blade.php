@extends('layout')

@section('content')

<div class="container">
    <div class="row row-margin">
        <div class="col-md-6">
            <div class="wrapper-checkout">
                <h4>E-mail</h4>
                <p>Here you need to enter your email.</p>
                <input type="text" id="emailText" placeholder="Your e-mail" class="form-control emailInputText">
            </div>
            <div class="wrapper-checkout">
                <h4>Delivery</h4>
                <p>We need some information about you:</p>
                <form action="#" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="firstName" placeholder="First name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="lastName" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Your address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="city" placeholder="City">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="postcode" placeholder="Postcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phoneNumber"
                            placeholder="Your phone number (helps for delivery)">
                    </div>
                </form>
            </div>
            <div class="wrapper-checkout">
                <h4>Payment method</h4>

                <p>Choose payment method:</p>
                <div class="container specific-container">
                    <div class="payment-method">
                        <input type="radio" checked="checked" name="pay_method" /> Cash on delivery
                    </div>
                    <div class="payment-method">
                        <input type="radio" name="pay_method" /> Pay with card
                    </div>
                </div>
            </div>

            <input type="submit" value="Order" class="add-to-cart-button add-cart form-control" name="submitCheckout" />
        </div>
        <div class="col-md-6">
            <div class="wrapper-checkout">
                <h4>Your shopping cart</h4>
                @if(!empty(session()->get('shop-cart')))
                @foreach(session()->get('shop-cart') as $id => $product)
                <div class="row wrapper-checkout">
                    <div class="col-md-3">
                        <img src="{{ asset($product['image']) }}" class="img-product" alt="checkout-image">
                    </div>
                    <div class="col-md-6 override-width">
                        <p class="first-paragraf">{{ $product['name'] }}</p>
                        <p class="checkout-price">{{ $product['price'] }} &euro;</p>
                        @if($product['pizza-size'] != null)
                        <p>{{ $product['pizza-size'] }}cm</p>
                        @elseif($product['pasta-weight'] != null)
                        <p>{{ $product['pasta-weight'] }}g</p>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div class="input-group item-quantity">
                            <input type="number" class="quantity form-control" name="quantity"
                                value="{{ $product['quantity'] }}">
                        </div>
                    </div>
                </div>
                @if($product['addition'] != null)
                <div class="row wrapper-checkout">
                    <p>Your addition: </p>
                    @foreach($product['addition'] as $ad)
                    <div class="col-md-3">{{ $ad }}</div>
                    @endforeach
                </div>
                @endif
                @endforeach
                @else
                <div class="row wrapper-checkout">
                    <div class="col-lg-12">
                        <p>Korpa je prazna</p>
                    </div>
                </div>
                @endif
                <div class="row wrapper-checkout">
                    <div class="col-md-6">
                        <p class="second-row-paragraf">Total price</p>
                        <p class="first-paragraf">Shipping</p>
                        <span style="font-size: 0.8rem">Shipping is free if total price is above 7 &euro;</span>
                    </div>
                    <div class="col-md-6">
                        @if(!empty(session()->get('shop-cart')))
                        <?php
                            function countTotalPrice(){
                                $totalPrice = 0;
                                if(session()->has('shop-cart')){
                                    foreach(session()->get('shop-cart') as $id => $product){
                                        $totalPrice += $product['quantity'] * $product['price'];
                                    }
                                }
                                return $totalPrice;
                            }
                        ?>
                        <p class="second-row-paragraf">{{ countTotalPrice() }} &euro;</p>
                        @else
                        <p class="second-row-paragraf">0 &euro;</p>
                        @endif
                        @if(countTotalPrice() > 7)
                        <p class="second-row-paragraf">0 &euro;</p>
                        @else
                        <p class="second-row-paragraf">2.9 &euro;</p>
                        @endif
                    </div>
                </div>
                <div class="row wrapper-checkout">
                    <div class="col-md-6">
                        <p class="second-row-paragraf">Total to pay</p>
                    </div>
                    <div class="col-md-6">
                        @if(!empty(session()->get('shop-cart')))
                        @if(countTotalPrice() > 7)
                        <p class="second-row-paragraf">{{ countTotalPrice() }} &euro;</p>
                        @else
                        <p class="second-row-paragraf">{{ countTotalPrice() + 2.9 }} &euro; </p>
                        @endif
                        @else
                        <p class="second-row-paragraf">0 &euro;</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection