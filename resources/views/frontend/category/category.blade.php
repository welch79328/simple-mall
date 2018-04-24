@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle $topCate->cate_name 商品列表")

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/jquery-ui.css')}}">
    <style>
        #minPrice {
            width: 50%;
            float: left;
        }

        #maxPrice {
            width: 50%;
        }

        @media (max-width: 480px) {
            #minPrice {
                width: 100%;
            }

            #maxPrice {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <input id="activeCateId" type="hidden" value="{{$activeCate->cate_id}}">
    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <!-- mens -->
            <div class="col-sm-3 col-md-3 products-left">
                <div class="css-treeview col-xs-12">
                    <h4>{{$activeCate->cate_name}}</h4>
                    <div class="list-group">
                        @foreach($cateTree as $cate)
                            @if($cate->cate_id == $activeCate->cate_id)
                                <a href="{{url('category/' . $cate->cate_id . '?topCateId=' . $topCate->cate_id)}}"
                                   class="list-group-item active">{{$cate->cate_name}}</a>
                            @else
                                <a href="{{url('category/' . $cate->cate_id . '?topCateId=' . $topCate->cate_id)}}"
                                   class="list-group-item">{{$cate->cate_name}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div style="margin-top: 30px; margin-bottom: 30px;" class="col-xs-12">
                    <h3 style="margin-bottom: 10px">價格範圍</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="minPrice" name="minPrice" placeholder="最小值"
                               required="true">
                        <input type="text" class="form-control" id="maxPrice" name="maxPrice" placeholder="最大值"
                               required="true">
                    </div>
                    <div>
                        <button type="button" class="btn btn-default" style="width: 100%"
                                onclick="searchCommodities()">套用
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-default" style="width: 100%" onclick="resetPrice()">清除全部
                        </button>
                    </div>
                </div>
                <!--            <div class="filter-price">
                                <h3>價格範圍</h3>
                                <ul class="dropdown-menu6">
                                    <li>
                                        <div id="slider-range"></div>
                                        <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                                    </li>
                                </ul>
                            </div>-->
                <!--            <div class="community-poll">
                                <h4>Community Poll</h4>
                                <div class="swit form">
                                    <form>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>More convenient for shipping and delivery</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lower Price</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Track your item</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bigger Choice</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>More colors to choose</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Secured Payment</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Money back guaranteed</label> </div></div>
                                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Others</label> </div></div>
                                        <input type="submit" value="SEND">
                                    </form>
                                </div>
                            </div>-->
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-9 col-md-9 products-right">
                <h3 class="wthree_text_info" style="padding-left: 15px;">{{$activeCate->cate_name}}</h3>
                <div class="sorting">
                    <select class="form-control" id="sortByPrice" onchange="searchCommodities()">
                        <option value="default">預設排序</option>
                        <option value="commodity_price">價格低到高</option>
                        <option value="-commodity_price">價格高到低</option>
                    </select>
                    <div class="clearfix"></div>
                </div>
                <div class="sorting">
                    <button type="button" class="btn btn-default" onclick="getPopolarCommodities(this.value)"
                            value="-commodity_view">最熱門
                    </button>
                </div>
                <div class="sorting">
                    <button type="button" class="btn btn-default" onclick="getLatestCommodities(this.value)"
                            value="-created_at">最新
                    </button>
                </div>
                <div class="clearfix"></div>
                <div id="commodityList">
                    @include('layouts.frontend.commodityList')
                </div>
                <div class="clearfix"></div>
                <div style="padding-top: 40px;">
                    <button type="button" class="btn btn-default btn-lg center-block"
                            style="color: white; background-color: gray;" value="2"
                            onclick="getMoreCommodities(this.value)" id="page">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        查看更多
                    </button>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

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

    <!-- specModal-->
    <div id="specModalPlace"></div>
    <!-- //specModal-->

    <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover"
                                                                             style="opacity: 1;"> </span></a>
    <!-- //js -->
    <script src="{{asset('js/frontend/responsiveslides.min.js')}}"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>
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
    <!---->
    <script type='text/javascript'>//<![CDATA[
        $(window).load(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 9000,
                values: [1000, 7000],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

        });//]]>

    </script>
    <script type="text/javascript" src="{{asset('js/frontend/jquery-ui.js')}}"></script>
    <!---->
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
    <script>

        function searchCommodities() {
            var cate_id = $("#activeCateId").val();
            var minPrice = $("#minPrice").val();
            var maxPrice = $("#maxPrice").val();
            var sort = [];
            if ($("#sortByPrice").val() != "default") {
                sort.push($("#sortByPrice").val());
            }
            $.post("{{url('get_commodities_by_query')}}",
                {
                    _token: "{{ csrf_token() }}",
                    cate_id: cate_id,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    sort: sort
                },
                function (data) {
                    if (data === "") {
                        $("#commodityList").html("<div style='margin-top: 20px; text-align: center;'>沒有符合此條件的商品！</div>");
                        return;
                    }
                    $("#page").val("2");
                    $("#commodityList").html(data);
                }
            );
        }

        function resetPrice() {
            $("#minPrice").val("");
            $("#maxPrice").val("");
            searchCommodities();
        }

        function getMoreCommodities(page) {
            var cate_id = $("#activeCateId").val();
            var minPrice = $("#minPrice").val();
            var maxPrice = $("#maxPrice").val();
            var sort = [];
            if ($("#sortByPrice").val() != "default") {
                sort.push($("#sortByPrice").val());
            }
            $.post("{{url('get_commodities_by_query')}}",
                {
                    _token: "{{ csrf_token() }}",
                    cate_id: cate_id,
                    page: page,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    sort: sort
                },
                function (data) {
                    if (data === "") {
                        showModal("errorModal", "提示", "目前已是最後一頁");
                        return;
                    }
                    $("#page").val(parseInt(page) + 1);
                    $("#commodityList").append(data);
                }
            );
        }

        function getLatestCommodities(value) {
            var cate_id = $("#activeCateId").val();
            var minPrice = $("#minPrice").val();
            var maxPrice = $("#maxPrice").val();
            var sort = [];
            sort.push(value);
            if ($("#sortByPrice").val() != "default") {
                sort.push($("#sortByPrice").val());
            }
            $.post("{{url('get_commodities_by_query')}}",
                {
                    _token: "{{ csrf_token() }}",
                    cate_id: cate_id,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    sort: sort
                },
                function (data) {
                    if (data === "") {
                        $("#commodityList").html("<div style='margin-top: 20px; text-align: center;'>沒有符合此條件的商品！</div>");
                        return;
                    }
                    $("#page").val("2");
                    $("#commodityList").html(data);
                }
            );
        }

        function getPopolarCommodities(value) {
            var cate_id = $("#activeCateId").val();
            var minPrice = $("#minPrice").val();
            var maxPrice = $("#maxPrice").val();
            var sort = [];
            sort.push(value);
            if ($("#sortByPrice").val() != "default") {
                sort.push($("#sortByPrice").val());
            }
            $.post("{{url('get_commodities_by_query')}}",
                {
                    _token: "{{ csrf_token() }}",
                    cate_id: cate_id,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    sort: sort
                },
                function (data) {
                    if (data === "") {
                        $("#commodityList").html("<div style='margin-top: 20px; text-align: center;'>沒有符合此條件的商品！</div>");
                        return;
                    }
                    $("#page").val("2");
                    $("#commodityList").html(data);
                }
            );
        }

    </script>
@endsection