@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 首頁")

@section('content')
    <!-- banner -->
    @include('layouts.frontend.banner')
    <!-- //banner -->
    <!-- limit -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info" style="color: red;">限時商品<i class="glyphicon glyphicon-time"></i></h3>
            <div>
                {{--<button class="btn btn-default limit_previous_button hidden-xs" onclick="getLimitCommodities(this)"--}}
                {{--value="{{$page["backPage"]}}" id="backPage">--}}
                {{--<span class="glyphicon glyphicon-chevron-left limit_icon" aria-hidden="true"></span>--}}
                {{--</button>--}}
                {{--<button class="btn btn-default limit_next_button hidden-xs" onclick="getLimitCommodities(this)"--}}
                {{--value="{{$page["nextPage"]}}" id="nextPage">--}}
                {{--<span class="glyphicon glyphicon-chevron-right limit_icon" aria-hidden="true"></span>--}}
                {{--</button>--}}
                {{--<input value="{{$page["nowPage"]}}" type="hidden" id="nowPage">--}}
                <div id="limitCommodityList">
                    @include('layouts.frontend.limitCommodityList')
                </div>
                <div class="clearfix"></div>
                <div style="padding-top: 40px;">
                    <button type="button" class="btn btn-default btn-lg center-block"
                            style="color: white; background-color: gray;" value="{{$page["nextPage"]}}"
                            onclick="getLimitCommodities(this)" id="limitPageButton">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        查看更多
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- //limit -->
    <!-- /new_arrivals -->
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">全部商品</h3>
            <div id="horizontalTab">
                <div id="commodityList">
                    @include('layouts.frontend.commodityList')
                </div>
                <div class="clearfix"></div>
                <div style="padding-top: 40px;">
                    <button type="button" class="btn btn-default btn-lg center-block"
                            style="color: white; background-color: gray;" value="{{$page["nextPage"]}}"
                            onclick="getCommodities(this)" id="page">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        查看更多
                    </button>
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
                {{--@if(!empty(session('recently_viewed.commodities')))--}}
                {{--<div class="btn btn-default viewed_previous_button hidden-xs">--}}
                {{--<span class="glyphicon glyphicon-chevron-left limit_icon" aria-hidden="true"></span>--}}
                {{--</div>--}}
                {{--<div class="btn btn-default viewed_next_button hidden-xs">--}}
                {{--<span class="glyphicon glyphicon-chevron-right limit_icon" aria-hidden="true"></span>--}}
                {{--</div>--}}
                {{--@endif--}}
                <div id="recentlyViewedCommodityList" style="min-height: 200px">
                    @include('layouts.frontend.recentlyViewedCommodityList')
                </div>
            </div>
        </div>
    </div>
    <!-- //viewed products -->

    <!-- //login -->
    <a href="#home" class="scroll" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>

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

    <script>
        function addToShoppingCart(commodity_id) {
            $.get("{{url('shopping')}}/" + commodity_id, {},
                function (data) {
                    if (!data.result) {
                        var callback = function () {
                            location.reload();
                        };
                        showModal("errorModal", "提示", data.msg, callback);
                        return;
                    }
                    $("#shoppingCartCount").html("(" + data.cartCount + ")購物車");
                    showModal("successModal", "提示", data.msg);
                    setTimeout(function () {
                        $("#successModal").modal("hide");
                    }, 1000);
                });
        }

        function getLimitCommodities(obj) {
            var page = $(obj).val();
            if (page == 0) {
                showModal("errorModal", "提示", "目前已是第一頁");
                return;
            }
            $.post("{{url('get_limit_commodities')}}", {
                "page": page,
                "_token": "{{ csrf_token() }}",
            }, function (data) {
                if (data === "") {
                    showModal("errorModal", "提示", "目前已是最後一頁");
                    return;
                }
                $("#limitPageButton").val(parseInt(page) + 1);
                $("#limitCommodityList").append(data);
                $.each(timer, function (index) {
                    clearInterval(timer[index]);
                });
                countdownTimer();
            });
        }

        function getCommodities(obj) {
            var page = $(obj).val();
            $.post("{{url('get_commodities')}}", {
                "page": page,
                "_token": "{{ csrf_token() }}",
            }, function (data) {
                if (data === "") {
                    showModal("errorModal", "提示", "目前已是最後一頁");
                    return;
                }
                $("#page").val(parseInt(page) + 1);
                $("#commodityList").append(data);
            });
        }
    </script>

@endsection
