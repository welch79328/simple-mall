@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 關於J-UGo")

@section('css')
    <style>

    </style>
@section('content')
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info" style="text-align: center">關於捷U購</h3>
            <div>
                <p>
                    捷U購為台北捷運WiFi首次推出的電子商務平台，限定連線捷運WiFi的使用者才能夠享有最優惠且最新奇的商品，我們不僅提供使用者安全、方便、快速的免費網路，更以限時限量的全新購物型態獨家推出，特別滿足長期連線Free
                    AD WiFi的使用民眾。
                </p>
                <br>
                <p>
                    「捷U購」全站主打「預購」模式銷售，提供最優惠、最便捷的購物場所，以台北捷運的高運載量為基數，我們相信以此全新的購物型態將展開對預購的新標準，立即搶先體驗「捷U購」帶來的購物魅力吧！
                </p>
            </div>
        </div>
    </div>

    <a href="#home" class="scroll" id="toTop" style="display: block;">
        <span id="toTopHover" style="opacity: 1;"> </span>
    </a>

    <!-- //js -->
    <!-- cart-js -->
    <script src="{{asset('js/frontend/minicart.min.js')}}"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });

        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }
    </script>

    <!-- //cart-js -->

    <!-- stats -->
    <script src="{{asset('js/frontend/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/frontend/jquery.countup.js')}}"></script>
    <script>$('.counter').countUp();</script>
    <!-- //stats -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{asset('js/frontend/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/frontend/jquery.easing.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <!-- //here ends scrolling icon -->
@endsection
