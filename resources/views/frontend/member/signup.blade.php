@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 註冊")

@section('content')
    <div class="new_arrivals_agile_w3ls_info" style="font-family: Microsoft JhengHei;">
        <div class="container">
            <form class="form-horizontal" action="{{url('member_store')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-offset-2 col-md-8">
                    <h2 style="margin-bottom: 20px">註冊</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="member_mail"
                               placeholder="帳號 (電子信箱)" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="member_password"
                               placeholder="密碼(6至8位、第一位為英文、只接受英文或數字)"
                               pattern="[a-zA-Z][a-zA-Z0-9]{5,7}"
                               title="密碼限制(6至8位、第一位必須為英文字母、只接受英文字母或數字)"
                               required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_check" name="member_password_check"
                               placeholder="密碼確認" pattern="[a-zA-Z][a-zA-Z0-9]{5,7}" required>
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    @if(count($errors)>0)
                        <div>
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p style="color: red; text-align: center;">{{$error}}</p>
                                @endforeach
                            @else
                                <p style="color: red; text-align: center;">{{$errors["msg"]}}</p>
                            @endif
                        </div>
                    @endif
                    <div style="text-align: right">
                        <button type="submit" class="btn btn-primary">註冊</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
