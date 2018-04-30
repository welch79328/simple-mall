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
            <h3>編輯會員</h3>
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
                {{--<a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>--}}
                {{--<a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>--}}
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('member/'.$data->member_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>帳號：</th>
                    <td>
                        <input type="email" class="md" name="member_account"
                               style="margin-right: 5px; padding: 6px 5px; line-height: 12px; font-size: 12px; width: 250px;"
                               value="{{$data->member_account}}" onkeyup="changeAccount(this)" required>
                        <span><i class="fa fa-exclamation-circle yellow"></i>Ex：marketing@adwifi.com.tw。</span>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>密碼：</th>
                    <td>
                        <input type="text" class="md" name="member_password" value="{{$data->member_password}}"
                               pattern="[a-zA-Z][a-zA-Z0-9]{5,7}"
                               oninvalid="this.setCustomValidity('密碼限制(6至8位、第一位為英文、只接受英文或數字)')"
                               oninput="this.setCustomValidity('')" required>
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            6至8位，第一位為英文，只接受英文與數字，Ex：q123456。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>名字：</th>
                    <td>
                        <input type="text" class="md" name="member_name" value="{{$data->member_name}}">
                    </td>
                </tr>

                <tr>
                    <th>性別 :</th>
                    <td>
                        <input type="radio" name="member_sex" value="male"
                               @if($data->member_sex == 'male') checked @endif>男
                        <input type="radio" name="member_sex" value="female"
                               @if($data->member_sex == 'female') checked @endif>女<p>
                    </td>
                </tr>

                <tr>
                    <th>生日：</th>
                    <td>
                        <select name="member_year">
                            <?php
                            for ($i = 2018;$i >= 1900;$i--){
                            ?>
                            <option value="{{$i}}" @if($data->member_year == $i) selected @endif>{{$i}}</option>
                            <?php } ?>
                        </select>
                        <span>年</span>
                        <select name="member_month">
                            <?php
                            for ($i = 1;$i <= 12;$i++){
                            ?>
                            <option value="{{$i}}" @if($data->member_month == $i) selected @endif>{{$i}}</option>
                            <?php } ?>
                        </select>
                        <span>月</span>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>信箱：</th>
                    <td>
                        <input type="email" class="md" id="member_mail" name="member_mail"
                               value="{{$data->member_mail}}"
                               style="margin-right: 5px; padding: 6px 5px; line-height: 12px; font-size: 12px; width: 250px;"
                               required readonly>
                        <span><i class="fa fa-exclamation-circle yellow"></i>此欄位不能被輸入，請從帳號欄位輸入。</span>
                    </td>
                </tr>

                <tr>
                    <th>手機：</th>
                    <td>
                        <input type="text" class="md" name="member_phone" value="{{$data->member_phone}}">
                    </td>
                </tr>

                <tr>
                    <th>市內電話：</th>
                    <td>
                        <input type="text" class="md" name="member_tel" value="{{$data->member_tel}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>Ex：02-77091239。</span>
                    </td>
                </tr>

                {{--<tr>--}}
                {{--<th>發票：</th>--}}
                {{--<td>--}}
                {{--<input type="text" class="md" name="member_invoice" value="{{$data->member_invoice}}">--}}
                {{--</td>--}}
                {{--</tr>--}}

                <tr>
                    <th width="120">地址：</th>
                    <td>
                        <select name="member_city" onchange="changeCity(this)">
                            @foreach($city as $v)
                                <option value="{{$v['city_id']}}"
                                        @if($data->member_city == $v['city_id']) selected @endif>{{$v['city']}}</option>
                            @endforeach
                        </select>

                        <select name="member_area" id="area" onchange="changeArea(this)">
                            @foreach($area as $v)
                                @if($v['city_id'] == $data->member_city)
                                    <option value="{{$v['area_id']}}"
                                            @if($data->member_area == $v['area_id']) selected @endif>{{$v['area']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="text" class="sm" id="zipcode" name="member_zipcode"
                               value="{{$data->member_zipcode}}">
                        <br>
                        <input type="text" class="lg" name="member_location" value="{{$data->member_location}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>Ex：北安路630巷15號B1。</span>
                    </td>
                </tr>

                <tr>
                    <th>信箱驗證</th>
                    <td>
                        <select name="member_enable" style="margin-right: 5px;">
                            <option value="0" @if($data->member_enable) selected @endif>未驗證</option>
                            <option value="1" @if($data->member_enable) selected @endif>已驗證</option>
                        </select>
                        <span><i class="fa fa-exclamation-circle yellow"></i>通過信箱驗證的帳號，才能使用前台的會員功能。</span>
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
            $("#member_mail").val(member_account);
        }


    </script>

@endsection