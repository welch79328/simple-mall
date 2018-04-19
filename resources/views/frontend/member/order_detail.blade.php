@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 訂單詳細資料")

@section('css')
    <style>
        .order_detail_div {
            padding-left: 20px;
            padding-bottom: 20px;
            padding-right: 20px;
        }
    </style>

@section('content')
    <div class="new_arrivals_agile_w3ls_info ">
        <div class="container">
            <h2>訂單詳細資料</h2>
            <div class="table-responsive" style="margin-top: 20px">
                <!-- Table -->
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>訂單編號</th>
                        <td>{{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <th>下訂時間</th>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    <tr>
                        <th>商品明細</th>
                        <td>
                            <div class="table-responsive order_detail_div" style="margin-top: 20px">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>名稱</th>
                                        <th>規格</th>
                                        <th>數量</th>
                                        <th>單價</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_details as $detail)
                                        <tr>
                                            <td>{{$detail->name}}</td>
                                            <td>{{$detail->spec_name}}</td>
                                            <td>{{$detail->amount}}</td>
                                            <td>{{$detail->price}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>訂單總金額</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>
                        <th>訂單狀態</th>
                        <td style="color:@if($order->order_status == "complete")#009966 @elseif($order->order_status == "cancel")#FF0033 @else #555 @endif">{{$order->_order_status}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: right">
                <button type="button" class="btn btn-default"
                        onclick="(window.location.href = '{{url("member_order")}}')" align="right">
                    返回
                </button>
            </div>
        </div>
    </div>
@endsection