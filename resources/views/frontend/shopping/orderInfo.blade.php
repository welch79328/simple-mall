@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 訂購資料")

@section('css')
    <style>
        @media (max-width: 480px) {
            .order_info {
                font-size: 10px;
            }

            .agree_info {
                font-size: 10px;
            }
        }
    </style>

@section('content')
    <div class="new_arrivals_agile_w3ls_info" style="font-family: Microsoft JhengHei;">
        <div class="container">
            <form id="addOrderForm" class="form-horizontal" action="{{url('order_setup')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-offset-2 col-md-8" style="padding: 30px;">
                    <h2 style="margin-bottom: 20px">收件人資料<i class="glyphicon glyphicon-user"></i></h2>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="order_name" placeholder="請輸入中文姓名"
                               required value="{{$data->member_name}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="order_phone" placeholder="請輸入行動電話"
                               value="{{$data->member_phone}}" maxlength="10" pattern="\d{10}"
                               oninvalid="this.setCustomValidity('最多十位，只能輸入數字')"
                               oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tel_code" name="tel_code" placeholder="區碼"
                               style="width: 20%; float: left" value="{{$data->tel_code}}" onchange="requireTel()"
                               maxlength="4" pattern="\d{1,4}" oninvalid="this.setCustomValidity('最多四位，只能輸入數字')"
                               oninput="this.setCustomValidity('')">
                        <input type="text" class="form-control" id="tel" name="order_tel" placeholder="請輸入市話"
                               style="width: 80%; float: left" value="{{$data->member_tel}}" onchange="requireTel()"
                               maxlength="8" pattern="\d{8}" oninvalid="this.setCustomValidity('最多八位，只能輸入數字')"
                               oninput="this.setCustomValidity('')">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="mail" name="order_mail" placeholder="請輸入電子信箱"
                               value="{{$data->member_mail}}">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="order_city" onchange="changeCity(this)"
                                style="width: 40%; float: left">
                            @foreach($city as $v)
                                <option value="{{$v['city_id']}}"
                                        @if($data->member_city == $v['city_id']) selected @endif>{{$v['city']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="order_area" id="area" onchange="changeArea(this)"
                                style="width: 40%; float: left">
                            @foreach($area as $v)
                                @if(!empty($data->member_city))
                                    @if($v['city_id'] == $data->member_city)
                                        <option value="{{$v['area_id']}}"
                                                @if($data->member_area == $v['area_id']) selected @endif>{{$v['area']}}</option>
                                    @endif
                                @elseif($v['city_id'] == 1)
                                    <option value="{{$v['area_id']}}">{{$v['area']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" class="form-control" id="zipcode" name="order_zipcode"
                               value="@if($data->member_zipcode == Null) {{$zipcode}} @else {{$data->member_zipcode}} @endif"
                               style="width: 20%; float: left" readonly>
                        <div class="clearfix"></div>
                        <div style="margin-top: 10px">
                            <input type="text" class="form-control" id="address" name="order_location"
                                   placeholder="請輸入道路街名" value="{{$data->member_location}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="comment" name="order_comment"
                                  placeholder="備註事項"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-9 col-md-9 order_info" style="padding-right: 0px;">
                            填寫完上述資料系統將會發送訂單通知<br/>
                            並由客服人員確認訂購資訊(確認付款及到貨資訊)
                        </div>
                        <div class="col-xs-3 col-md-3 agree_info" style="text-align: right;">
                            <label><input type="radio" name="agree" value="1" required>我了解</label>
                        </div>
                    </div>
                    <div style="text-align: center; font-size: 3vh; font-weight:bold;">
                        <div>
                            訂單總金額 <span style="color: red;">${{$total}}</span>
                        </div>
                        <div>
                            預購組數售完即通知
                        </div>
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    <div style="text-align: right">
                        <button type="button" class="btn btn-default" onclick="(history.go(-1))">上一步</button>
                        <button type="submit" class="btn btn-danger" id="orderSubmitButton">完成</button>
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
                    <p>請等候系統處理訂單，關閉頁面可能會造成預購失敗！</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- //modal -->
    <script>
        $(document).ready(function () {
            //customValidityMsg();
            ajaxSubmitOrder();
        });

        function changeCity(obj) {
            var city_order = $(obj).val();
            $.post("{{url('city')}}", {'_token': '{{csrf_token()}}', 'city_id': city_order}, function (data) {
                $('#area').empty();
                for (var i = 0; i < data.length; i++) {
                    $('#area').append('<option value="' + data[i].areaid + '">' + data[i].area + '</option>')
                }
                $('#zipcode').attr('value', data[0].zipcode);
            });
        }

        function changeArea(obj) {
            var area_order = $(obj).val();

            $.post("{{url('area')}}", {'_token': '{{csrf_token()}}', 'area_id': area_order}, function (data) {
                $('#zipcode').attr('value', data);
            });
        }

        function requireTel() {
            var tel = $("#tel").val();
            var tel_code = $("#tel_code").val();
            if (tel || tel_code) {
                $("#tel").prop("required", true);
                $("#tel_code").prop("required", true);
            } else {
                $("#tel").removeAttr("required");
                $("#tel_code").removeAttr("required");
            }
        }

        function ajaxSubmitOrder() {
            $("#addOrderForm").submit(function (e) {
                e.preventDefault();
                var phone = $('#phone').val()
                var tel = $("#tel").val();
                if (phone == "" && tel == "") {
                    showModal("alertModal", "提示", "行動電話與市話請擇一填寫！");
                    return;
                }
                var url = "{{url('order_setup')}}"; // the script where you handle the form input.
                $("#waitModal").modal("show");
                $("#orderSubmitButton").prop('disabled', true);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function (data) {
                        $("#waitModal").modal("hide");
                        $("#orderSubmitButton").prop('disabled', false);
                        var callback = function () {
                            window.location.href = "{{url('member_order')}}";
                        }
                        if (!data.result) {
                            showModal("errorModal", "提示", data.msg);
                            return;
                        }
                        showModal("successModal", "提示", "預購商品成功，請按下關閉按鈕即可跳轉到查詢訂單的畫面。", callback);
                    }
                });
            });
        }

        function customValidityMsg() {
            $('#phone').get(0).setCustomValidity('最大十位，只能輸入數字');
            $('#tel_code').get(0).setCustomValidity('最大四位，只能輸入數字');
            $('#tel').get(0).setCustomValidity('最大八位，只能輸入數字');
        }
    </script>
@endsection