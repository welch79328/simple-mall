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
        <form action="{{url('admin/order/alone/'.$data->id.'/update')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th>名稱：</th>
                        <td>
                            <p>{{$data->name}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>數量：</th>
                        <td>
                            <p>{{$data->amount}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>單價：</th>
                        <td>
                            <p>{{$data->price}}</p>
                        </td>
                    </tr>

                    <tr>
                        <th>說明：</th>
                        <td>
                            <textarea name="description">{{$data->description}}</textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>狀態：</th>
                        <td>
                            <select name="status">
                                <option value="pending" @if($data->status == 'pending') selected @endif>待處理</option>
                                <option value="complete"@if($data->status == 'complete') selected @endif>完成</option>
                                <option value="refund"@if($data->status == 'refund') selected @endif>取消</option>
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

    </script>

@endsection