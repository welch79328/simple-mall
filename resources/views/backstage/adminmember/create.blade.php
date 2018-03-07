@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 會員管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>添加會員</h3>
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
                {{--<a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加會員</a>--}}
                {{--<a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部會員</a>--}}
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('home/member')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th>會員帳號：</th>
                        <td>
                            <input type="text" class="md" name="user_account">
                        </td>
                    </tr>

                    <tr>
                        <th>密碼：</th>
                        <td>
                            <input type="text" class="md" name="user_password">
                            <span><i class="fa fa-exclamation-circle yellow"></i>密碼長度必須為6至8位</span>
                        </td>
                    </tr>

                    <tr>
                        <th>確認密碼：</th>
                        <td>
                            <input type="text" class="md" name="user_password_check">
                        </td>
                    </tr>

                    <tr>
                        <th>電子郵件：</th>
                        <td>
                            <input type="text" class="md" name="user_mail">
                        </td>
                    </tr>

                    <tr>
                        <th>確認電子郵件：</th>
                        <td>
                            <input type="text" class="md" name="user_mail_check">
                        </td>
                    </tr>

                    <tr>
                        <th>生日：</th>
                        <td>
                            <select name="user_year">
                                <?php
                                    for ($i=2018;$i>=1900;$i--){
                                ?>
                                    <option value="{{$i}}">{{$i}}</option>
                                <?php } ?>
                            </select>
                            <span>年</span>
                            <select name="user_month">
                                <?php
                                    for ($i=1;$i<=12;$i++){
                                ?>
                                    <option value="{{$i}}">{{$i}}</option>
                                <?php } ?>
                            </select>
                            <span>月</span>
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