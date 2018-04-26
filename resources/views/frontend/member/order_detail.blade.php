@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 訂單詳細資料")

@section('css')
    <style>
        .order_detail_div {
            margin-top: 20px;
            padding-left: 20px;
            padding-bottom: 20px;
            padding-right: 20px;
        }

        .detail_img {
            width: 300px;
            height: 300px;
        }

        @media (max-width: 480px) {
            .order_th {
                width: 100px;
            }

            .detail_img {
                width: 70px;
                height: 70px;
            }

            .detail_name {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .detail_price {
                color: #d8a91e;
                float: left;
            }

            .detail_amount {
                float: right;
            }

            .detail_spec {
                color: #AAAAAA;
            }
        }
    </style>

@section('content')
    <div class="new_arrivals_agile_w3ls_info ">
        <div class="container">
            <h2>訂單詳細資料</h2>
            <div class="" style="margin-top: 20px">
                <!-- Table -->
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th class="order_th">訂單編號</th>
                        <td>{{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <th>收件人</th>
                        <td>{{$order->order_name}}</td>
                    </tr>
                    <tr>
                        <th>信箱</th>
                        <td>{{$order->order_mail}}</td>
                    </tr>
                    <tr>
                        <th>手機</th>
                        <td>{{$order->order_phone}}</td>
                    </tr>
                    <tr>
                        <th>市話</th>
                        <td>{{$order->order_tel}}</td>
                    </tr>
                    <tr>
                        <th>郵遞區號</th>
                        <td>{{$order->order_zipcode}}</td>
                    </tr>
                    <tr>
                        <th>地址</th>
                        <td>{{$order->order_address}}</td>
                    </tr>
                    <tr>
                        <th>下訂時間</th>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    <tr class="hidden-xs">
                        <th>商品明細</th>
                        <td>
                            <div class="table-responsive order_detail_div">
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
                                    @foreach( $order_details as $detail)
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
                    @foreach($order_details as $detail)
                        <tr class="visible-xs">
                            <td style="border-right-style: hidden;">
                                <img class="detail_img" src="{{url(''.$detail->img)}}"
                                     onError="this.src='{{$errorImgUrl}}'">
                            </td>
                            <td style="max-width: 100px;">
                                <p class="detail_name">{{$detail->name}}</p>
                                <p class="detail_price">${{$detail->price}}</p>
                                <p class="detail_amount">x{{$detail->amount}}</p>
                                <p class="clearFix"></p>
                                <p class="detail_spec">{{$detail->spec_name}}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>總金額</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>
                        <th>訂單狀態</th>
                        <td style="color:@if($order->order_status == "complete")#009966 @elseif($order->order_status == "cancel")#FF0033 @else #555 @endif">{{$order->_order_status}}</td>
                    </tr>
                    @if($order->order_status == "complete")
                        <tr>
                            <th>送達時間</th>
                            <td>{{$order->delivery_time}}</td>
                        </tr>
                    @endif
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