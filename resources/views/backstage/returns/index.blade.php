@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 退貨管理
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
                <h3>退貨單列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    {{--<a href="{{url('admin/order/create')}}"><i class="fa fa-plus"></i>添加退貨單</a>--}}
                    <a href="{{url('admin/returns')}}"><i class="fa fa-recycle"></i>全部退貨單</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th>訂單編號</th>
                        <th>退貨狀態</th>
                        <th>編輯者</th>
                        <th>發布時間</th>
                        <th>修改時間</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td><a href="{{url('admin/order/'.$v->order_id)}}">{{$v->order_number}}</a></td>
                            <td style="color: @if($v->returns_status == 'complete') #009966 @endif">{{$v->_returns_status}}</td>
                            <td>{{$v->editor}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->updated_at}}</td>
                            <td>
                                <a href="{{url('admin/returns_edit/'.$v->returns_id)}}">查看</a>
                                @if($v->returns_status != 'complete')
                                    <a href="{{url('admin/returns_complete/'.$v->returns_id)}}">已解決</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="page_list">
                    {{$data->links()}}
                </div>
            </div>
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
        //刪除退貨單
        function delorder(order_id) {
            layer.confirm('您確定要刪除這篇退貨單嗎？', {
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