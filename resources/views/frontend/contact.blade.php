@extends('layouts.frontend.frontend')

@section('title', 'Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Contact :: w3layouts')

@section('css')
    <style>
        .contact {
            background-color: #F0F8FF;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            height: auto;
        }

        .labelDiv {
            background-color: #DDAA00;
            color: white;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

    </style>
@section('content')
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">聯絡資訊</h3>
            <form class="form-horizontal" action="{{url('')}}" method="post">
                <div class="contact col-md-12">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group">
                            <div class="col-xs-3 col-md-2 labelDiv">
                                <label class="control-label" for="name">姓名</label>
                            </div>
                            <div class="col-xs-9 col-md-10">
                                <input type="text" class="form-control input-lg" id="name" name="name"
                                       style="background-color: white;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-3 col-md-2 labelDiv" style="background-color: #009FCC;">
                                <label class="control-label" for="phone">電話</label>
                            </div>
                            <div class="col-xs-9 col-md-10">
                                <input type="text" class="form-control input-lg" id="phone" name="phone"
                                       style="background-color: white;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-3 col-md-2 labelDiv" style="background-color: #55AA00;">
                                <label class="control-label" for="email">信箱</label>
                            </div>
                            <div class="col-xs-9 col-md-10">
                                <input type="email" class="form-control input-lg" id="email" name="email"
                                       style="background-color: white;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-3 col-md-2 labelDiv" style="background-color: #00BFFF;">
                                <label class="control-label" for="subject">主旨</label>
                            </div>
                            <div class="col-xs-9 col-md-10">
                                <input type="text" class="form-control input-lg" id="subject" name="subject"
                                       style="background-color: white;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="padding-right: 15px">
                                <textarea class="form-control" rows="10" id="comment" name="comment"
                                          style="background-color: white;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div style="text-align: right">
                            <button type="submit" class="btn btn-info">確定送出</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /banner_bottom_agile_info -->
    <!--<div class="page-head_agile_info_w3l">
    <div class="container">
        <h3>C<span>ontact Us </span></h3>
        /w3_short
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="{{url('/')}}">Home</a><i>|</i></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
        //w3_short
    </div>
</div>-->
    <!--/contact-->
    <!--<div class="banner_bottom_agile_info">
        <div class="container">
            <div class="contact-grid-agile-w3s">
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w31">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <p>12K Street, 45 Building Road <span>California, USA.</span></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w32">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Call Us</h4>
                        <p>+1234 758 839<span>+1273 748 730</span></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w33">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <p><a href="mailto:info@example.com">info@example1.com</a><span><a href="mailto:info@example.com">info@example2.com</a></span></p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>-->
    <!--<div class="contact-w3-agile1 map" data-aos="flip-right">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783" class="map" style="border:0" allowfullscreen=""></iframe>
    </div>-->
    <!--<div class="banner_bottom_agile_info">
        <div class="container">
            <div class="agile-contact-grids">
                <div class="agile-contact-left">
                    <div class="col-md-6 address-grid">
                        <h4>For More <span>Information</span></h4>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Telephone </p><span>+1 (100)222-23-33</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Mail </p><a href="mailto:info@example.com">info@example.com</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="mail-agileits-w3layouts">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="contact-right">
                                <p>Location</p><span>7784 Diamonds street, California, US.</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
                            <li class="share">SHARE ON : </li>
                            <li><a href="#" class="facebook">
                                    <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                            <li><a href="#" class="twitter">
                                    <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                            <li><a href="#" class="instagram">
                                    <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                            <li><a href="#" class="pinterest">
                                    <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                    <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 contact-form">
                        <h4 class="white-w3ls">Contact <span>Form</span></h4>
                        <form action="#" method="post">
                            <div class="styled-input agile-styled-input-top">
                                <input type="text" name="Name" required="">
                                <label>Name</label>
                                <span></span>
                            </div>
                            <div class="styled-input">
                                <input type="email" name="Email" required="">
                                <label>Email</label>
                                <span></span>
                            </div>
                            <div class="styled-input">
                                <input type="text" name="Subject" required="">
                                <label>Subject</label>
                                <span></span>
                            </div>
                            <div class="styled-input">
                                <textarea name="Message" required=""></textarea>
                                <label>Message</label>
                                <span></span>
                            </div>
                            <input type="submit" value="SEND">
                        </form>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>-->
    <!--//contact-->
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
