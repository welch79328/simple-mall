@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 折扣管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加折扣</h3>
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
                <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加折扣</a>
                <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部折扣</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/commodity')}}" method="post">
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
                        <th width="120">折扣種類：</th>
                        <td>
                            <select name="discount_type"  onchange="changeType(this)">
                                <option value="single">單一商品折扣</option>
                                <option value="sort">各類商品折扣</option>
                                <option value="single_combination">單一商品加購價</option>
                                <option value="sort_combination">各類商品加購價</option>
                                <option value="satisfy">滿A送B</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th width="120">分類：</th>
                        <td>
                            <select name="cate_id" id="category" onchange="changeCate(this)">
                                @foreach($data as $v)
                                <option value="{{$v->cate_id}}" class="{{$v->cate_name}}">{{$v->_cate_name}}</option>
                                @endforeach
                            </select>
                            <a onclick="addComm('category')">加入</a>
                        </td>
                    </tr>

                    <tr>
                        <th width="120">商品：</th>
                        <td>
                            <select name="cate_id" id="commodity">
                                @foreach($commodity as $v)
                                    <option value="{{$v->commodity_id}}" class="{{$v->commodity_title}}">{{$v->commodity_title}}</option>
                                @endforeach
                            </select>
                            <a onclick="addComm('commodity')">加入</a>
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
        function changeType(obj){
            var city_order = $(obj).val();
                $('#test').append('<input type="text" name="item_title[]" value="現烘[肯亞]列里木喀合作社珍珠原豆(一磅)">');
        }

        function addComm(type){
            var commodity = $('#'+ type).val();
            var commodity_title = $('#'+ type).find("option:selected").attr("class");
            $('#test').append('<div id="'+ type +'_'+ commodity +'"><p>'+ type +':'+ commodity_title +'</p><input type="hidden" name="item_title[]" value="'+ commodity +'"><a class="del_a" id="del_'+ type +'_'+ commodity +'">刪除</a></div>');
        }


        $('#test').on('click', 'a.del_a', function() {
            var del_id_arr = $(this).attr('id');
            var del_id = del_id_arr.split('_');
            console.log(del_id[1]);
            $('#' + del_id[1] + '_' + del_id[2]).fadeOut(500,function(){
                $(this).remove();
            });
        });

        function changeCate(obj){
            var cate_order = $(obj).val();

            $.post("{{url('admin/discount/commodity')}}",{'_token':'{{csrf_token()}}','cate_id':cate_order},function (data) {
                $('#commodity').empty();
                for (var i = 0; i < data.length; i++) {
                    $('#commodity').append('<option value="'+ data[i].commodity_id +'" class="'+ data[i].commodity_title +'">' + data[i].commodity_title + '</option>')
                }
            });
        }

    </script>

@endsection