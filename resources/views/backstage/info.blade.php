@extends('layouts.backstage.admin')

 @section('content')
     <div class="crumb_warp">
         <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 系統基本訊息
     </div>

     <div class="result_wrap">
         <div class="result_title">
             <h3>系统基本信息</h3>
         </div>
         <div class="result_content">
         </div>
     </div>


     <div class="result_wrap">
         <div class="result_title">
             <h3>使用帮助</h3>
         </div>
         <div class="result_content">
             <ul>
             </ul>
         </div>
     </div>
 @endsection

