<?php

namespace Modules\Discount\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Modules\Commodity\Entities\CommodityImg;
use Modules\Discount\Entities\Discount;


class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('discount::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categorys = Category::orderBy('cate_order','asc')->get();
        $data = $this->getTree($categorys,'cate_name','cate_id','cate_pid','cate_level','5');
        $cate_comm = Category::where('cate_level',1)->first();
        $commodity = Commodity::where('cate_id',$cate_comm->cate_id)->get();
        return view('discount::create',compact('data','commodity'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        $image = explode(',', $input['image_url']);

        $input['discount_time'] = time();
        unset($input['image_url']);

        $rules=[
            'discount_title'=>'required',
            'discount_description'=>'required',
        ];

        $message=[
            'discount_title.required'=>'折扣名稱不能為空!',
            'discount_description.required'=>'折扣內容不能為空!',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Discount::create($input);
            foreach ($image as $k=>$v) {
                $k = 'image_url';
                $img_url = [$k=>$v,'discount_id'=>$re->discount_id];
                CommodityImg::create($img_url);
            }
            if($re){
                return redirect('admin/discount');
            }else {
                return back()->with('errors', '數據填充錯誤, 請稍後重試');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('discount::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($discount_id)
    {
        $data = $this->tree();
        $discount = Discount::find($discount_id);
        return view('discount::edit',compact('data','discount'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$discount_id)
    {
        $input = Input::except('_token','_method');
        $re = Discount::where('discount_id',$discount_id)->update($input);
        if($re){
            return redirect('admin/discount');
        }else{
            return back()->with('errors', '折扣更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($discount_id)
    {
        $re = Discount::where('discount_id',$discount_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '折扣刪除成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '折扣刪除失敗, 請稍後重試!',
            ];
        }
        return $data;
    }

    public function commodity()
    {
        $input = Input::all();
        $cate_id = $input['cate_id'];

        $re = [];
        $cate = Commodity::where('cate_id',$cate_id)->get();

        foreach ($cate as $v){
            $re[] = [
                'commodity_title' => $v->commodity_title,
                'commodity_id' => $v->commodity_id,
            ];
        }
        return $re;
    }

    public function tree(){
        $categorys = Category::orderBy('cate_order','asc')->get();
        return $this->getTree($categorys,'cate_name','cate_id','cate_pid','cate_level','4');
    }

    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$field_level,$level,$pid=0){

        $arr = array();
        foreach ($data as $k=>$v){
            if($v->$field_pid==$pid){
                $data[$k]['_'.$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if($n->$field_pid == $v->$field_id && $n->$field_level == 2 && $n->$field_level <= $level){
                        $data[$m]['_'.$field_name] = ' ❙❙ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                        foreach ($data as $o=>$p){
                            if($p->$field_pid == $n->$field_id && $p->$field_level == 3 && $p->$field_level <= $level){
                                $data[$o]['_'.$field_name] = ' ❙❙❙ '.$data[$o][$field_name];
                                $arr[] = $data[$o];
                                foreach ($data as $r=>$s){
                                    if($s->$field_pid == $p->$field_id && $s->$field_level == 4 && $s->$field_level <= $level){
                                        $data[$r]['_'.$field_name] = ' ❙❙❙❙ '.$data[$r][$field_name];
                                        $arr[] = $data[$r];
                                        foreach ($data as $x=>$y){
                                            if($y->$field_pid == $s->$field_id && $y->$field_level == 5 && $y->$field_level <= $level){
                                                $data[$x]['_'.$field_name] = ' ❙❙❙❙❙ '.$data[$x][$field_name];
                                                $arr[] = $data[$x];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }
}
