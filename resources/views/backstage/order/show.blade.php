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
            @if(session("success"))
                <div class="mark">
                    <p>{{session("success.msg")}}</p>
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
        <form action="{{url('admin/order/update/'.$data->order_id)}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>訂單編號：</th>
                    <td>
                        <p>{{$data->order_number}}</p>
                    </td>
                </tr>
                <tr>
                    <th>訂購者：</th>
                    <td>
                        <p>
                            <a href="{{url('member/'.$member->member_id.'/edit')}}">
                                @if(!empty($member->member_name))
                                    {{$member->member_name}}
                                @else
                                    {{$member->member_account}}
                                @endif
                            </a>
                        </p>
                    </td>
                </tr>

                <tr>
                    <th>訂單總金額：</th>
                    <td>
                        <p>{{$data->order_total}}</p>
                    </td>
                </tr>

                <tr>
                    <th>訂單狀態：</th>
                    <td>
                        <select name="order_status">
                            <option value="pending" @if($data->order_status == 'pending') selected @endif>待處理</option>
                            <option value="shipping" @if($data->order_status == 'shipping') selected @endif>出貨中</option>
                            <option value="complete" @if($data->order_status == 'complete') selected @endif>已送達</option>
                            <option value="refund" @if($data->order_status == 'refund') selected @endif>退貨處理中</option>
                            <option value="cancel" @if($data->order_status == 'cancel') selected @endif>取消</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>是否付款：</th>
                    <td>
                        <select name="is_pay">
                            <option value="1" @if($data->is_pay == '1') selected @endif>已付款</option>
                            <option value="0" @if($data->is_pay == '0') selected @endif>尚未付款</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>送達時間：</th>
                    <td>
                        {{$data->delivery_time}}
                    </td>
                </tr>

                <tr>
                    <th>聯絡姓名：</th>
                    <td>
                        <p><input type="text" name="order_name" value="{{$data->order_name}}"></p>
                    </td>
                </tr>

                <tr>
                    <th>聯絡信箱：</th>
                    <td>
                        <p>
                            <input type="email" name="order_mail" value="{{$data->order_mail}}"
                                   style="padding: 6px 5px;">
                        </p>
                    </td>
                </tr>

                <tr>
                    <th>聯絡手機：</th>
                    <td>
                        <p><input type="text" name="order_phone" value="{{$data->order_phone}}"></p>
                    </td>
                </tr>

                <tr>
                    <th>聯絡電話：</th>
                    <td>
                        <p><input type="text" name="order_tel" value="{{$data->order_tel}}"></p>
                    </td>
                </tr>

                <tr>
                    <th>郵遞區號：</th>
                    <td>
                        <p><input type="text" name="order_zipcode" value="{{$data->order_zipcode}}"></p>
                    </td>
                </tr>

                <tr>
                    <th>聯絡地址：</th>
                    <td>
                        <p><input class="lg" type="text" name="order_address" value="{{$data->order_address}}"></p>
                    </td>
                </tr>

                <tr>
                    <th>備註：</th>
                    <td>
                        <textarea name="order_comment" row="3">{{$data->order_comment}}</textarea>
                    </td>
                </tr>

                <tr>
                    <th>購買商品：</th>
                    <td>
                        @foreach($orderlist as $v)
                            <p>
                                <span>{{$v->name}}</span>
                                @if(!empty($v->spec_name))
                                    <span>規格:{{$v->spec_name}}</span>
                                @endif

                                <span>數量:{{$v->amount}}</span>
                                <span>單價:{{$v->price}}</span>
                                <span style="color:@if($v->status == '完成') #009966 @elseif($v->status == '取消') #FF0033 @endif">
                                狀態:({{$v->_status}})
                            </span>
                                <span>編輯者:{{$v->creator}}</span>
                            </p>
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th>發布時間：</th>
                    <td>
                        {{$data->created_at}}
                    </td>
                </tr>

                <tr>
                    <th>最後修改：</th>
                    <td>
                        {{$data->updated_at}}
                    </td>
                </tr>

                <tr>
                    <th>編輯者：</th>
                    <td>
                        {{$data->editor}}
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" onclick="wait()" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>

    <script>
        function wait() {
            layer.alert('請等候系統處理！', {icon: 6});
        }
    </script>

@endsection