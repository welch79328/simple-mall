@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 退貨單管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>查看退貨單</h3>
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
            @if(session("success"))
                <div class="mark">
                    <p>{{session("success.msg")}}</p>
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                {{--<a href="{{url('admin/returns/create')}}"><i class="fa fa-plus"></i>添加退貨單</a>--}}
                <a href="{{url('admin/returns')}}"><i class="fa fa-recycle"></i>全部退貨單</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        {{--<form action="{{url('admin/returns/update/'.$data->returns_id)}}" method="post">--}}
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="150px">退貨單編號：</th>
                <td>
                    <p>{{$data->returns_number}}</p>
                </td>
            </tr>

            <tr>
                <th>退貨原因：</th>
                <td>
                    <p>{{$data->_returns_reason}}</p>
                </td>
            </tr>

            <tr>
                <th>銀行代碼：</th>
                <td>
                    <p>{{$data->bank_code}}</p>
                </td>
            </tr>

            <tr>
                <th>帳戶名稱：</th>
                <td>
                    <p>{{$data->returns_account_name}}</p>
                </td>
            </tr>

            <tr>
                <th>退款帳號：</th>
                <td>
                    <p>{{$data->returns_account}}</p>
                </td>
            </tr>

            <tr>
                <th>聯絡姓名：</th>
                <td>
                    <p>{{$data->returns_name}}</p>
                </td>
            </tr>

            <tr>
                <th>聯絡信箱：</th>
                <td>
                    <p>{{$data->returns_mail}}</p>
                </td>
            </tr>

            <tr>
                <th>聯絡手機：</th>
                <td>
                    <p>{{$data->returns_phone}}</p>
                </td>
            </tr>

            <tr>
                <th>聯絡電話：</th>
                <td>
                    <p>{{$data->returns_tel}}</p>
                </td>
            </tr>

            <tr>
                <th>郵遞區號：</th>
                <td>
                    <p>{{$data->returns_zipcode}}</p>
                </td>
            </tr>

            <tr>
                <th>聯絡地址：</th>
                <td>
                    <p>{{$data->returns_address}}</p>
                </td>
            </tr>

            <tr>
                <th>退貨商品：</th>
                <td>
                    @foreach($orderDetail as $v)
                        <p>
                            <span>{{$v->name}}</span>
                            @if(!empty($v->spec_name))
                                <span>規格:{{$v->spec_name}}</span>
                            @endif
                            <span>數量:{{$v->amount}}</span>
                            <span>單價:{{$v->price}}</span>
                        </p>
                    @endforeach
                </td>
            </tr>

            <tr>
                <th>總金額：</th>
                <td>
                    <p>{{$order->order_total}}</p>
                </td>
            </tr>

            <tr>
                <th>狀態：</th>
                <td>
                    <p>{{$data->_returns_status}}</p>
                    {{--<select name="returns_status">--}}
                    {{--<option value="pending" @if($data->returns_status == 'pending') selected @endif>--}}
                    {{--待處理--}}
                    {{--</option>--}}
                    {{--<option value="complete" @if($data->returns_status == 'complete') selected @endif>--}}
                    {{--已解決--}}
                    {{--</option>--}}
                    {{--</select>--}}
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    {{--<input type="submit" value="提交">--}}
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
        {{--</form>--}}
    </div>

    <script>

    </script>

@endsection