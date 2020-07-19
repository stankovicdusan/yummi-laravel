@extends('layout')

@section('content')
<!-- Top page slider -->
<div id="carouselExampleControl" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider-1.jpg') }}" class="d-block w-100" alt="..." />
        </div>
    </div>
</div>

<div class="container">
    <div class="row margin-row">
        <div class="col-md-3">
            <div class="categories-sidebar">
                <div class="color-range-main">
                    <div class="category-heading">
                        <h4>Food type</h4>
                    </div>
                    <div class="category-group">
                        @foreach($foodtype as $ft)
                        <div class="form-check">
                            <input type="checkbox" name="categories" value="{{ $ft->id }}" />
                            <span>{{ $ft->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="color-range-main">
                    <div class="category-heading">
                        <h4>Meat/Vegan</h4>
                    </div>
                    <div class="category-group">
                        <div class="form-check">
                            <input type="checkbox" name="categories" />
                            <span>Meat</span>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="categories" />
                            <span>Vegetarian</span>
                        </div>
                    </div>
                </div>
                <div class="color-range-main">
                    <div class="category-heading">
                        <h4>Price</h4>
                    </div>
                    <div class="form-cat">
                        <input type="text" class="range-slider" name="my_range" value="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                            <p class="card-text">Magherita</p>
                            <span class="price">2 &euro;</span>
                            <a href="#" class="add-to-cart-button">Add to cart!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                            <p class="card-text">Magherita</p>
                            <span class="price">2 &euro;</span>
                            <a href="#" class="add-to-cart-button">Add to cart!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                            <p class="card-text">Magherita</p>
                            <span class="price">2 &euro;</span>
                            <a href="#" class="add-to-cart-button">Add to cart!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                            <p class="card-text">Magherita</p>
                            <span class="price">2 &euro;</span>
                            <a href="#" class="add-to-cart-button">Add to cart!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                            <p class="card-text">Magherita</p>
                            <span class="price">2 &euro;</span>
                            <a href="#" class="add-to-cart-button">Add to cart!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                            <p class="card-text">Magherita</p>
                            <span class="price">2 &euro;</span>
                            <a href="#" class="add-to-cart-button">Add to cart!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Top rated -->
<div class="container">
    <div class="row margin-row">
        <div class="col-md-12">
            <h2>Checkout our top rated meals</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/margarita.jpg') }}" class="img-product">
                    <p class="card-text">Magherita</p>
                    <span class="price">2 &euro;</span>
                    <a href="#" class="add-to-cart-button">Add to cart!</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/vegeterian.jpg') }}" class="img-product">
                    <p class="card-text">Vegetarian</p>
                    <span class="price">2 &euro;</span>
                    <a href="#" class="add-to-cart-button">Add to cart!</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/capriciossa.jpg') }}" class="img-product">
                    <p class="card-text">Capricciosa</p>
                    <span class="price">2 &euro;</span>
                    <a href="#" class="add-to-cart-button">Add to cart!</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/diavolo.jpg') }}" class="img-product">
                    <p class="card-text">Diavola</p>
                    <span class="price">2 &euro;</span>
                    <a href="#" class="add-to-cart-button">Add to cart!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.range-slider').ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: 200,
        to: 500,
    });
</script>

@endsection