@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加文章</h3>
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
                <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>
                <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>
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
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>標題：</th>
                        <td>
                            <input type="text" class="lg" name="commodity_title">
                        </td>
                    </tr>

                    <tr>
                        <th>副標題：</th>
                        <td>
                            <input type="text" class="sm" name="commodity_tag">
                        </td>
                    </tr>


                    <tr>
                        <th>大圖：</th>
                        <td>
                            <input type="text" id="commodity_img" size="50" name="commodity_img">
                            <input id="file_upload_1" name="file_upload_1" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload_1').uploadify({
                                        'buttonText'    : '圖片上傳',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{csrf_token()}}"
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader'  : "{{url('admin/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            $('#commodity_img').val(data);
                                            $('#comm_cover_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFFFFF; margin: 0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <img src="" alt="" id="comm_cover_img" style="max-height: 100px; max-width: 350px;">
                        </td>
                    </tr>

                    <tr>
                        <th>縮略圖：</th>
                        <td>
                            <input type="text" id="image_url" size="50" name="image_url">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                var x = [];
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText'    : '圖片上傳',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : "{{csrf_token()}}"
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader'  : "{{url('admin/upload')}}",
                                        'onUploadSuccess' : function(file, data, response) {
                                            x.push(data);
                                            $('#image_url').val(x);
                                            $('#art_thumb_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFFFFF; margin: 0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <img src="" alt="" id="art_thumb_img" style="max-height: 100px; max-width: 350px;">
                        </td>
                    </tr>

                    <tr>
                        <th>定價：</th>
                        <td>
                            <input type="text" class="lg" name="commodity_price">
                        </td>
                    </tr>

                    <tr>
                        <th>狀態：</th>
                        <td>
                            <input type="radio" name="commodity_status" value="上架" checked >上架
                            <input type="radio" name="commodity_status" value="下架" >下架
                        </td>
                    </tr>

                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="commodity_description"></textarea>
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

@endsection