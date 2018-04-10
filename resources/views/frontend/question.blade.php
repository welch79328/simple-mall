@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 訂購流程FAQ")

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
                <img src="{{url('images/frontend/shopping_process-12.png')}}" width="100%">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">付款方式</h3>
                <div class="faqTextDiv">
                    <p>填寫完商品預購單後，系統將直接連結至相關網站進行結帳，提供ATM以及線上刷卡功能。</p>
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">配送方式</h3>
                <div class="faqTextDiv">
                    <p>預購組數達滿後立即以郵寄或宅配方式出貨，將以郵件通知出貨。</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 faqDiv">
                <h3 class="wthree_text_info" style="margin-bottom: 10px;">售後服務</h3>
                <div class="faqTextDiv">
                    <p>￭收到錯誤/瑕疵商品</p>
                    <p>對於捷U購出貨前未做好詳盡檢查，造成您的不便感到非常抱歉，請至會員專區訂單右側點選"我要退貨"，捷U購收到信件後會立即與您聯繫。</p>
                    <p><br/></p>
                    <p>￭退貨須知</p>
                    <p>預售商品皆提供7天鑑賞期(非試用期)，商品未經拆封或破損（除原有商品瑕疵），請於收到商品後7天鑑賞期(含例假日)內申請退貨，將商品連同原包裝及發票封裝後自行寄回。</p>
                    <p><br/></p>
                    <p>
                        如收到錯誤或瑕疵商品，因換貨所產生之來回運費，皆由捷U購負擔；其他因個人因素欲退貨，所產生之運費皆由消費者自行支付。商品退款於收到退貨後經檢查無誤，於7-14個工作天內退回至消費者原轉帳帳戶(扣除退貨運費)。
                    </p>
                    <p style="color: red">*捷U購預售商品僅供退貨不提供換貨服務(除錯誤/瑕疵商品)。</p>
                    <p style="color: red">*即期商品因保存期限短暫，恕不提供退貨服務，購買前請三思。</p>
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
