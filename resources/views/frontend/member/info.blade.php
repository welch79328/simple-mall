@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall 資料修改')

@section('content')
    <div class="new_arrivals_agile_w3ls_info" style="font-family: Microsoft JhengHei;">
        <div class="container">
            <form class="form-horizontal" action="{{url('member_update')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-offset-2 col-md-8">
                    <h2 style="margin-bottom: 20px">資料修改</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" id="member_name" name="member_name" placeholder="請輸入名字"
                               value="{{$member->member_name}}">
                    </div>
                    <div class="form-group inline">
                        <label>性別：</label>
                        @if($member->member_sex == "female")
                            <label class="radio-inline"><input type="radio" name="member_sex" value="1">男</label>
                            <label class="radio-inline"><input type="radio" name="member_sex" value="0"
                                                               checked>女</label>
                        @else
                            <label class="radio-inline"><input type="radio" name="member_sex" value="1"
                                                               checked>男</label>
                            <label class="radio-inline"><input type="radio" name="member_sex" value="0">女</label>
                        @endif
                    </div>
                    <div class="form-group form-inline">
                        <label>生日：</label>
                        <select class="form-control" id="member_year" name="member_year">
                            @for($i=date("Y");$i>=1900;$i--)
                                @if($member->member_year == $i)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                        <label class="hidden-xs">年</label>
                        <select class="form-control" id="member_month" name="member_month">
                            @for($i=1;$i<=12;$i++)
                                @if($member->member_month == $i)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                        <label class="hidden-xs">月</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="member_phone" name="member_phone"
                               placeholder="請輸入手機"
                               value="{{$member->member_phone}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tel_code" name="tel_code"
                               placeholder="區碼"
                               value="{{$member->tel_code}}" style="width: 20%; float: left">
                        <input type="text" class="form-control" id="member_tel" name="member_tel"
                               placeholder="請輸入市內電話"
                               value="{{$member->member_tel}}" style="width: 80%; float: left">
                    </div>
                    <div class=" clearfix"></div>
                    <div class="form-group">
                        <select class="form-control" name="member_city" id="city" onchange="changeCity(this)"
                                style="width: 40%; float: left">
                            @foreach($city as $v)
                                <option value="{{$v['city_id']}}"
                                        @if($member->member_city == $v['city_id']) selected @endif>{{$v['city']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="member_area" id="area" onchange="changeArea(this)"
                                style="width: 40%; float: left">
                            @foreach($area as $v)
                                @if(!empty($member->member_city))
                                    @if($v['city_id'] == $member->member_city)
                                        <option value="{{$v['area_id']}}"
                                                @if($member->member_area == $v['area_id']) selected @endif>{{$v['area']}}</option>
                                    @endif
                                @elseif($v['city_id'] == 1)
                                    <option value="{{$v['area_id']}}">{{$v['area']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" class="form-control" id="zipcode" name="member_zipcode"
                               value="@if(empty($member->member_zipcode)) {{$zipcode}} @else {{$member->member_zipcode}} @endif"
                               readonly style="width: 20%; float: left">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="member_location" name="member_location"
                               placeholder="請輸入道路街名" value="{{$member->member_location}}">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    @if(session('sussess.msg'))
                        <script>
                            $(document).ready(function () {
                                showModal("sussessModal", "提示", "修改資料成功！");
                            });
                        </script>
                        <p style="color: #009966; text-align: center;">{{session('sussess.msg')}}</p>
                    @endif
                    <div style="text-align: right">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>

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

    </script>
@endsection