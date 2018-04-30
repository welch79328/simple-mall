@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 會員管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加會員</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $erroe)
                            <p>{{$erroe}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                {{--<a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加會員</a>--}}
                {{--<a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部會員</a>--}}
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('member')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>帳號：</th>
                    <td>
                        <input type="text" class="md" id="member_account" name="member_account" value="" readonly>
                        <span><i class="fa fa-exclamation-circle yellow"></i>此欄位無法被輸入，請從信箱欄位輸入</span>
                    </td>
                </tr>

                <tr>
                    <th>密碼：</th>
                    <td>
                        <input type="text" class="md" name="member_password" value="">
                    </td>
                </tr>

                <tr>
                    <th>確認密碼：</th>
                    <td>
                        <input type="text" class="md" name="member_password_check">
                    </td>
                </tr>

                <tr>
                    <th>名字：</th>
                    <td>
                        <input type="text" class="md" name="member_name" value="">
                    </td>
                </tr>

                <tr>
                    <th>性別 :</th>
                    <td>
                        <input type="radio" name="member_sex" value="male">男
                        <input type="radio" name="member_sex" value="female">女<p>
                    </td>
                </tr>

                <tr>
                    <th>生日：</th>
                    <td>
                        <select name="member_year">
                            <?php
                            for ($i = 2018;$i >= 1900;$i--){
                            ?>
                            <option value="{{$i}}">{{$i}}</option>
                            <?php } ?>
                        </select>
                        <span>年</span>
                        <select name="member_month">
                            <?php
                            for ($i = 1;$i <= 12;$i++){
                            ?>
                            <option value="{{$i}}">{{$i}}</option>
                            <?php } ?>
                        </select>
                        <span>月</span>
                    </td>
                </tr>

                <tr>
                    <th>信箱：</th>
                    <td>
                        <input type="text" class="md" name="member_mail" value="" onkeyup="changeAccount(this)">
                    </td>
                </tr>

                <tr>
                    <th>手機：</th>
                    <td>
                        <input type="text" class="md" name="member_phone" value="">
                    </td>
                </tr>

                <tr>
                    <th>市內電話：</th>
                    <td>
                        <input type="text" class="md" name="member_tel" value="">
                    </td>
                </tr>

                {{--<tr>--}}
                {{--<th>發票：</th>--}}
                {{--<td>--}}
                {{--<input type="text" class="md" name="member_invoice" value="">--}}
                {{--</td>--}}
                {{--</tr>--}}

                <tr>
                    <th width="120">地址：</th>
                    <td>
                        <select name="member_city" onchange="changeCity(this)">
                            @foreach($city as $v)
                                <option value="{{$v['city_id']}}">{{$v['city']}}</option>
                            @endforeach
                        </select>

                        <select name="member_area" id="area" onchange="changeArea(this)">
                            @foreach($area as $v)
                                @if($v['city_id'] == 1)
                                    <option value="{{$v['area_id']}}">{{$v['area']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" class="sm" id="zipcode" name="member_zipcode" value="{{$zipcode}}">
                        <br>
                        <input type="text" class="lg" name="member_location" value="">
                    </td>
                </tr>

                <tr>
                    <th>信箱驗證</th>
                    <td>
                        <select name="member_enable">
                            <option value="0">未驗證</option>
                            <option value="1">已驗證</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
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

        function changeAccount(obj) {
            var member_account = $(obj).val();
            $("#member_account").val(member_account);
        }


    </script>

@endsection