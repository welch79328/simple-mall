@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 商品")

@section('css')
    <link rel="stylesheet" href="{{asset('css/frontend/flexslider.css')}}" type="text/css" media="screen"/>
    <link href="{{asset('css/frontend/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
    <style>
        .stockDiv {
            color: #DDDDDD;
            font-weight: bold;
            text-align: right
        }

        .descriptionDiv {
            height: 120px;
            overflow: hidden;
        }

        .margin-top-bottom-5px {
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .padding-top-bottom-20px {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .fixedDiv {
            position: fixed;
            bottom: 0;
            width: 100vw;
            height: 8vh;
            z-index: 99999;
        }

        .blankSpaceDiv {
            height: 8vh;
        }

        @media (max-width: 480px) {
            .item_browsing {
                text-align: center;
            }

            .descriptionDiv {
                height: auto;
            }
        }
    </style>
@endsection

@section('content')
    <!--/single_page-->
    <!-- /banner_bottom_agile_info -->
    <!--<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>Single <span>Page </span></h3>
        /w3_short
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                    <li>Single Page</li>
                </ul>
            </div>
        </div>
        //w3_short
    </div>
</div>-->

    <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="fixedDiv visible-xs">
            <button type="button" class="btn btn-danger" style="width: 100%; height: 100%; font-size: 3vh;"
                    onclick="addToShoppingCart({{$commodity->commodity_id}});">立即預購
            </button>
        </div>
        <div class="container">
            <div class="col-xs-12 col-sm-4 col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{url(''.$commodity->commodity_image)}}">
                                <div class="thumb-image">
                                    <img src="{{url(''.$commodity->commodity_image)}}" data-imagezoom="true"
                                         class="img-responsive" onError="this.src='{{$errorImgUrl}}'"
                                         style="height: 340px">
                                </div>
                            </li>
                            @forelse($imgs as $img)
                                <li data-thumb="{{url(''.$img->image)}}">
                                    <div class="thumb-image">
                                        <img src="{{url(''.$img->image)}}" data-imagezoom="true"
                                             class="img-responsive"
                                             onError="this.src='{{$errorImgUrl}}'" style="height: 340px">
                                    </div>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-offset-1 col-sm-7 col-md-offset-1 col-md-7 single-right-left simpleCart_shelfItem"
                 style="padding-left: 0; padding-right: 0">
                <div class="col-xs-7 col-sm-7 col-md-6 margin-top-bottom-5px"
                     style="color: #DDAA00; font-weight: bold;">
                    預購數量售完即出貨
                </div>
                <div class="col-xs-5 col-sm-5 col-md-4 margin-top-bottom-5px stockDiv">
                    剩餘組數 {{$commodity->commodity_stock}}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 margin-top-bottom-5px">
                    <h3>
                        @if(!empty($commodity->commodity_subtitle))
                            {{$commodity->commodity_subtitle}}
                        @else
                            {{$commodity->commodity_title}}
                        @endif
                    </h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-10 margin-top-bottom-5px">
                    <div class="descriptionDiv">
                        {!! $commodity->commodity_description !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-offset-7 col-sm-5 col-md-offset-6 col-md-4 margin-top-bottom-5px"
                     style="text-align: right;">
                    {{--<div>--}}
                    {{--<del style="margin-left: 0px;">售價$69.71</del>--}}
                    {{--</div>--}}
                    <div class="item_price">
                        預購價
                        <span style="font-size: 35px; font-weight: 600; letter-spacing: 1px;">
                            ${{$commodity->commodity_price}}
                        </span>
                    </div>
                    <div class="item_browsing" style="font-size: 15px">
                        目前0000人正在瀏覽
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2 hidden-xs"
                         style="margin: 0; width: 100%">
                        <input type="button" value="立即預購" class="button"
                               onclick="addToShoppingCart({{$commodity->commodity_id}});"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-4">
                    <select class="form-control" name="">
                        <option value="default">規格選擇</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-offset-2 col-sm-5 col-md-offset-2 col-md-4">
                    <select class="form-control" name="member_city" id="amount">
                        <option value="default">數量選擇</option>
                        @for($i=1; $i<=10; $i++)
                            @if($i == 1)
                                <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                        <li>
                            <div id="fb-root"></div>
                            <div class="fb-share-button" data-href="{{url('commodity/'.$commodity->commodity_id)}}"
                                 data-layout="button" data-size="small" data-mobile-iframe="false">
                                <a target="_blank"
                                   href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                   class="fb-xfbml-parse-ignore"></a>
                            </div>
                        </li>
                        <li>
                            <div class="line-it-button" data-lang="zh_Hant" data-type="share-a"
                                 data-url="{{url('commodity/'.$commodity->commodity_id)}}" style="display: none;"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-xs-12 col-sm-3 col-md-3" style="text-align: center;">
                <h2>商品介紹</h2>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9">
                <div class="col-xs-12 col-md-12 padding-top-bottom-20px">
                    @if($commodity->commodity_introduce)
                        {!!$commodity->commodity_introduce!!}
                    @else
                        <p style="text-align: center; padding-top: 20px">此商品無介紹詞</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="blankSpaceDiv visible-xs"></div>

    {{--@todo--}}
    <div class="new_arrivals_agile_w3ls_info hidden-xs" hidden>
        <div class="container">
            <h3 class="wthree_text_info">推薦商品</h3>
            <div style="position: relative">
                <div class="btn btn-default viewed_previous_button hidden-xs">
                    <span class="glyphicon glyphicon-chevron-left limit_icon" aria-hidden="true"></span>
                </div>
                <div class="btn btn-default viewed_next_button hidden-xs">
                    <span class="glyphicon glyphicon-chevron-right limit_icon" aria-hidden="true"></span>
                </div>
                @for($i=0;$i<4;$i++)
                    <div class="col-md-3 product-men">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="{{url('images/m2.jpg')}}" alt="" class="pro-image-front"
                                     onError="this.src='{{$errorImgUrl}}'">
                                <img src="{{url('images/m2.jpg')}}" alt="" class="pro-image-back"
                                     onError="this.src='{{$errorImgUrl}}'">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">查看商品</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <!--//single_page-->
    <!--/grids-->
    <!--<div class="coupons">
        <div class="coupons-grids text-center">
            <div class="w3layouts_mail_grid">
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE SHIPPING</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>24/7 SUPPORT</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-md-3 w3layouts_mail_grid_left">
                    <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="w3layouts_mail_grid_left2">
                        <h3>FREE GIFT COUPONS</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>-->
    <!--grids-->
    <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover"
                                                                             style="opacity: 1;"> </span></a>

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
    <!-- single -->
    <script src="{{asset('js/frontend/imagezoom.js')}}"></script>
    <!-- single -->
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
        });
    </script>
    <!-- FlexSlider -->
    <script src="{{asset('js/frontend/jquery.flexslider.js')}}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider-->
    <!-- //script for responsive tabs -->
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
    <!-- fb -->
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.12';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- //fb -->
    <!-- line -->
    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async"
            defer="defer"></script>
    <!-- //line -->

    <script>
        function addToShoppingCart(commodity_id) {
            var amount = $("#amount").val();
            if (amount === "default") {
                alert("請選擇數量");
                return;
            }
            $.get("{{url('shopping')}}/" + commodity_id, {amount: amount}, function (data) {
                if (!data.result) {
                    showModal("errorModal", "提示", data.msg);
                    return;
                }
                $("#shoppingCartCount").html("(" + data.cartCount + ")購物車");
                showModal("successModal", "提示", data.msg);
                setTimeout(function () {
                    $("#successModal").modal("hide");
                }, 1000);
            });
        }

    </script>
@endsection

