@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall 訂單詳細資料')

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
                        <th>商品明細</th>
                        <td>
                            <div class="table-responsive order_detail_div" style="margin-top: 20px">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>名稱</th>
                                        <th>數量</th>
                                        <th>單價</th>
                                        <th>狀態</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_details as $detail)
                                        <tr>
                                            <td>{{$detail->name}}</td>
                                            <td>{{$detail->amount}}</td>
                                            <td>{{$detail->price}}</td>
                                            @if($detail->status == '完成')
                                                <td style="color: #009966">{{$detail->status}}</td>
                                            @elseif($detail->status == '取消')
                                                <td style="color: #FF0033">{{$detail->status}}</td>
                                            @else
                                                <td>{{$detail->status}}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{--@foreach($order_details as $detail)--}}
                            {{--<p>--}}
                            {{--<span><a href="{{url('admin/order/alone/'.$detail->id)}}"></a></span>--}}
                            {{--<span>數量:{{$detail->amount}}</span>--}}
                            {{--<span>單價:{{$detail->price}}</span>--}}
                            {{--@if($detail->status == '完成')--}}
                            {{--<span style="color: #009966">狀態:({{$detail->status}})</span>--}}
                            {{--@elseif($detail->status == '取消')--}}
                            {{--<span style="color: #FF0033">狀態:({{$detail->status}})</span>--}}
                            {{--@else--}}
                            {{--<span>狀態:({{$detail->status}})</span>--}}
                            {{--@endif--}}
                            {{--</p>--}}
                            {{--@endforeach--}}
                        </td>
                    </tr>
                    <tr>
                        <th>訂單金額</th>
                        <td>{{$order->order_total}}</td>
                    </tr>
                    <tr>
                        <th>訂單狀態</th>
                        <td>{{$order->order_status}}</td>
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