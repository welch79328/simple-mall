<?php

namespace App\Http\Controllers\Backstage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //圖片上傳
    public function upload(){
        $file = Input::file('Filedata');
        if($file->isValid()){
            $realPath = $file->getRealPath();//臨時文件的絕對路徑
            $entension = $file->getClientOriginalExtension();//獲得上傳文件的後綴
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file->move(base_path().'/public/uploads',$newName);//移動文件並重命名
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
