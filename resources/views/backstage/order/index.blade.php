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
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_title">
                <h3>訂單列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    {{--<a href="{{url('admin/order/create')}}"><i class="fa fa-plus"></i>添加訂單</a>--}}
                    <a href="{{url('admin/order')}}"><i class="fa fa-recycle"></i>全部訂單</a>
                    <a href="{{url('admin/commodity_show')}}"><i class="fa fa-recycle"></i>預購滿商品</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
        <div class="result_wrap">
            <div class="result_search">
                <label style="margin-right: 0">訂單狀態：</label>
                <select id="order_status" name="order_status" onchange="searchOrder(true)">
                    <option value="">全部</option>
                    <option value="pending" @if($search->order_status == "pending") selected @endif>待處理</option>
                    <option value="shipping" @if($search->order_status == "shipping") selected @endif>出貨中</option>
                    <option value="complete" @if($search->order_status == "complete") selected @endif>已送達</option>
                    <option value="refund" @if($search->order_status == "refund") selected @endif>退貨處理中</option>
                    <option value="cancel" @if($search->order_status == "cancel") selected @endif>已取消</option>
                </select>
                <label style="margin-right: 0; margin-left: 15px">是否付款：</label>
                <select id="is_pay" name="is_pay" onchange="searchOrder(true)">
                    <option value="">全部</option>
                    <option value="1" @if($search->is_pay == "1") selected @endif>已付款</option>
                    <option value="0" @if($search->is_pay == "0") selected @endif>尚未付款</option>
                </select>
            </div>
        </div>
        <div class="result_wrap">
            <div class="result_content" style="float: left; width: 78%">
                <table class="list_tab">
                    <tr>
                        <th>訂單編號</th>
                        <th>訂購者</th>
                        <th>訂單金額</th>
                        <th>訂單狀態</th>
                        <th>是否付款</th>
                        <th>發布時間</th>
                        <th>操作</th>
                    </tr>
                    @forelse($data as $v)
                        <tr>
                            <td>{{$v->order_number}}</td>
                            <td>
                                @if(!empty($v->member_name))
                                    {{$v->member_name}}
                                @else
                                    {{$v->member_account}}
                                @endif
                            </td>
                            <td>{{$v->order_total}}</td>
                            <td style="color: @if($v->order_status == 'complete') #009966 @elseif($v->order_status == 'cancel') #FF0033 @endif">
                                {{$v->_order_status}}
                            </td>
                            <td>{{$v->_is_pay}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                                <a href="{{url('admin/order/'.$v->order_id)}}">查看</a>
                                {{--<a href="{{url('admin/order/'.$v->order_id.'/edit ')}}">修改</a>--}}
                                {{--<a href="javascript:" onclick="delorder({{$v->order_id}})">删除</a>--}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center">查無資料！</td>
                        </tr>
                    @endforelse
                </table>

                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
            <div class="result_content" style="float: right; width: 20%;">
                <div class="result_title">
                    <h3>進階查詢</h3>
                </div>
                <div>
                    <label>訂單編號：</label>
                    <input id="order_number" name="order_number" type="text" value="{{$search->order_number}}">
                </div>
                <br>
                <div style="text-align: center">
                    <input class="back" type="button" value="重置" onclick="searchOrder(false)">
                    <input type="button" value="提交" onclick="searchOrder(true)">
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>

    <script>
        $(document).ready(function () {
            rederictPageLink();
        })

        function rederictPageLink() {
            var pagelinks = $('a[class="page-link"]');
            var order_number = $("#order_number").val();
            var order_status = $("#order_status").val();
            var is_pay = $("#is_pay").val();
            pagelinks.each(function (index) {
                if (order_number != "") {
                    this.href += ("&order_number=" + order_number);
                }
                if (order_status != "") {
                    this.href += ("&order_status=" + order_status);
                }
                if (is_pay != "") {
                    this.href += ("&is_pay=" + is_pay);
                }
            })
        }

        function searchOrder(conditoin) {
            if (conditoin === false) {
                $("#order_number").val("");
                $("#order_status").prop("selectedIndex", 0);
                $("#is_pay").prop("selectedIndex", 0);
            }
            var order_number = $("#order_number").val();
            var order_status = $("#order_status").val();
            var is_pay = $("#is_pay").val();
            $.get("{{Request::url()}}", {
                'order_number': order_number,
                'order_status': order_status,
                'is_pay': is_pay
            }, function (data) {
                $('body').html(data);
            });
        }

        //刪除訂單
        function delorder(order_id) {
            layer.confirm('您確定要刪除這篇訂單嗎？', {
                btn: ['確定', '取消'] //按钮
            }, function () {
                $.post("{{url('admin/order')}}/" + order_id, {
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