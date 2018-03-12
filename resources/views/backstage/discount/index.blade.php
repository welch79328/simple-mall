@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 商品管理
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
                <h3>商品列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/commodity/create')}}"><i class="fa fa-plus"></i>添加商品</a>
                    <a href="{{url('admin/commodity')}}"><i class="fa fa-recycle"></i>全部商品</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">分類</th>
                        <th>标题</th>
                        <th>副标题</th>
                        <th>定價</th>
                        <th>內容</th>
                        <th>狀態</th>
                        <th>点击</th>
                        <th>發布时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->cate_name}}</td>
                        <td>
                            <a href="#">{{$v->commodity_title}}</a>
                        </td>
                        <td>
                            <a href="#">{{$v->commodity_tag}}</a>
                        </td>
                        <td>{{$v->commodity_price}}</td>
                        <td>{{$v->commodity_description}}</td>
                        <td>{{$v->commodity_status}}</td>
                        <td>{{$v->commodity_view}}</td>
                        <td>{{date('Y-m-d',$v->commodity_time)}}</td>
                        <td>
                            <a href="{{url('admin/commodity/'.$v->commodity_id.'/edit ')}}">修改</a>
                            <a href="javascript:" onclick="delcommodity({{$v->commodity_id}})">删除</a>
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
        //刪除商品
        function delcommodity(commodity_id) {
            layer.confirm('您確定要刪除這篇商品嗎？', {
                btn: ['確定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/commodity')}}/"+commodity_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        layer.msg(data.msg, {icon: 5});
                    }
                });
            }, function(){

            });
        }

    </script>

@endsection