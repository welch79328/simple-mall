@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall  訂購流程FAQ')

@section('css')
    <style>
        .faqDiv {
            margin-bottom: 100px;
        }
    </style>
@section('content')
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <div class="faqDiv">
                <h3 class="wthree_text_info">訂購流程</h3>
                <img src="{{url('images/shopping_process-12.png')}}" width="100%">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">付款方式</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">配送方式</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">退換貨處理</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">注意事項</h3>
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
