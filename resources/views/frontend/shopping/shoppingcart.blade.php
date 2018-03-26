@extends('layouts.frontend.frontend')

@section('title', 'Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts')

@section('content')
<div class="new_arrivals_agile_w3ls_info">
    <div class="container">
        <h2>購物車({{count($cart)}})</h2>
        <div style="margin-top: 20px">
            <form action="{{url('order_info')}}" method="post">
                {{csrf_field()}}
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th> 產品</th> 
                            <th> 數量</th> 
                            <th> 價格</th>  
                            <th> 操作</th> 
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($cart as $v)
                        <tr id="{{$v->rowId}}">
                            <td>
                                <p> <strong> {{$v->name}} </strong> </p>
                            </td>
                            <td><input class="form-control input-sm" type ="text"  value = "{{$v->qty}}"  ></td>
                            <td> $ {{$v->price}}</td>
                            <td>
                                <a href="{{url('shopping/remove/'.$v->rowId)}}">删除</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> $ {{$total}}</td>
                        <td> </td>
                    </tr>
                </table>
                <div style="text-align: right">
                    <button type="button" class="btn btn-default" onclick="history.go(-1)" align="right">繼續選購</button>
                    {{--<a href="{{url('checkout/order_info')}}" class="btn btn-info" role="button">立即結帳</a>--}}
                    <input type="submit" class="btn btn-info" value="立即結帳1">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection