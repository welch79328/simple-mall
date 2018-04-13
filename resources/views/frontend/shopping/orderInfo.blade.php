@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 訂購資料")

@section('css')
    <style>
        @media (max-width: 480px) {
            .order_info {
                font-size: 4px;
            }

            .agree_info {
                font-size: 5px;
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
                        <input type="text" class="form-control" id="name" name="member_name" placeholder="請輸入中文姓名"
                               required value="{{$data->member_name}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="member_phone" placeholder="請輸入行動電話"
                               value="{{$data->member_phone}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tel_code" name="tel_code" placeholder="區碼"
                               style="width: 20%; float: left" value="{{$data->tel_code}}">
                        <input type="text" class="form-control" id="tel" name="member_tel" placeholder="請輸入市話"
                               style="width: 80%; float: left" value="{{$data->member_tel}}">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="mail" name="member_mail" placeholder="請輸入電子信箱"
                               value="{{$data->member_mail}}">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="member_city" onchange="changeCity(this)"
                                style="width: 40%; float: left">
                            @foreach($city as $v)
                                <option value="{{$v['city_id']}}"
                                        @if($data->member_city == $v['city_id']) selected @endif>{{$v['city']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="member_area" id="area" onchange="changeArea(this)"
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
                        <input type="text" class="form-control" id="zipcode" name="member_zipcode"
                               value="@if($data->member_zipcode == Null) {{$zipcode}} @else {{$data->member_zipcode}} @endif"
                               style="width: 20%; float: left" readonly>
                        <div class="clearfix"></div>
                        <div style="margin-top: 10px">
                            <input type="text" class="form-control" id="address" name="member_location"
                                   placeholder="請輸入道路街名" value="{{$data->member_location}}" required>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <textarea class="form-control" rows="5" id="comment" name="comment"
                                  placeholder="備註事項"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-9 col-md-9 order_info" style="padding-right: 0px;">
                            填寫完上述資料系統將會發送訂單通知<br/>
                            並由客服人員確認訂購資訊(確認付款及到貨資訊)
                        </div>
                        <div class="col-xs-3 col-md-3 agree_info" style="text-align: right;">
                            <label><input type="radio" name="agree" required>我了解</label>
                        </div>
                    </div>
                    <div style="text-align: center; font-size: 3vh; font-weight:bold;">
                        <div>
                            訂單金額 <span style="color: red;">${{$total}}</span>
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
    <script>
        $(document).ready(function () {
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

        function ajaxSubmitOrder() {
            $("#addOrderForm").submit(function (e) {
                var url = "{{url('order_setup')}}"; // the script where you handle the form input.
                showModal("waitModal", "提示", "請等候系統處理訂單！");
                $("#orderSubmitButton").prop('disabled', true);
                $.ajax({
                    url: url,
                    type: "POST",
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function (data) {
                        console.log(data);
                        var callback = function () {
                            window.location.href = "{{url('/')}}";
                        }
                        if (!data.result) {
                            showModal("errorModal", "提示", data.msg, callback);
                            return;
                        }
                        $("#waitModal").modal("hide");
                        $("#orderSubmitButton").prop('disabled', false);
                        showModal("successModal", "提示", "感謝您的購買，請等候頁面跳轉，或按下關閉即可。", callback);
                        setTimeout(callback, 2000);
                    }
                });
                e.preventDefault();
            });
        }
    </script>
@endsection