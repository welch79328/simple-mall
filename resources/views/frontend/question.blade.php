@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall  訂購流程FAQ')

@section('css')
    <style>
        .faqDiv {
            margin-bottom: 10vh;
        }

        .faqTextDiv {
            margin-top: 20px;
            padding-left: 10px;
            font-size: 3vh;
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
                <div class="faqTextDiv">
                    <p>● 信用卡即時線上一次刷卡付款</p>
                    <p>方便又好用的付款方式，當您選擇線上刷卡方式進行交易時，作業流程透過SSL加密機制，保障您的個人隱私資料。</p>
                    <p>● ATM付款</p>
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">配送方式</h3>
                <div class="faqTextDiv">
                    <p>1.超商取貨/宅急便 寄送。</p>
                    <p>2.配送範圍限台灣本島各縣市(不含郵政信箱)。</p>
                    <p>3.如本店無法接受您的訂單，將於收到您的訂單後二個工作日內通知您。但法令另有規定者除外。</p>
                    <p>4.超商取貨在取貨後絕無分期問題！詐騙手法也不斷翻新，請買家留意不明來電！提高警覺、保持冷靜，並撥打165反詐騙專線。</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">退換貨處理</h3>
                <div class="faqTextDiv">
                    <p>收到商品七天內，對商品感到不滿意，賣場無條件為您辦理整筆訂單退貨退款。</p>
                    <p>若您收到商品不滿意，七天內都可申請退貨服務，申請完畢系統會自動派黑貓宅配跟您收件</p>
                    <p>※提醒您；退貨需整筆訂單一併退貨，不可單獨退件。</p>
                    <p>本賣場不提供外島配送，若您是外島買家退換貨須請您自行寄回，本賣場無法派宅配跟您收取退貨。</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">注意事項</h3>
                <div class="faqTextDiv">
                    <p>● 收到商品後請先仔細檢查，商品凡經使用過或剪標之商品，不接受任何理由更換/退貨。</p>
                    <p>● 賣場不接受與想像不符、色差問題、個人因素以及贈品的退換貨。</p>
                    <p>● 商品加入購物車未完成訂單填寫，宅配方式未完成付款視同訂單不成立</p>
                </div>
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
