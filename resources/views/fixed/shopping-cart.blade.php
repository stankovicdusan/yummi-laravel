<div class="side-shopping-cart">
    @if(!empty(session()->get('shop-cart')))
    <span class="count">{{ count(session()->get('shop-cart')) }}</span>
    @else
    <span class="count">0</span>
    @endif
    <a href="#" class="shop-cart">
        <img src="{{ asset('images/img/shopping-cart.svg') }}">
    </a>
</div>

<div class="shopping-cart-items">
    <div class="shop-cart-top">
        <img src="{{ asset('images/img/shopping-cart.svg') }}" class="shop-cart-icon">
        <p>Shopping cart</p>
    </div>
    <div class="shop-cart-body">
        @if(!empty(session()->get('shop-cart')))
        @foreach(session()->get('shop-cart') as $id => $product)
        <div class="row parent-position">
            <div class="col-md-3">
                <img src="{{ asset($product['image']) }}" class="cart-image" alt="checkout-image">
            </div>
            <div class="col-md-6 title-price">
                <p class="first-paragraf">{{ $product['name'] }}</p>
                <p class="real-price">{{ $product['price'] }} &euro;</p>
            </div>
            <div class="col-md-3">
                <div class="input-group item-quantity quantity-cart">
                    <input type="number" class="quantity form-control form-margin" name="cart-quantity"
                        value="{{ $product['quantity'] }}">
                </div>
            </div>
        </div>
        <div class="bottom-line"></div>
        @endforeach
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
        <p class="total-price-shopcart">Total price: {{ countTotalPrice() }} &euro;</p>
        <div class="bottom-line"></div>
        <div class="first-button">
            <a href="#" class="close-shop-cart">Continue with ordering</a>
        </div>
        <div class="first-button">
            <a href="{{ route('checkout') }}" class="shop-cart-btn">Checkout</a>
        </div>
        @else
        <p> Empty cart </p>
        <div class="first-button">
            <a href="{{ route('checkout') }}" class="close-shop-cart">Continue with ordering</a>
        </div>
        @endif
    </div>
</div>