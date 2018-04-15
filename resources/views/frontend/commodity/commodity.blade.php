@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 商品")

@section('css')
    <link rel="stylesheet" href="{{asset('css/frontend/flexslider.css')}}" type="text/css" media="screen"/>
    <link href="{{asset('css/frontend/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
    <style>
        .addCartButton {
            width: 100%;
            height: 100%;
            font-size: 25px;
            color: white;
            background-color: #e71d1c;
            border-radius: 0;
        }

        .timeSpan {
            padding-left: 2px;
            padding-right: 2px;
            background-color: #e71d1c;
            color: white;
        }

        .infoDiv {
            vertical-align: bottom;
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 4px;
            padding-top: 4px;
            font-size: 14.5px;
            width: 100%;
            background-color: #f4e857;
        }

        .remindDiv {
            color: #DDAA00;
            font-weight: bold;
            font-size: 18px;
        }

        .priceDiv {
            color: #e71d1c;
            font-size: 3vh;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .browsingDiv {
            margin-top: 20px;
            text-align: right;
            font-size: 25px;
            color: #d8a91e;
            font-weight: bold;
        }

        .stockDiv {
            font-size: 18px;
            color: #707070;
            font-weight: bold;
            text-align: right
        }

        .descriptionDiv {
            height: 170px;
            overflow: auto;
        }

        .margin-top-bottom-5px {
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .margin-top-bottom-10px {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .margin-top-bottom-20px {
            margin-bottom: 20px;
            margin-top: 20px;
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
            #scrollTopDiv {
                padding-bottom: 0;
            }

            .descriptionDiv {
                height: auto;
            }

            .priceDiv {
                font-size: 24px;
                letter-spacing: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="fixedDiv visible-xs">
        <button type="button" class="btn btn-danger addCartButton"
                onclick="addToShoppingCart({{$commodity->commodity_id}});">
            剩餘組數{{$commodity->commodity_stock}}/立即預購
        </button>
        <div class="clearfix"></div>
    </div>

    <!-- banner-bootom-w3-agileits -->
    <div id="scrollTopDiv" class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-xs-12 col-sm-4 col-md-4 single-right-left" style="margin-bottom: 0px;">
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
            <div class="col-xs-12 col-sm-offset-1 col-sm-7 col-md-offset-1 col-md-7 single-right-left simpleCart_shelfItem hidden-xs"
                 style="padding-left: 0; padding-right: 0">
                <div class="col-xs-7 col-sm-7 col-md-6 margin-top-bottom-5px remindDiv">
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

                <div class="col-xs-12 col-sm-10 col-md-10 margin-top-bottom-5px"
                     style="text-align: right;">
                    {{--<div>--}}
                    {{--<del style="margin-left: 0px;">售價$69.71</del>--}}
                    {{--</div>--}}
                    <div class="item_price priceDiv">
                        預購價
                        <span style="font-size: 35px;">
                            ${{$commodity->commodity_price}}
                        </span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <select class="form-control" name="">
                        <option value="default">規格選擇</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
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
                <div class="col-sm-4 col-md-4 hidden-xs">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2"
                         style="margin: 0; width: 100%">
                        <input type="button" value="立即預購" class="button"
                               onclick="addToShoppingCart({{$commodity->commodity_id}});"/>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
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
                                 data-url="{{url('commodity/'.$commodity->commodity_id)}}"
                                 style="display: none;"></div>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 browsingDiv">
                    目前0000人正在瀏覽
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-xs-12 infoDiv visible-xs">

        <div class="col-xs-6" style="padding-right: 10px">
            <div style="color: #e71d1c">
                剩餘時間:
                <input name="endTime" type="hidden" value="{{$commodity->commodity_end_time}}">
                <span hidden>
                    <span id="hourSpan" class="timeSpan"></span>
                    <span>:</span>
                    <span id="minSpan" class="timeSpan"></span>
                    <span>:</span>
                    <span id="secSpan" class="timeSpan"></span>
                </span>
            </div>
        </div>
        <div class="col-xs-6">
            <del>售價0000</del>
        </div>
        <div class="col-xs-6" style="padding-right: 10px; margin-top: 10px;">
            <div style="color: #d0a31e">目前0000人正在瀏覽</div>
        </div>
        <div class="col-xs-6" style="padding-right: 0;">
            <div class="priceDiv">
                預購價 ${{$commodity->commodity_price}}
            </div>
        </div>
    </div>

    <div class="banner-bootom-w3-agileits visible-xs">
        <div class="container">
            <div class="col-xs-12 col-sm-offset-1 col-sm-7 col-md-offset-1 col-md-7 single-right-left simpleCart_shelfItem"
                 style="padding-left: 0; padding-right: 0">
                <div class="col-xs-12 margin-top-bottom-20px">
                    <h3 style="font-size: 25px">
                        @if(!empty($commodity->commodity_subtitle))
                            {{$commodity->commodity_subtitle}}
                        @else
                            {{$commodity->commodity_title}}
                        @endif
                    </h3>
                </div>
                <div class="col-xs-12 margin-top-bottom-10px">
                    <select class="form-control" name="">
                        <option value="default">規格選擇</option>
                    </select>
                </div>
                <div class="col-xs-12 margin-top-bottom-10px">
                    <select class="form-control" name="member_city" onchange="changeQuantity(this)">
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
                <div class="col-xs-12 margin-top-bottom-10px">
                    <div style="color: #d0a31e; text-align: center;">預購數量售完即出貨</div>
                </div>
                <div class="col-xs-12">
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls"
                        style="margin-top: 0;">
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
                                 data-url="{{url('commodity/'.$commodity->commodity_id)}}"
                                 style="display: none;"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
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
    <div class="hidden-xs">
        <a href="#home" class="scroll" id="toTop" style="display: block;">
            <span id="toTopHover" style="opacity: 1;"> </span>
        </a>
    </div>

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
        $(window).on("load", function () {
            countdownTimer();
            if ($(window).width() <= 480) {
                $('html, body').animate({scrollTop: $("#scrollTopDiv").offset().top}, 2000);
                $("ol").hide();
            }
        });

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

        function countdownTimer() {
            var input = $("input[name='endTime']");
            var endTime = input.val();
            var countDownDate = new Date(endTime.replace(/-/g, '/')).getTime();
            timer = setInterval(function () {
                // Get todays date and time
                var now = new Date().getTime();
                // Find the distance between now an the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor(distance / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                if (seconds < 10) {
                    seconds = "0" + seconds;
                }
                input.next().show();
                $("#hourSpan").html(hours);
                $("#minSpan").html(minutes);
                $("#secSpan").html(seconds);
                // If the count down is over, write some text
                if (distance <= 0) {
                    clearInterval(timer);
                    window.location.href = "{{url('/')}}";
                }
            }, 1000);
        }

        function changeQuantity(obj) {
            $("#amount").val(obj.value);
        }

    </script>
@endsection

