@extends('layouts.backstage.admin')

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
            <h3>修改商品</h3>
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
        <form action="{{url('admin/commodity/'.$commodity->commodity_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th width="120">分類：</th>
                    <td>
                        <select name="cate_id">
                            @foreach($data as $v)
                                <option value="{{$v->cate_id}}"
                                        @if($v->cate_id == $commodity->cate_id) selected @endif>{{$v->_cate_name}}</option>
                            @endforeach
                            <option value="" @if($commodity->cate_id == Null) selected @endif>其他分類</option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <th>
                        <p><i class="require">*</i>主標題：</p>
                    </th>
                    <td>
                        <input type="text" class="lg" name="commodity_title" value="{{$commodity->commodity_title}}">
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            30個字元。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>副標題：</p>
                    </th>
                    <td>
                        <input type="text" class="md" name="commodity_subtitle"
                               value="{{$commodity->commodity_subtitle}}">
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            18個字元。
                        </span>
                    </td>
                </tr>


                <tr>
                    <th>
                        <p>大圖：</p>
                    </th>
                    <td>
                        <img src="/{{$commodity->commodity_image}}" alt="" id="comm_cover_img"
                             style="height: 200px; width: 350px;">
                        <input type="hidden" id="commodity_image" size="50" name="commodity_image"
                               value="{{$commodity->commodity_image}}">
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
                                        $('input[name = commodity_image]').val(data);
                                        $('#comm_cover_img').attr('src', '/' + data);
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
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            尺寸：340*340。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>
                        <p>其他圖片：</p>
                    </th>
                    <td>
                        <div id="thumb_image">
                            @foreach($commodityImg as $v)
                                <img src="/{{$v->image}}" alt="" id="art_thumb_img"
                                     style="height: 100px; width: 150px;">
                            @endforeach
                        </div>
                        <input type="hidden" id="image" size="50" name="image" value="{{$commodityImg_array}}">
                        <input id="file_upload1" name="file_upload1" type="file">
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
                                type="text/javascript"></script>
                        <script src="{{asset('org/uploadifive/jquery.uploadifive.js')}}"
                                type="text/javascript"></script>
                        <link rel="stylesheet" type="text/css" href="{{asset('org/uploadifive/uploadifive.css')}}">
                        <script type="text/javascript">
                            var x = [];
                            <?php $timestamp = time();?>
                            $(function () {
                                $('#file_upload1').uploadifive({
                                    'formData': {
                                        'timestamp': '<?php echo $timestamp;?>',
                                        '_token': '{{csrf_token()}}'
                                    },
                                    'uploadScript': '{{url('admin/upload')}}',
                                    'onUploadComplete': function (file, data) {
                                        x.push(data);
                                        $('#image').val(x);
                                        if (x.length > 1) {
                                            var data1 = "<img src='/" + data + "' alt='' id='art_thumb_img' style='height: 100px; width: 150px;'>";
                                            $('#thumb_image').append(data1);
                                        } else {
                                            $('#thumb_image').html('');
                                            var data1 = "<img src='/" + data + "' alt='' id='art_thumb_img' style='height: 100px; width: 150px;'>";
                                            $('#thumb_image').append(data1);
                                        }
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
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            尺寸：340*340。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>商品期間 :</th>
                    <td>
                        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css"/>
                        <!-- Include Date Range Picker -->
                        <script type="text/javascript"
                                src="{{asset('org/daterangepicker/daterangepicker.js')}}"></script>
                        <link rel="stylesheet" type="text/css"
                              href="{{asset('org/daterangepicker/daterangepicker.css')}}"/>
                        {{--<input type="text" id="dom-id" size="20" name="advertisement_period">--}}
                        <input type="text" name="commodity_period" class="md"
                               value="{{$commodity->commodity_start_time}} to {{$commodity->commodity_end_time}}">

                        <script type="text/javascript">
                            $(function () {
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
                    <th>規格：</th>
                    <td>
                        <div id="specBlock">
                            @foreach($spec_array as $key => $spec)
                                <div id="initSpecDiv{{$key}}">
                                    <input type="hidden" name="specId[]" value="{{$spec->id}}">
                                    <input type="text" name="spec[]" value="{{$spec->spec}}" style="margin-right: 10px"
                                           required>
                                    庫存量：
                                    <input type="number" min="0" name="stock[]" value="{{$spec->stock}}"
                                           style="height: 28px;" onchange="getTotalStock()">
                                    <a href="javascript:void(0)" onclick="removeSpecDiv('initSpecDiv{{$key}}')"
                                       style="margin-left: 10px">刪除</a>
                                </div>
                            @endforeach
                        </div>
                        <input type="button" class="back" value="新增" style="line-height:5px;"
                               onclick="createSpecDiv()">
                    </td>
                </tr>

                <tr>
                    <th>網路價：</th>
                    <td>
                        <input type="number" min="1" style="margin-right: 5px; height: 28px;"
                               name="commodity_originalprice"
                               value="{{$commodity->commodity_originalprice}}">
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            必須大於零。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>預購價：</th>
                    <td>
                        <input type="number" min="1" style="margin-right: 5px; height: 28px;" name="commodity_price"
                               value="{{$commodity->commodity_price}}">
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            必須大於零。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>總庫存：</th>
                    <td>
                        <input type="number" min="0" id="commodity_stock" name="commodity_stock"
                               style="margin-right: 5px; height: 28px;"
                               value="{{$commodity->commodity_stock}}"
                               @if(!$spec_array->isEmpty()) readonly="true" @endif>
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            若有規格，會自動等於規格的庫存量總和。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>安全庫存：</th>
                    <td>
                        <input type="number" min="0" name="commodity_safe_stock" style="height: 28px;"
                               value="{{$commodity->commodity_safe_stock}}">
                    </td>
                </tr>

                <tr>
                    <th>商品類型：</th>
                    <td>
                        <select name="commodity_type">
                            <option value="general" @if($commodity->commodity_type == 'general') selected @endif>一般商品
                            </option>
                            <option value="limited" @if($commodity->commodity_type == 'limited') selected @endif>限時商品
                            </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>狀態：</th>
                    <td>
                        <input type="radio" name="commodity_status" value="on"
                               @if($commodity->commodity_status == 'on') checked @endif>上架
                        <input type="radio" name="commodity_status" value="off"
                               @if($commodity->commodity_status == 'off') checked @endif>下架
                    </td>
                </tr>

                <tr>
                    <th>限購數量：</th>
                    <td>
                        <input type="number" min="0" style="height: 28px;" name="limit_purchase"
                               value="{{$commodity->limit_purchase}}">
                    </td>
                </tr>

                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="number" min="0" style="height: 28px;" name="commodity_ordering"
                               value="{{$commodity->commodity_ordering}}">
                        <span>
                            <i class="fa fa-exclamation-circle yellow"></i>
                            數字愈小，排序愈前。
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>商品描述：</th>
                    <td>
                        <textarea name="commodity_description"
                                  style="height: 200px;">{{$commodity->commodity_description}}</textarea>
                    </td>
                </tr>

                <tr>
                    <th>商品介绍：</th>
                    <td>
                        <script>
                            var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
                        </script>
                        {{--<textarea name="commodity_description"></textarea>--}}
                        <textarea id="commodity_introduce"
                                  name="commodity_introduce">{{$commodity->commodity_introduce}}</textarea>
                        <script src="{{asset('org/ckeditor/ckeditor.js')}}"></script>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace('commodity_introduce',
                                {
                                    height: 300,
                                    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                                    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                                    filebrowserBrowseUrl: route_prefix + '?type=Files',
                                    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
                                });
                        </script>
                        <p>
                            <i class="fa fa-exclamation-circle yellow"></i>提醒：<br>
                            1.要讓圖片能自動適應視窗的大小，請將寬度設為 100%，高度不用設。<br>
                            2.影片上傳限制 8 M。
                        </p>
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
    <script>
        var i = 0;

        function createSpecDiv() {
            var id = "specDiv" + i;
            var div = $('<div>', {
                id: id,
            });
            var specInput = $('<input />', {
                type: "text",
                name: "spec[]",
                required: true,
                style: "margin-right: 10px",
            });
            var stockInput = $('<input />', {
                type: "number",
                min: 0,
                height: "28px",
                name: "stock[]",
                value: 0,
                change: function () {
                    getTotalStock();
                }
            });
            var deleteLink = $('<a>', {
                text: "刪除",
                href: "javascript:void(0)",
                style: "margin-left: 10px",
                click: function () {
                    removeSpecDiv(id);
                }
            });

            div.append(specInput);
            div.append("庫存量：");
            div.append(stockInput);
            div.append(deleteLink);
            div.appendTo($("#specBlock"));
            $("#commodity_stock").attr("readonly", true);
            getTotalStock();
            i++;
        }

        function removeSpecDiv(id) {
            $("#" + id).remove();
            getTotalStock();
            if ($('[name="stock[]"]').length == 0) {
                $("#commodity_stock").attr("readonly", false);
            }
        }

        function getTotalStock() {
            var $totalStock = 0
            $('[name="stock[]"]').each(function (index) {
                $totalStock += parseInt($(this).val());
            })
            $("#commodity_stock").val($totalStock);
        }
    </script>
@endsection