@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 訂單管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>查看訂單</h3>
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
                {{--<a href="{{url('admin/order/create')}}"><i class="fa fa-plus"></i>添加訂單</a>--}}
                <a href="{{url('admin/order')}}"><i class="fa fa-recycle"></i>全部訂單</a>
                <a href="{{url('admin/commodity_show')}}"><i class="fa fa-recycle"></i>預購滿商品</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        {{--<form action="{{url('admin/order')}}" method="post">--}}
            {{--{{csrf_field()}}--}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th>訂單編號：</th>
                        <td>
                            <p>{{$data->order_number}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶名稱：</th>
                        <td>
                            <p>{{$data->member_name}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶性別：</th>
                        <td>
                            <p>{{$data->member_sex}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶生日：</th>
                        <td>
                            <p>{{$data->member_year}} - {{$data->member_month}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶信箱：</th>
                        <td>
                            <p>{{$data->member_mail}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶手機：</th>
                        <td>
                            <p>{{$data->member_phone}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶電話：</th>
                        <td>
                            <p>{{$data->member_tel}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>郵遞區號：</th>
                        <td>
                            <p>{{$data->member_zipcode}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>用戶地址：</th>
                        <td>
                            <p>{{$data->member_city}} {{$data->member_area}} {{$data->member_location}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>購買商品：</th>
                        <td>
                            @foreach($orderlist as $v)
                                <p><a href="{{url('admin/order/alone/'.$v->id)}}">{{$v->name}}</a>  數量:{{$v->amount}}  單價:{{$v->price}}  ({{$v->status}})</p>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>訂單金額：</th>
                        <td>
                            <p>{{$data->order_total}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>訂單狀態：</th>
                        <td>
                            <p>{{$data->order_status}}</p>
                        </td>
                    </tr>

                    {{--<tr>--}}
                        {{--<th></th>--}}
                        {{--<td>--}}
                            {{--<input type="submit" value="提交">--}}
                            {{--<input type="button" class="back" onclick="history.go(-1)" value="返回">--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                </tbody>
            </table>
        {{--</form>--}}
    </div>

    <script>

    </script>

@endsection