<!--menu__item--current 類別名稱 正在訪問的頁面-->
@foreach($cates as $cate)
@if(!empty($cate->children))
<li class="@if($cate->cate_parent == 0) dropdown @else dropdown-submenu @endif"> 
    <a href="#" style="color: #9d9d9d;" class="dropdown-toggle test" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$cate->cate_name}} <span class="caret"></span></a>
    <ul class="dropdown-menu agile_short_dropdown">
        @include('frontend.categoryNav', array('cates' => $cate->children))
    </ul>
</li>
@else
<li><a href="#">{{$cate->cate_name}}</a></li>
@endif
@endforeach