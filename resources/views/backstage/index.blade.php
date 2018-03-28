@extends('layouts.backstage.admin')

@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">FIELD SYSTEM</div>
			<ul>
				{{--<li><a href="{{url('/')}}" target="_blank" class="active">{{trans('Backstage.nav.Home')}}</a></li>--}}
				<li><a href="{{url('admin/info')}}" target="main">管理頁</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>{{session('admin_member.member_name')}}</li><li> Welcome</li>
				<li><a href="{{url('admin/logout')}}">Logout</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>管理</h3>
				<ul class="sub_menu">
					@if(session('member.member_level') == 'admin')
					<li><a href="{{url('admin/member')}}" target="main"><i class="fa fa-fw fa-square"></i>帳號管理</a></li>
					@endif
					<li><a href="{{url('member')}}" target="main"><i class="fa fa-fw fa-square"></i>會員管理</a></li>
					<li><a href="{{url('admin/commodity')}}" target="main"><i class="fa fa-fw fa-square"></i>商品管理</a></li>
					{{--<li><a href="{{url('admin/discount')}}" target="main"><i class="fa fa-fw fa-square"></i>折價管理</a></li>--}}
					<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-square"></i>分類管理</a></li>
					<li><a href="{{url('admin/advertisement')}}" target="main"><i class="fa fa-fw fa-square"></i>廣告管理</a></li>
					<li><a href="{{url('admin/order')}}" target="main"><i class="fa fa-fw fa-square"></i>訂單管理</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>報表</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/report')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>4</a></li>
				</ul>
			</li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统設置</h3>
                <ul class="sub_menu" style="display: block;">
					{{--<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>網站配置</a></li>--}}
					<li><a href="{{url('admin/layout')}}" target="main"><i class="fa fa-fw fa-cogs"></i>網站配置</a></li>
					{{--<li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定義登入紐</a></li>--}}

                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具導覽</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>圖標调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手冊</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
	</div>
	<!--底部 结束-->
@endsection