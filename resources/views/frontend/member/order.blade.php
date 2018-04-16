@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 訂單查詢")

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
                        <th class="hidden-xs">總金額</th>
                        <th>狀態</th>
                        <th class="hidden-xs">下訂時間</th>
                        <th>操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$order->order_number}}</td>
                            <td class="hidden-xs">{{$order->order_total}}</td>
                            <td style="color:@if($order->order_status == '完成')#009966 @elseif($order->order_status == '取消')#FF0033 @else #555 @endif">
                                {{$order->order_status}}
                            </td>
                            <td class="hidden-xs">{{$order->created_at}}</td>
                            <td>
                                <a href="{{url('member_order_detail/'.$order->order_id)}}">查看</a>
                                @if($order->order_status == "待處理")
                                    <a href="javascript: void(0)" onclick="showCancelOrderModal({{$order->order_id}})"
                                       style="margin-left: 10px">取消</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr style="text-align: center;">
                            <td colspan="5">無訂單資料！</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div style="text-align: center">
                {{$orders->links()}}
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="cancelOrderModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">提示</h4>
                </div>
                <div class="modal-body">
                    <p>您確定要取消此筆訂單嗎？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                    <button id="cancelOrderButton" type="button" class="btn btn-primary"
                            onclick="ajaxCancelOrder(this.value)">
                        確定
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>

        function showCancelOrderModal(order_id) {
            $("#cancelOrderButton").val(order_id);
            $("#cancelOrderModal").modal("show");
        }

        function ajaxCancelOrder(order_id) {
            $.ajax({
                type: "POST",
                url: "{{url('member_order_cancel/')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    order_id: order_id
                },
                dataType: "json",
                success: function (data) {
                    $("#cancelOrderButton").val("");
                    if (!data.result) {
                        showModal("failModal", "提示", data.msg);
                    }
                    window.location.href = "{{url('member_order')}}";
                }
            });
        }
    </script>
@endsection