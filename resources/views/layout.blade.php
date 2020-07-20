<html>

<head>
    @include('fixed.head')
</head>

<body>
    @include('fixed.header')
    @yield('content')
    @include('fixed.footer')
    <script>
        $('.shop-cart').click(function(e){
            e.preventDefault();

            $('.side-shopping-cart').hide();
            $('.shopping-cart-items').css("display", "block");

            $('.close-shop-cart').click(function(e){
                e.preventDefault();

                $('.side-shopping-cart').show();
                $('.shopping-cart-items').css("display", "none");
            })
        })
    </script>
</body>

</html>