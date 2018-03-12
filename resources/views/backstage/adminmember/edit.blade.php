@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 帳號管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>修改帳號</h3>
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
                {{--<a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加帳號</a>--}}
                {{--<a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部帳號</a>--}}
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/member')}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th>帳號名稱：</th>
                        <td>
                            <input type="text" class="md" name="member_name" value="{{$member->member_name}}">
                        </td>
                    </tr>

                    <tr>
                        <th>帳號：</th>
                        <td>
                            <input type="text" class="md" name="member_account" value="{{$member->member_account}}">
                        </td>
                    </tr>

                    <tr>
                        <th>密碼：</th>
                        <td>
                            <input type="text" class="md" name="member_password" value="{{$member->member_password}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>密碼長度必須為6至8位</span>
                        </td>
                    </tr>

                    {{--<tr>--}}
                        {{--<th>確認密碼：</th>--}}
                        {{--<td>--}}
                            {{--<input type="text" class="md" name="member_password_check">--}}
                        {{--</td>--}}
                    {{--</tr>--}}

                    <tr>
                        <th>電子郵件：</th>
                        <td>
                            <input type="text" class="md" name="member_mail" value="{{$member->member_mail}}">
                        </td>
                    </tr>

                    <tr>
                        <th>手機：</th>
                        <td>
                            <input type="text" class="md" name="member_phone" value="{{$member->member_phone}}">
                        </td>
                    </tr>

                    <tr>
                        <th>室內電話：</th>
                        <td>
                            <input type="text" class="md" name="member_tel" value="{{$member->member_tel}}">
                        </td>
                    </tr>

                    <tr>
                        <th>地址：</th>
                        <td>
                            <input type="text" class="md" name="member_location" value="{{$member->member_location}}">
                        </td>
                    </tr>

                    <tr>
                        <th>帳號等級</th>
                        <td>
                            <select name="member_level">
                                <option value="member" @if($member->member_level == 'member') selected @endif>一般帳號</option>
                                <option value="manage" @if($member->member_level == 'manage') selected @endif>管理帳號</option>
                                <option value="admin" @if($member->member_level == 'admin') selected @endif>管理者</option>
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