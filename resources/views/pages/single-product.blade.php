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

<!-- Single product -->

<div class="container">
    <div class="row">
        <div class="col-md-6 margin-row">
            <img src="{{ asset('images/big/capriciossa.jpg') }}" class="img-product">
        </div>
        <div class="col-md-6 content-padding">
            <h2>Capricosa</h2>
            <p class="single-price">2 &euro;</p>
            <label>Please, select your quantity:</label>
            <input type="number" name="quantity" value="1" class="quantity form-control">
            <label class="extra-space">Pick which size do you want:</label>
            <select class="form-control">
                <option value="0">32cm</option>
                <option value="1">42cm</option>
                <option value="3">50cm</option>
            </select>
            <p class="extra-space">Do you want some extra addition to your order?</p>
            <div class="extra"><input type="checkbox" name="addition"><label>Extra cheese</label></div>
            <div class="extra"><input type="checkbox" name="addition"><label>Extra ketchup</label></div>
            <div class="extra"><input type="checkbox" name="addition"><label>More mushrooms</label></div>
            <div class="extra"><input type="checkbox" name="addition"><label>More spicy</label></div>

            <a href="#" class="add-to-cart-button add-cart">Add to cart!</a>
        </div>
    </div>
</div>

@endsection