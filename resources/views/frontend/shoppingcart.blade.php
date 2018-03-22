<div class="table-responsive">
    <form action="" method="post">
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
                        <a href="javascript:" onclick="delcommodity(this)">删除</a>
                        <input type="hidden" value="{{$v->rowId}}" />
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
            <tr>
                <td colspan="4">
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-default">結帳</button>
                        <button type="button" class="btn btn-default" onclick="{
                                    $('#ShoppingCartModal').modal('hide')
                                }">繼續選購</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script>

    //刪除商品
    function delcommodity(obj) {
        var hidden = $(obj).next();
        var rowId = hidden.val();
        $.post("{{url('shopping/remove')}}",
                {
                    "_token": "{{csrf_token()}}",
                    "rowId": rowId
                }, function (response) {
            if (response.result) {
                console.log($("#" + rowId));
                $("#" + rowId).remove();
            }
        });
    }
</script>
