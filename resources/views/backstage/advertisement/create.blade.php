@extends('layouts.backstage.admin')

@section('js')

@endsection

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 廣告管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加廣告</h3>
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
                <a href="{{url('admin/advertisement/create')}}"><i class="fa fa-plus"></i>添加廣告</a>
                <a href="{{url('admin/advertisement')}}"><i class="fa fa-recycle"></i>全部廣告</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/advertisement')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th>廣告名稱：</th>
                    <td>
                        <input type="text" class="md" name="advertisement_name">
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>廣告圖：</p>
                        <p>(建議尺寸：1680*700)</p>
                    </th>
                    <td>
                        <img src="" alt="" id="advertisement_cover_img" style="max-height: 200px; max-width: 350px;">
                        <input type="hidden" id="advertisement_image" size="50" name="advertisement_image">
                        <input id="file_upload" name="file_upload" type="file">
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
                                type="text/javascript"></script>
                        <script src="{{asset('org/uploadifive/jquery.uploadifive.js')}}"
                                type="text/javascript"></script>
                        <link rel="stylesheet" type="text/css" href="{{asset('org/uploadifive/uploadifive.css')}}">
                        <script type="text/javascript">
                            <?php $timestamp = time();?>
                            $(function () {
                                $('#file_upload').uploadifive({
                                    'formData': {
                                        'timestamp': '<?php echo $timestamp;?>',
                                        '_token': '{{csrf_token()}}'
                                    },
                                    'uploadScript': '{{url('admin/upload')}}',
                                    'onUploadComplete': function (file, data) {
//                                            data = data.slice(0,29);
                                        $('input[name = advertisement_image]').val(data);
                                        $('#advertisement_cover_img').attr('src', '/' + data);
                                    }
                                });
                            });
                        </script>
                        <style>
                            .uploadifive {
                                display: inline-block;
                            }

                            .uploadifive-button {
                                border: none;
                                border-radius: 5px;
                                margin-top: 8px;
                            }

                            table.add_tab tr td span.uploadifive-button-text {
                                color: #FFFFFF;
                                margin: 0;
                            }
                        </style>
                    </td>
                </tr>

                <tr>
                    <th>廣告導連頁：</th>
                    <td>
                        <input type="text" class="lg" name="advertisement_redirect">
                    </td>
                </tr>

                <tr>
                    <th>廣告期間 :</th>
                    <td>
                        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css"/>
                        <!-- Include Date Range Picker -->
                        <script type="text/javascript"
                                src="{{asset('org/daterangepicker/daterangepicker.js')}}"></script>
                        <link rel="stylesheet" type="text/css"
                              href="{{asset('org/daterangepicker/daterangepicker.css')}}"/>
                        {{--<input type="text" id="dom-id" size="20" name="advertisement_period">--}}
                        <input type="text" name="advertisement_period" value="">

                        <script type="text/javascript">
                            $(function () {
                                $('input[name="advertisement_period"]').daterangepicker({
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
                    <th>廣告排序：</th>
                    <td>
                        <input type="number" min="1" max="10" style="height: 28px;" name="advertisement_ordering">
                    </td>
                </tr>

                <tr>
                    <th>廣告點數：</th>
                    <td>
                        <input type="number" min="1" style="height: 28px;" name="advertisement_point">
                    </td>
                </tr>

                <tr>
                    <th>狀態：</th>
                    <td>
                        <input type="radio" name="advertisement_status" value="on" checked>上架
                        <input type="radio" name="advertisement_status" value="off">下架
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" style="line-height:5px;" value="提交">
                        <input type="button" class="back" style="line-height:5px;" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection