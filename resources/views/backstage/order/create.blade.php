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
            <h3>添加訂單</h3>
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
                <a href="{{url('admin/order/create')}}"><i class="fa fa-plus"></i>添加訂單</a>
                <a href="{{url('admin/order')}}"><i class="fa fa-recycle"></i>全部訂單</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/order')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th>標題：</th>
                        <td>
                            <input type="text" class="lg" name="commodity_title">
                        </td>
                    </tr>

                    <tr>
                        <th>目標商品：</th>
                        <td id="test">

                        </td>
                    </tr>

                    <tr>
                        <th>數值：</th>
                        <td>
                            <input type="text" class="lg" name="commodity_price">
                        </td>
                    </tr>

                    <tr>
                        <th width="120">單位：</th>
                        <td>
                            <select name="discount_unit">
                                <option value="$">$</option>
                                <option value="%">%</option>
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