<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('css/backstage/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('css/backstage/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>FIELD SYSTEM</h1>
		<h2>歡迎使用大場域管理平台</h2>
		<div class="form">
			@if(session('msg'))
			<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="member_account" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="member_password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					{{--<li>--}}
						{{--<input type="text" class="code" name="code"/>--}}
						{{--<span><i class="fa fa-check-square-o"></i></span>--}}
						{{--<img src="{{url('/admin/code')}}" alt="" onclick="this.src='{{url('/admin/code')}}?'+Math.random()">--}}
					{{--</li>--}}
					<li>
						<input type="submit" value="立即登入"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首頁</a> &copy; 2016 Powered by <a href="http://www.houdunwang.com" target="_blank">http://www.houdunwang.com</a></p>
		</div>
	</div>
</body>
</html>