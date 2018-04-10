@extends('layouts.frontend.frontend')

@section('title', "$websiteTitle 購物車")

@section('content')
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h2>購物車({{count($cart)}})</h2>
            <form id="shoppingCartForm" action="{{url('order_info')}}" method="post">
                {{csrf_field()}}
                <div class="table-responsive" style="margin-top: 20px">
                    <!-- Table -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th> 產品</th>
                            <th> 數量</th>
                            <th> 單價</th>
                            <th> 操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $v)
                            <tr>
                                <td style="font-weight:bold;">{{$v->name}}</td>
                                <td>
                                    <input type="number" min="1" value="{{$v->qty}}"
                                           onchange="changeAmount(this, '{{$v->rowId}}')" required>
                                </td>
                                <td>${{$v->price}}</td>
                                <td>
                                    <a href="{{url('shopping/remove/'.$v->rowId)}}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>${{$total}}</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div style="text-align: right">
                    <button type="button" class="btn btn-default"
                            onclick="(window.location.href = '{{url("/")}}')" align="right">
                        繼續選購
                    </button>
                    <input id="checkoutSubmit" type="submit" class="btn btn-info" value="立即結帳">
                </div>
            </form>
        </div>
    </div>
    <script>
        function changeAmount(obj, rowId) {
            var amount = $(obj).val();
            if (amount <= 0) {
                showModal("errorModal", "提示", "修改數量失敗：數量必須大於零");
                return;
            }
            $.post("{{url('shopping/update_amount')}}", {
                _token: "{{csrf_token()}}",
                amount: amount,
                rowId: rowId
            }, function (data) {
                var callback = function () {
                    window.location.href = "{{url('shoppingcart/show')}}";
                }
                if (!data.result) {
                    showModal("errorModal", "提示", data.msg, callback);
                    return;
                }
                showModal("successModal", "提示", data.msg, callback);
            });
        }
    </script>
@endsection