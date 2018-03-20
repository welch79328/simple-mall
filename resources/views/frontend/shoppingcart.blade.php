<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('/resources/views/home/js/modernizr.js')}}"></script>
    <![endif]-->

</head>
<body>

<form action="" method="post">
    {{csrf_field()}}
    <table class="add_tab">

    <table>
     <tr> <th> 產品</th> <th> 數量</th> <th> 價格</th>  <th> 變更明細</th> </tr> </thead>

    <tbody>
    @foreach($cart as $v)
    <tr>
    <td>
    <p> <strong> {{$v->name}} </strong> </p>
    </td>
    <td> <input  type ="text"  value = "{{$v->qty}}"  > </td>
    <td> $ {{$v->price}}</td>
    <td>
        <a href="">下次再買</a>
        <a href="javascript:" onclick="delcommodity('{{$v->rowId}}')">删除</a>
    </td>
    </tr>

    @endforeach

    </tbody>

    <tr>
        <td> </td>
        <td> </td>
        <td> $ {{$total}}</td>
    </tr>
        <th></th>
        <td>
            <input type="submit" value="結帳">
            <input type="button" class="back" onclick="history.go(-1)" value="繼續選購">
        </td>
        </tr>
        </tbody>
    </table>
</form>

    <script>

        //刪除商品
        function delcommodity(rowId) {
                $.post("{{url('shoppingcart')}}/"+rowId,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                        alert('成功');
                });
        }

    </script>


</body>
</html>