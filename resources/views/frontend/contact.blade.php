@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 聯絡資訊")

@section('css')
    <style>
        .contact {
            background-color: #e7f4f8;
            padding: 20px;
            margin: 10px;
            border-radius: 10px;
            height: auto;
        }

        .labelDiv {
            background-color: #efc31b;
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
            <form id="mailForm" class="form-horizontal" action="{{url('mail_to_us')}}" method="post">
                {{csrf_field()}}
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
                            <div class="col-xs-3 col-md-2 labelDiv" style="background-color: #388ecd;">
                                <label class="control-label" for="phone">電話</label>
                            </div>
                            <div class="col-xs-9 col-md-10">
                                <input type="text" class="form-control input-lg" id="phone" name="phone"
                                       style="background-color: white;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-3 col-md-2 labelDiv" style="background-color: #35a555;">
                                <label class="control-label" for="email">信箱</label>
                            </div>
                            <div class="col-xs-9 col-md-10">
                                <input type="email" class="form-control input-lg" id="email" name="email"
                                       style="background-color: white;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-3 col-md-2 labelDiv" style="background-color: #3eb9b0;">
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
                                          style="background-color: white;" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-8">
                        <div style="text-align: right">
                            <button type="submit" class="btn btn-info" style="background-color: #0c68ab"
                                    id="mailSubmitButton">
                                確定送出
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="waitModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <p>請等候系統處理寄信，關閉頁面可能會造成寄信失敗！</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- //modal -->

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
    <script>
        $(document).ready(function () {
            ajaxSubmitMail();
        });

        function ajaxSubmitMail() {
            $("#mailForm").submit(function (e) {
                e.preventDefault();
                var url = "{{url('mail_to_us')}}"; // the script where you handle the form input.
                $("#waitModal").modal("show");
                $("#mailSubmitButton").prop('disabled', true);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function (data) {
                        var callback = function () {
                            window.location.href = "{{url('contact')}}";
                        }
                        $("#waitModal").modal("hide");
                        $("#mailSubmitButton").prop('disabled', false);
                        if (!data.result) {
                            showModal("errorModal", "提示", data.msg);
                            return;
                        }
                        showModal("successModal", "提示", "寄信成功，請等候客服人員處理。", callback);
                    }
                });
            });
        }
    </script>
@endsection
