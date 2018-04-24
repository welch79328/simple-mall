@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 搜尋")

@section('css')

@endsection

@section('content')
    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">搜尋結果</h3>
            <p style="padding-left: 10px">關鍵字： <span style="color:red">{{$keyword}}</span></p>
            <p style="padding-left: 10px">
                搜尋結果共 <span style="color:red">{{$commodities->total()}}</span> 筆,
                頁數 <span style="color:red">{{$commodities->currentPage()}}</span> / {{$commodities->lastPage()}}
            </p>
            <div id="horizontalTab">
                <div id="commodityList">
                    @include('layouts.frontend.commodityList')
                </div>
                <div class="clearfix"></div>
                <div style="padding-top: 40px; text-align: center;">
                    {{$commodities->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- //new_arrivals -->
    <!-- viewed products -->
    <div class="new_arrivals_agile_w3ls_info hidden-xs">
        <div class="container">
            <h3 class="wthree_text_info">瀏覽過的商品</h3>
            <div style="position: relative">
                <div id="recentlyViewedCommodityList" style="min-height: 200px">
                    @include('layouts.frontend.recentlyViewedCommodityList')
                </div>
            </div>
        </div>
    </div>
    <!-- //viewed products -->
    <!-- specModal-->
    <div id="specModalPlace"></div>
    <!-- //specModal-->
    <a href="#home" class="scroll" id="toTop" style="display: block;">
        <span id="toTopHover" style="opacity: 1;"></span>
    </a>
    <!-- //js -->
    <script src="{{asset('js/frontend/modernizr.custom.js')}}"></script>
    <!-- Custom-JavaScript-File-Links -->
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
    <!-- script for responsive tabs -->
    <script src="{{asset('js/frontend/easy-responsive-tabs.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });</script>
    <!-- //script for responsive tabs -->
    <!-- stats -->
    <script src="{{asset('js/frontend/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/frontend/jquery.countup.js')}}"></script>
    <script> $('.counter').countUp();</script>
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
        });</script>
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