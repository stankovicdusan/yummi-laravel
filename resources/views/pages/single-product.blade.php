@extends('layout')

@section('content')

<!-- Top page slider -->
<div id="carouselExampleControl" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider-2.jpg') }}" class="d-block w-100" alt="..." />
        </div>
    </div>
</div>

<!-- Shopping cart -->

@include('fixed.shopping-cart');

<!-- Single product -->

<div class="container">
    <div class="row">
        <div class="col-md-6 margin-row">
            <img src="{{ asset($product->big_image) }}" class="img-product">
        </div>
        <div class="col-md-6 content-padding">
            <h2>{{ $product->name }}</h2>
            <p class="single-price">{{ $product->price }} &euro;</p>
            <form action="{{ route('add-to-cart', ['id' => $product->id]) }}" method="post" class="form-margin">
                @if($product->food_type_id == 1)
                <label class="extra-space">Pick which size do you want:</label>
                <select class="form-control" name="pizza-size">
                    <option value="32">32cm</option>
                    <option value="42">42cm</option>
                    <option value="50">50cm</option>
                </select>
                @elseif($product->food_type_id == 11)
                <label class="extra-space">Pick which size do you want:</label>
                <select class="form-control" name="pasta-weight">
                    <option value="300">300g</option>
                    <option value="450">450g</option>
                    <option value="650">650g</option>
                </select>
                @endif
                <p class="extra-space">Do you want some extra addition to your order?</p>
                <div class="extra"><input type="checkbox" value="Extra cheese" name="addition[]"><label>Extra
                        cheese</label>
                </div>
                <div class="extra"><input type="checkbox" value="Extra ketchup" name="addition[]"><label>Extra
                        ketchup</label>
                </div>
                <div class="extra"><input type="checkbox" value="More mushrooms" name="addition[]"><label>More
                        mushrooms</label></div>
                <div class="extra"><input type="checkbox" value="More spicy" name="addition[]"><label>More spicy</label>
                </div>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif

                @csrf
                <label>Please, select your quantity:</label>
                <input type="number" name="quantity" value="1" class="quantity form-control">
                <button type="submit" class="add-to-cart-button add-cart form-control">Add to cart!</button>
            </form>
        </div>
    </div>
</div>

@endsection