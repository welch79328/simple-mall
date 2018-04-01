@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall 訂單查詢')

@section('content')
    <div class="new_arrivals_agile_w3ls_info ">
        <div class="container">
            <h2>訂單查詢</h2>
            <div class="table-responsive" style="margin-top: 20px">
                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>編號</th>
                        <th>總金額</th>
                        <th>狀態</th>
                        <th>發布時間</th>
                        <th>操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$order->order_number}}</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td><a href="{{url('member_order_detail/'.$order->order_id)}}">查看</a></td>
                        </tr>
                    @empty
                        <tr style="text-align: center;">
                            <td colspan="5">無訂單資料！</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="page_list" style="text-align: center">
                {{$orders->links()}}
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection