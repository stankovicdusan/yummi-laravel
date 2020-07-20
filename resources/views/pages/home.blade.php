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

<!-- Shopping cart -->

@include('fixed.shopping-cart');

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
                            <input type="checkbox" name="typeFood[]" value="{{ $ft->id }}" />
                            <span>{{ $ft->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="color-range-main">
                    <div class="category-heading">
                        <h4>Meat/Vegan/Fish</h4>
                    </div>
                    <div class="category-group">
                        @foreach($typeMeat as $tm)
                        <div class="form-check">
                            <input type="checkbox" name="typeMeat[]" value="{{ $tm->id }}" />
                            <span>{{ $tm->name }}</span>
                        </div>
                        @endforeach
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
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <input type="search" id="search-text" class="form-control" placeholder="Search here our products">
                </div>
            </div>
            <div class="row products">
                @foreach($products as $p)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset($p->small_image) }}" class="img-product">
                            <p class="card-text">{{ $p->name }}</p>
                            <span class="price">{{ $p->price }} &euro;</span>
                            <a href="{{ route('product', ['id' => $p->id]) }}" class="add-to-cart-button">Add to
                                cart!</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $('.range-slider').ionRangeSlider({
        type: "double",
        min: {{ $minPrice->price }},
        max: {{ $maxPrice->price }},
        from: {{ $minPrice->price }},
        to: {{ $maxPrice->price }},
        step: 0.2
    });
</script>
<script>
    $(document).ready(function(){
        //creating empty object to store in him data later on specific events
        let data = {}

        //event for range slider that store values in data object and passing it to ajax request
        $('.range-slider').change(function(){
            data.price_range = $(this).val();
            
            ajaxRequest();
        });

        //event for search that store values in data object and passing it to ajax request
        $('#search-text').keyup(function(){
            data.search = $(this).val();

            ajaxRequest();
        });
        
        //event for type food checkboxes that store values in data object and passing it to ajax request
        $('input[name="typeFood[]"]').change(function(){
            let typeFood = [];
            $('input[name="typeFood[]"]:checked').each(function(){
                typeFood.push($(this).val());
            });

            data.type_food = typeFood;

            ajaxRequest();
        });

        //event for type of meat checkboxes that store values in data object and passing it to ajax request
        $('input[name="typeMeat[]"]').change(function(){
            let typeMeat = [];
            $('input[name="typeMeat[]"]:checked').each(function(){
                typeMeat.push($(this).val());
            });

            data.type_meat = typeMeat;

            ajaxRequest();
        });

        //function that calls ajax and returns data from server
        function ajaxRequest(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                },
                url: '{{ route("filter") }}',
                method: 'get',
                dataType: 'json',
                data: data,
                success: function(response){
                    showProducts(response);
                },
                error: function(xhr){
                    console.log(xhr);
                }
            });

            function showProducts(products){
                let html = '';
                for(let p of products){
                    html += `<div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="${p.small_image}" class="img-product">
                                        <p class="card-text">${p.name}</p>
                                        <span class="price">${p.price} &euro;</span>
                                        <a href="/product/${p.id}" class="add-to-cart-button">Add to
                                            cart!</a>
                                    </div>
                                </div>
                            </div>`;
                }

                $('.products').html(html);
            }
        }
    });
</script>

@endsection