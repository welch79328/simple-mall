@extends('layouts.frontend.frontend')

@section('title', "Free AD Wifi Mall 商品")

@section('css')
<link rel="stylesheet" href="{{asset('css/frontend/flexslider.css')}}" type="text/css" media="screen" />
<link href="{{asset('css/frontend/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
<style>
    .margin-top-bottom-5px{
        margin-bottom: 5px; 
        margin-top: 5px;
    }

    .padding-top-bottom-20px{
        padding-top: 20px;
        padding-bottom: 20px;
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
<div class="banner-bootom-w3-agileits" style="font-family: Microsoft JhengHei;">
    <div class="container">
        <div class="col-md-4 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{url(''.$commodity->commodity_image)}}">
                            <div class="thumb-image"> <img src="{{url(''.$commodity->commodity_image)}}" data-imagezoom="true" class="img-responsive" onError="this.src='{{$errorImgUrl}}'"> </div>
                        </li>
                        @forelse($imgs as $img)
                        <li data-thumb="{{url(''.$img->image)}}">
                            <div class="thumb-image"> <img src="{{url(''.$img->image)}}" data-imagezoom="true" class="img-responsive" onError="this.src='{{$errorImgUrl}}'"> </div>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                    <div class="clearfix"></div>
                </div>	
            </div>
        </div>
        <div class="col-md-8 single-right-left simpleCart_shelfItem">
            <div class="col-md-7 margin-top-bottom-5px" style="color: #DDAA00; font-weight: bold;">預購數量售完即出貨</div>
            <div class="col-md-5 margin-top-bottom-5px" style="color: #DDDDDD; font-weight: bold;">剩餘組數 {{$commodity->commodity_stock}}</div>
            <div class="col-md-12 margin-top-bottom-5px">
                <h3>{{$commodity->commodity_subtitle}}</h3>
            </div>
            <div class="col-md-12 margin-top-bottom-5px">
                <h4>商品敘述</h4>
                <div>
                    {{$commodity->commodity_description}}
                </div>
            </div>
            <div class="col-md-offset-8 col-md-4 margin-top-bottom-5px">
                <div>
                    <del style="margin-left: 0px;">售價$69.71</del>
                </div>
                <div class="item_price">
                    預購價 <span style="font-size: 25px; font-weight: 600; letter-spacing: 1px;">${{$commodity->commodity_price}}</span>
                </div>
                <div>
                    目前0000人正在瀏覽
                </div>
            </div>
            <div class="margin-top-bottom-5px">
                <div class="col-md-4">
                    <select class="form-control" name="">
                        <option value="default">規格選擇</option>
                    </select>
                </div> 
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2" style="margin: 0;">
                        <input type="button" value="立即預購" class="button" onclick="addToShoppingCart(this);"/>
                        <input type="hidden" value="{{$commodity->commodity_id}}"/>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                    <li>                
                        <div id="fb-root"></div>
                        <div class="fb-share-button" data-href="{{url('commodity/'.$commodity->commodity_id)}}" data-layout="button" data-size="small" data-mobile-iframe="false"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a></div>
                    </li>
                    <li>
                        <div class="line-it-button" data-lang="zh_Hant" data-type="share-a" data-url="{{url('commodity/'.$commodity->commodity_id)}}" style="display: none;"></div>
                    </li>
                </ul>   
            </div>
        </div>
        <div class="clearfix"> </div>
        <!-- /new_arrivals --> 
        <!--        <div class="responsive_tabs_agileits"> 
                    <div id="horizontalTab">
                        <ul class="resp-tabs-list">
                            <li>Description</li>
                            <li>Reviews</li>
                            <li>Information</li>
                        </ul>
                        <div class="resp-tabs-container">
                            /tab_one
                            <div class="tab1">
        
                                <div class="single_page_agile_its_w3ls">
                                    <h6>Lorem ipsum dolor sit amet</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                                    <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            //tab_one
                            <div class="tab2">
        
                                <div class="single_page_agile_its_w3ls">
                                    <div class="bootstrap-tab-text-grids">
                                        <div class="bootstrap-tab-text-grid">
                                            <div class="bootstrap-tab-text-grid-left">
                                                <img src="/images/t1.jpg" alt=" " class="img-responsive">
                                            </div>
                                            <div class="bootstrap-tab-text-grid-right">
                                                <ul>
                                                    <li><a href="#">Admin</a></li>
                                                    <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
                                                    suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
                                                    vel eum iure reprehenderit.</p>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                        <div class="add-review">
                                            <h4>add a review</h4>
                                            <form action="#" method="post">
                                                <input type="text" name="Name" required="Name">
                                                <input type="email" name="Email" required="Email"> 
                                                <textarea name="Message" required=""></textarea>
                                                <input type="submit" value="SEND">
                                            </form>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <div class="tab3">
        
                                <div class="single_page_agile_its_w3ls">
                                    <h6>Big Wing Sneakers (Navy)</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                                    <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>-->
        <!-- //new_arrivals --> 
        <!--/slider_owl-->
        <!--        <div class="w3_agile_latest_arrivals">
                    <h3 class="wthree_text_info">Featured <span>Arrivals</span></h3>	
                    <div class="col-md-3 product-men single">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="/images/w2.jpg" alt="" class="pro-image-front">
                                <img src="/images/w2.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
        
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Sleeveless Solid Blue Top</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$140.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="business" value=" ">
                                            <input type="hidden" name="item_name" value="Sleeveless Solid Blue Top">
                                            <input type="hidden" name="amount" value="30.99">
                                            <input type="hidden" name="discount_amount" value="1.00">
                                            <input type="hidden" name="currency_code" value="USD">
                                            <input type="hidden" name="return" value=" ">
                                            <input type="hidden" name="cancel_return" value=" ">
                                            <input type="submit" name="submit" value="Add to cart" class="button">
                                        </fieldset>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men single">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="/images/w4.jpg" alt="" class="pro-image-front">
                                <img src="/images/w4.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
        
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Black Basic Shorts</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$120.99</span>
                                    <del>$189.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="business" value=" ">
                                            <input type="hidden" name="item_name" value="Black Basic Shorts">
                                            <input type="hidden" name="amount" value="30.99">
                                            <input type="hidden" name="discount_amount" value="1.00">
                                            <input type="hidden" name="currency_code" value="USD">
                                            <input type="hidden" name="return" value=" ">
                                            <input type="hidden" name="cancel_return" value=" ">
                                            <input type="submit" name="submit" value="Add to cart" class="button">
                                        </fieldset>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men single">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="/images/s6.jpg" alt="" class="pro-image-front">
                                <img src="/images/s6.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
        
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Aero Canvas Loafers  </a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$120.99</span>
                                    <del>$199.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="business" value=" ">
                                            <input type="hidden" name="item_name" value="Aero Canvas Loafers">
                                            <input type="hidden" name="amount" value="30.99">
                                            <input type="hidden" name="discount_amount" value="1.00">
                                            <input type="hidden" name="currency_code" value="USD">
                                            <input type="hidden" name="return" value=" ">
                                            <input type="hidden" name="cancel_return" value=" ">
                                            <input type="submit" name="submit" value="Add to cart" class="button">
                                        </fieldset>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 product-men single">
                        <div class="men-pro-item simpleCart_shelfItem">
                            <div class="men-thumb-item">
                                <img src="/images/w7.jpg" alt="" class="pro-image-front">
                                <img src="/images/w7.jpg" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="{{url('single')}}" class="link-product-add-cart">Quick View</a>
                                    </div>
                                </div>
                                <span class="product-new-top">New</span>
        
                            </div>
                            <div class="item-info-product ">
                                <h4><a href="{{url('single')}}">Ankle Length Socks</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">$100.99</span>
                                    <del>$159.71</del>
                                </div>
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="add" value="1">
                                            <input type="hidden" name="business" value=" ">
                                            <input type="hidden" name="item_name" value="Ankle Length Socks">
                                            <input type="hidden" name="amount" value="30.99">
                                            <input type="hidden" name="discount_amount" value="1.00">
                                            <input type="hidden" name="currency_code" value="USD">
                                            <input type="hidden" name="return" value=" ">
                                            <input type="hidden" name="cancel_return" value=" ">
                                            <input type="submit" name="submit" value="Add to cart" class="button">
                                        </fieldset>
                                    </form>
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    //slider_owl
                </div>-->
    </div>
</div>

<div class="banner-bootom-w3-agileits hidden-xs" style="font-family: Microsoft JhengHei;">
    <div class="container">
        <div class="col-md-3" style="text-align: center;">
            <h2>商品介紹</h2>
        </div>
        <div class="col-md-9">
            <div class="col-md-12 padding-top-bottom-20px">
                <div style="padding-top: 20px; padding-bottom: 20px;">{{$commodity->commodity_subtitle}}</div>
                <div>{{$commodity->commodity_description}}</div>
            </div>
            <div class="col-md-12 padding-top-bottom-20px">
                <div class="col-md-7">
                    <img src="{{url(''.$commodity->commodity_image)}}" width="100%" onError="this.src='{{$errorImgUrl}}'">
                </div>
                <div class="col-md-5 ">
                    圖片的文字描述
                </div>

            </div>
            <div class="col-md-12 padding-top-bottom-20px">下面</div>
        </div>
    </div>
</div>

<div class="new_arrivals_agile_w3ls_info hidden-xs">
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
                        <img src="{{url('images/m2.jpg')}}" alt="" class="pro-image-front" onError="this.src='{{$errorImgUrl}}'">
                        <img src="{{url('images/m2.jpg')}}" alt="" class="pro-image-back" onError="this.src='{{$errorImgUrl}}'">
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
<!-- joinCartSusessModal -->
@include("layouts.frontend.modal", ['id' => "joinCartSusessModal", 'title' => "提示", 'content' => "加入購物車成功！", 'onclick' => ""])
<!-- //joinCartSusessModal -->
<!--grids-->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

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
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<!-- //line -->

<script>
    function addToShoppingCart(obj) {
        var hidden = $(obj).next();
        var commodity_id = hidden.val();
        var amount = $("#amount").val();
        if(amount === "default"){
            alert("請選擇數量");
            return;
        }
        $.get("{{url('shopping')}}/" + commodity_id, {amount: amount}, function (data) {
            $("#shoppingCartCount").html("(" + data + ")購物車");
            $("#joinCartSusessModal").modal('show');
            setTimeout(function () {
                $("#joinCartSusessModal").modal("hide");
            }, 1000);

        });
    }
</script>
@endsection

