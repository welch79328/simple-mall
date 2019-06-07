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
                            <td style="color:@if($order->order_status == "complete")#009966 @elseif($order->order_status == 'cancel')#FF0033 @else #555 @endif">
                                {{$order->_order_status}}
                            </td>
                            <td class="hidden-xs">{{$order->created_at}}</td>
                            <td>
                                <a href="{{url('member_order_detail/'.$order->order_id)}}"
                                   style="margin-right: 10px">明細</a>
                                @if($order->order_status == "pending")
                                    <a href="javascript: void(0)" onclick="showCancelOrderModal({{$order->order_id}})">取消</a>
                                @elseif($order->order_status == "complete")
                                    <a href="javascript: void(0)"
                                       onclick="showReturnModal({{$order->order_id}}, {{$order->order_number}})">退貨</a>
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
                            onclick="cancelOrder(this.value)">
                        確定
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="returnModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 id="returnTitle" class="modal-title">退貨單</h4>
                </div>
                <form id="returnsForm" action="{{url('member_order_return')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" id="returns_order_id" name="order_id">
                    <div class="modal-body">
                        <div class="form-inline">
                            <label>訂單編號：</label>
                            <label id="orderNumber"></label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="returns_reason">退貨原因:</label>
                            <select class="form-control" id="returns_reason" name="returns_reason"
                                    onchange="toggleRefundDiv(this.value)">
                                <option value="1">不滿意款式</option>
                                <option value="2">與網頁呈現有落差</option>
                                <option value="3">改變心意</option>
                                <option value="4">收到有瑕疵/損壞的商品(更換商品)</option>
                            </select>
                        </div>
                        <div id="refundDiv">
                            <label>退款資料：</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="銀行代碼" id="bank_code"
                                       name="bank_code"
                                       style="width: 50%; float: left" required>
                                <input type="text" class="form-control" placeholder="帳戶名稱" id="returns_account_name"
                                       name="returns_account_name"
                                       style="width: 50%; float: left" required>
                                <div class="clearfix"></div>
                                <input type="text" class="form-control" placeholder="退款帳號" id="returns_account"
                                       name="returns_account" required>
                            </div>
                        </div>
                        <div class="form-inline">
                            <label>退貨資料：</label>
                            <label><input type="checkbox" id="getOderCheckbox" onchange="getOrder(this)">同訂單資料</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="收件人" id="returns_name"
                                   name="returns_name" required>
                            <input type="text" class="form-control" id="returns_phone" name="returns_phone"
                                   placeholder="手機" maxlength="10" pattern="\d{10}"
                                   oninvalid="this.setCustomValidity('最多十位，只能輸入數字')"
                                   oninput="this.setCustomValidity('')">
                            <input type="text" class="form-control" id="tel_code" name="tel_code" placeholder="區碼"
                                   style="width: 20%; float: left" onchange="requireTel()" maxlength="4"
                                   pattern="\d{1,4}"
                                   oninvalid="this.setCustomValidity('最多四位，只能輸入數字')"
                                   oninput="this.setCustomValidity('')">
                            <input type="text" class="form-control" id="returns_tel" name="returns_tel" placeholder="市話"
                                   style="width: 80%; float: left" onchange="requireTel()" maxlength="8" pattern="\d{8}"
                                   oninvalid="this.setCustomValidity('最多八位，只能輸入數字')"
                                   oninput="this.setCustomValidity('')">
                            <div class="clearfix"></div>
                            <input type="email" class="form-control" id="returns_mail" name="returns_mail"
                                   placeholder="電子信箱" required>
                            <input type="text" class="form-control" id="returns_zipcode" name="returns_zipcode"
                                   style="width: 20%; float: left" placeholder="郵遞區號" required>
                            <input type="text" class="form-control" id="returns_address" name="returns_address"
                                   style="width: 80%; float: left" placeholder="地址" required>
                            <div class="clearfix"></div>
                            <textarea class="form-control" rows="5" id="returns_comment" name="returns_comment"
                                      placeholder="備註事項"></textarea>
                        </div>
                        <div>
                            <label>*備註：</label><br>
                            請將退貨商品連同原包裝、發票包裝完整，我們將派物流至您提供的收貨地址取件
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                        <button id="returnsButton" type="submit" class="btn btn-primary">
                            確定
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>

        $(document).ready(function () {
            returnOrder();
        });

        function getOrder(obj) {
            if (!$(obj).is(":checked")) {
                return;
            }
            var order_id = $("#returns_order_id").val();
            $.ajax({
                url: "{{url('get_order')}}",
                type: "POST",
                data: {_token: "{{csrf_token()}}", order_id: order_id},
                success: function (data) {
                    $("#returns_name").val(data.order_name);
                    $("#returns_phone").val(data.order_phone);
                    $("#tel_code").val(data.tel_code);
                    $("#returns_tel").val(data.order_tel);
                    $("#returns_mail").val(data.order_mail);
                    $("#returns_zipcode").val(data.order_zipcode);
                    $("#returns_address").val(data.order_address);
                    $("#returns_comment").val(data.order_comment);
                }
            });
        }

        function requireTel() {
            var tel = $("#returns_tel").val();
            var tel_code = $("#tel_code").val();
            if (tel || tel_code) {
                $("#returns_tel").prop("required", true);
                $("#tel_code").prop("required", true);
            } else {
                $("#returns_tel").removeAttr("required");
                $("#tel_code").removeAttr("required");
            }
        }

        function toggleRefundDiv(value) {
            if (value == 4) {
                $("#bank_code").prop("required", false);
                $("#returns_account").prop("required", false);
                $("#returns_account_name").prop("required", false);
                $("#returns_mail").prop("required", false);
                $("#refundDiv").hide();
                return;
            }
            $("#bank_code").prop("required", true);
            $("#returns_account").prop("required", true);
            $("#returns_account_name").prop("required", true);
            $("#returns_mail").prop("required", true);
            $("#refundDiv").show();
        }

        function showCancelOrderModal(order_id) {
            $("#cancelOrderButton").val(order_id);
            $("#cancelOrderModal").modal("show");
        }

        function showReturnModal(order_id, order_number) {
            $("#returns_order_id").val(order_id);
            $("#orderNumber").html(order_number);
            $("#getOderCheckbox").prop('checked', true).trigger('change');
            $("#returnModal").modal("show");
        }

        function cancelOrder(order_id) {
            $("#cancelOrderModal").modal("hide");
            $("#cancelOrderButton").prop('disabled', true);
            showModal("waitModal", "提示", "請等候系統處理，關閉頁面可能會造成取消預購單失敗！");
            $.ajax({
                type: "POST",
                url: "{{url('member_order_cancel/')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    order_id: order_id
                },
                dataType: "json",
                success: function (data) {
                    $("#cancelOrderButton").prop('disabled', false);
                    $("#cancelOrderButton").val("");
                    $("#waitModal").modal("hide");
                    $("#waitModal").on('hidden.bs.modal', function (e) {
                        var callback = function () {
                            window.location.href = "{{url('member_order')}}";
                        }
                        if (!data.result) {
                            showModal("failModal", "提示", data.msg);
                            return;
                        }
                        showModal("successModal", "提示", "取消訂單成功，歡迎您繼續選購其他商品。", callback);
                    });
                }
            });
        }

        function returnOrder() {
            $("#returnsForm").submit(function (e) {
                e.preventDefault();
                var phone = $('#returns_phone').val()
                var tel = $("#returns_tel").val();
                if (phone == "" && tel == "") {
                    showModal("alertModal", "提示", "手機與市話請擇一填寫！");
                    return;
                }
                $("#returnModal").modal("hide");
                $("#returnsButton").prop('disabled', true);
                showModal("waitModal", "提示", "請等候系統處理，關閉頁面可能會造成退貨失敗！");
                $.ajax({
                    url: "{{url('member_order_return')}}",
                    type: "POST",
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function (data) {
                        $("#waitModal").modal("hide");
                        $("#waitModal").on('hidden.bs.modal', function (e) {
                            $("#returnsButton").prop('disabled', false);
                            var callback = function () {
                                window.location.href = "{{url('member_order')}}";
                            }
                            if (!data.result) {
                                showModal("errorModal", "提示", data.msg, callback);
                                return;
                            }
                            showModal("successModal", "提示", "已收到您要退貨的相關資料，請等候專員為您處理，謝謝。", callback);
                        });
                    }
                });
            });
        }

    </script>
@endsection