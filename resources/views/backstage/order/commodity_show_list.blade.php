@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 訂單管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果页快捷搜索框 开始-->
    {{--<div class="search_wrap">--}}

    {{--</div>--}}
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    {{--<form action="#" method="post">--}}
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_title">
            <h3>訂單列表</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/order')}}"><i class="fa fa-recycle"></i>全部訂單</a>
                <a href="{{url('admin/commodity_show')}}"><i class="fa fa-recycle"></i>預購滿商品</a>
                <a href="{{url('admin/commodity_show_list/'.$commodity_id.'/excel')}}"><i class="fa fa-recycle"></i>產生清單</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <form action="{{url('admin/commodity_show_list/edit')}}" method="post">
                {{csrf_field()}}
                <p>
                    <span>請勾選欲修改的項目</span>
                    <span style="margin-left: 30px">
                        狀態選擇：
                        <select name="status">
                            <option value="pending">待處理</option>
                            <option value="shipping">出貨中</option>
                            <option value="complete">已送達</option>
                            <option value="refund">退貨處理中</option>
                            <option value="cancel">取消</option>
                        </select>
                    </span>
                </p>
                @if(session("success"))
                    <p style="color: #0AA908">{{session("success")}}</p>
                @elseif(count($errors)>0)
                    <div class="mark">
                        @if(is_object($errors))
                            @foreach($errors->all() as $erroe)
                                <p style="color: #e71d1c">{{$erroe}}</p>
                            @endforeach
                        @else
                            <p style="color: #e71d1c">{{$errors}}</p>
                        @endif
                    </div>
                @endif
                <br>
                @foreach($data as $v)
                    <p>
                        <input type="checkbox" value="{{$v->id}}" name="list[]">
                        <a href="{{url('admin/order/'.$v->order_id)}}">{{$v->order_number}} - {{$v->member_name}}</a>
                        <span style="padding: 0px 15px 0px 15px;">商品名:{{$v->name}}</span>
                        @if(!empty($v->spec_name))
                            <span style="padding: 0px 15px 0px 15px;">規格:{{$v->spec_name}}</span>
                        @endif
                        <span style="padding:0px 15px 0px 15px;">數量:{{$v->amount}}</span>
                        <span style="padding: 0px 15px 0px 15px; color:@if($v->status == '完成') #009966 @elseif($v->status == '取消') #FF0033 @endif">
                            狀態:({{$v->_status}})
                        </span>
                        <span style="padding: 0px 15px 0px 15px;">
                            編輯者:
                            @if(!empty($v->creator))
                                {{$v->creator}}
                            @else
                                無
                            @endif
                        </span>
                    </p>
                    <br>
                @endforeach
                <input type="submit" style="line-height:5px;" value="提交">
                <input type="button" style="line-height:5px;" class="back" onclick="history.go(-1)" value="返回">
            </form>
        </div>
    </div>
    {{--</form>--}}
    <!--搜索结果页面 列表 结束-->
    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>

    <script>
        //刪除商品
        function delcommodity(commodity_id) {
            layer.confirm('您確定要刪除這項商品嗎？', {
                btn: ['確定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/commodity')}}/" + commodity_id, {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.status == 0) {
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    } else {
                        layer.msg(data.msg, {icon: 5});
                    }
                });
            }, function () {

            });
        }

    </script>

@endsection