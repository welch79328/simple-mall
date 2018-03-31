@extends('layouts.backstage.admin')

{{--@section('js')--}}
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>--}}
{{--@endsection--}}

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 商品管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加商品</h3>
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
                <a href="{{url('admin/commodity/create')}}"><i class="fa fa-plus"></i>添加商品</a>
                <a href="{{url('admin/commodity')}}"><i class="fa fa-recycle"></i>全部商品</a>
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
                        <th width="120">分類：</th>
                        <td>
                            <select name="cate_id">
                                @foreach($data as $v)
                                <option value="{{$v->cate_id}}">{{$v->_cate_name}}</option>
                                @endforeach
                                <option value="">其他分類</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>標題：</th>
                        <td>
                            <input type="text" class="md" name="commodity_title">
                        </td>
                    </tr>

                    <tr>
                        <th>副標題：</th>
                        <td>
                            <input type="text" class="md" name="commodity_subtitle">
                        </td>
                    </tr>

                    <tr>
                        <th>大圖：</th>
                        <td>
                            <img src="" alt="" id="comm_cover_img" style="max-height: 200px; max-width: 350px;">
                            <input type="hidden" id="commodity_image" size="50" name="commodity_image">
                            <input id="file_upload" name="file_upload" type="file">
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                            <script src="{{asset('org/uploadifive/jquery.uploadifive.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('org/uploadifive/uploadifive.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadifive({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'uploadScript' : '{{url('admin/upload')}}',
                                        'onUploadComplete' : function(file, data) {
//                                            data = data.slice(0,29);
                                            $('input[name = commodity_image]').val(data);
                                            $('#comm_cover_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadifive{display:inline-block;}
                                .uploadifive-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadifive-button-text{color: #FFFFFF; margin: 0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th>縮略圖：</th>
                        <td>
                            <div id="thumb_image">
                                <img src="" alt="" id="art_thumb_img" style="height: 100px; width: 150px;">
                            </div>
                            <input type="hidden" id="image" size="50" name="image">
                            <input id="file_upload1" name="file_upload1" type="file">
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                            <script src="{{asset('org/uploadifive/jquery.uploadifive.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('org/uploadifive/uploadifive.css')}}">
                            <script type="text/javascript">
                                var x = [];
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload1').uploadifive({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'uploadScript' : '{{url('admin/upload')}}',
                                        'onUploadComplete' : function(file, data) {
                                            x.push(data);
                                            $('#image').val(x);
                                            if(x.length > 1){
                                                var data1 = "<img src='/"+data+"' alt='' id='art_thumb_img' style='height: 100px; width: 150px;'>";
                                                $('#thumb_image').append(data1);
                                            }else{
                                                $('#art_thumb_img').attr('src','/'+data);
                                            }

                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadifive{display:inline-block;}
                                .uploadifive-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadifive-button-text{color: #FFFFFF; margin: 0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th>商品期間 : </th>
                        <td>
                            <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
                            <!-- Include Date Range Picker -->
                            <script type="text/javascript" src="{{asset('org/daterangepicker/daterangepicker.js')}}"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('org/daterangepicker/daterangepicker.css')}}" />
                            {{--<input type="text" id="dom-id" size="20" name="advertisement_period">--}}
                            <input type="text" name="commodity_period" value="">

                            <script type="text/javascript">
                                $(function() {
                                    $('input[name="commodity_period"]').daterangepicker({
                                        timePicker: true,
                                        timePicker24Hour: true,
                                        timePickerIncrement: 30,
                                        locale: {
                                            format: 'YYYY-MM-DD HH:mm:ss'
                                        }
                                    });
                                });
                            </script>

                        </td>
                    </tr>

                    <tr>
                        <th>定價：</th>
                        <td>
                            <input type="number" min="1" style="height: 28px;" name="commodity_price">
                        </td>
                    </tr>

                    <tr>
                        <th>庫存：</th>
                        <td>
                            <input type="number" min="0" style="height: 28px;" name="commodity_stock">
                        </td>
                    </tr>

                    <tr>
                        <th>安全庫存：</th>
                        <td>
                            <input type="number" min="0" style="height: 28px;" name="commodity_safe_stock">
                        </td>
                    </tr>

                    <tr>
                        <th>商品類型：</th>
                        <td>
                            <select name="commodity_type">
                                <option value="general">一般商品</option>
                                <option value="limited">限時商品</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>狀態：</th>
                        <td>
                            <input type="radio" name="commodity_status" value="on" checked >上架
                            <input type="radio" name="commodity_status" value="off" >下架
                        </td>
                    </tr>

                    <tr>
                        <th>商品描述：</th>
                        <td>
                            <textarea name="commodity_description"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>商品介绍：</th>
                        <td>
                            <script>
                                var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
                            </script>
                            {{--<textarea name="commodity_description"></textarea>--}}
                            <textarea name="commodity_introduce"></textarea>
                            <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
                            <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
                            <script>
                                $('textarea[name=commodity_introduce]').ckeditor({
                                    height: 300,
                                    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                                    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                                    filebrowserBrowseUrl: route_prefix + '?type=Files',
                                    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
                                });
                            </script>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" style="line-height:5px;" value="提交">
                            <input type="button" style="line-height:5px;" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection