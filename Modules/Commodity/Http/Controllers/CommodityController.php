<?php

namespace Modules\Commodity\Http\Controllers;

use App\Helpers\ModuleHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Modules\Commodity\Entities\CommodityImg;


class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $moduleHelper;

    public function __construct()
    {
        $this->moduleHelper = new ModuleHelper();

    }

    public function index()
    {
//        $data = Commodity::join('category','commodity.cate_id','=','category.cate_id')->orderBy('commodity_id','desc')->paginate(5);
        $data = Commodity::paginate(10);
        $cate = Category::get();
        foreach ($data as $v){
            if($v->cate_id == Null){
                $v->cate_name = '';
            }else{
                foreach ($cate as $q){
                    if($v->cate_id == $q->cate_id){
                        $v->cate_name = $q->cate_name;
                    }
                }
            }
        }
        return view('backstage.commodity.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categorys = Category::orderBy('cate_order','asc')->get();
        $data = $this->moduleHelper->getTree($categorys,'cate_name','cate_id','cate_parent','cate_level','5');
        return view('backstage.commodity.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $input = Input::except('_token');
            $image = explode(',', $input['image_url']);

            $input['commodity_time'] = time();
            unset($input['image_url']);

            $rules=[
                'commodity_title'=>'required',
                'commodity_description'=>'required',
            ];

            $message=[
                'commodity_title.required'=>'商品名稱不能為空!',
                'commodity_description.required'=>'商品內容不能為空!',
            ];

            $validator = Validator::make($input,$rules,$message);

            if($validator->passes()){
                $re = Commodity::create($input);
                foreach ($image as $k=>$v) {
                    $k = 'image_url';
                    $img_url = [$k=>$v,'commodity_id'=>$re->commodity_id];
                    CommodityImg::create($img_url);
                }
                DB::commit();
                return redirect('commodity');
//                if($re){
//                    return redirect('admin/commodity');
//                }else {
//                    return back()->with('errors', '數據填充錯誤, 請稍後重試');
//                }
            }else{
                return back()->withErrors($validator);
            }



        }catch (\Exception $e){
            DB::rollBack();

            return back()->with('errors', '數據填充錯誤, 請稍後重試');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('commodity::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($commodity_id)
    {
        $categorys = Category::get();
        $data = $this->moduleHelper->getTree($categorys,'cate_name','cate_id','cate_parent','cate_level','4');
        $commodity = Commodity::find($commodity_id);
        return view('backstage.commodity.edit',compact('data','commodity'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $commodity_id)
    {
        $input = Input::except('_token','_method');
        $re = Commodity::where('commodity_id',$commodity_id)->update($input);
        if($re){
            return redirect('commodity');
        }else{
            return back()->with('errors', '商品更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($commodity_id)
    {
        $re = Commodity::where('commodity_id',$commodity_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '商品刪除成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '商品刪除失敗, 請稍後重試!',
            ];
        }

        return $data;
    }
}
