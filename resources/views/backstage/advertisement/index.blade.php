@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 廣告管理
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
                <h3>廣告列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/advertisement/create')}}"><i class="fa fa-plus"></i>添加廣告</a>
                    <a href="{{url('admin/advertisement')}}"><i class="fa fa-recycle"></i>全部廣告</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th>廣告名稱</th>
                        <th>開始時間</th>
                        <th>結束時間</th>
                        <th>點數</th>
                        <th>狀態</th>
                        <th>發布時間</th>
                        <th>編輯者</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td>{{$v->advertisement_name}}</td>
                        <td>{{$v->advertisement_start_time}}</td>
                        <td style="<?php $now = strtotime(date("Y/m/d h:i:s")); ?>@if(strtotime($v->advertisement_end_time) < $now) color: #CC0033; @endif">{{$v->advertisement_end_time}}</td>
                        <td style="@if($v->advertisement_point == 0) color: #CC0033; @endif">{{$v->advertisement_point}}</td>
                        <td style="@if($v->advertisement_status == 'on') color: #009966; @else color: #FF0033; @endif">{{$v->advertisement_status}}</td>
                        <td>{{$v->updated_at}}</td>
                        <td>{{$v->advertisement_creator}}</td>
                        <td>
                            <a href="{{url('admin/advertisement/'.$v->advertisement_id.'/edit ')}}">修改</a>
                            <a href="javascript:" onclick="delcommodity({{$v->advertisement_id}})">删除</a>
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
        function delcommodity(advertisement_id) {
            layer.confirm('您確定要刪除這篇廣告嗎？', {
                btn: ['確定','取消'] //按钮
            }, function(){
                $.post("{{url('admin/advertisement')}}/"+advertisement_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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