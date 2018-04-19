@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 登錄")

@section('content')
    <div class="new_arrivals_agile_w3ls_info" style="font-family: Microsoft JhengHei;">
        <div class="container">
            <form class="form-horizontal" action="{{url('member/login')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="path" value="{{$redirectPath}}">
                <div class="col-md-offset-2 col-md-8">
                    <h2 style="margin-bottom: 20px">登錄</h2>

                    <div class="form-group">
                        <input type="text" class="form-control" id="member_account" name="member_account"
                               placeholder="請輸入帳號 (電子信箱)" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="member_password" name="member_password"
                               placeholder="請輸入密碼" required>
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    @if(session('msg'))
                        <p style="color: red; text-align: center;">{{session('msg')}}</p>
                    @endif
                    <div style="text-align: right">
                        <a class="agile-icon btn btn-default" href="{{url('member_signup')}}"></input>尚未擁有帳號，立即註冊</a>
                        <button type="submit" class="btn btn-primary">登錄</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection