<?php

namespace Modules\Category\Http\Controllers;

use App\Helpers\ModuleHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Modules\Category\Entities\Category;
use Modules\Commodity\Entities\Commodity;
use Modules\Commodity\Entities\CommodityImg;


class CategoryController extends Controller
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
        $categorys = Category::orderBy('cate_order','asc')->get();
        $data = $this->moduleHelper->getTree($categorys,'cate_name','cate_id','cate_parent','cate_level','5',0);
        dd($data);
        return view('backstage.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categorys = Category::orderBy('cate_order','asc')->get();
        $data = $this->moduleHelper->getTree($categorys,'cate_name','cate_id','cate_parent','cate_level','4');
        return view('backstage.category.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        if($category = Category::where('cate_id',$input['cate_parent'])->first()){
            $input['cate_level'] = ($category->cate_level)+1;
        }
        $rules=[
            'cate_name'=>'required',
        ];

        $message=[
            'cate_name.required'=>'分類名稱不能為空!',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Category::create($input);
            if($re){
                return redirect('category');
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
        return view('backstage.category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($cate_id)
    {
        $data = Category::find($cate_id);
        return view('backstage.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $cate_id)
    {
        $input = Input::except('_token','_method');
        $re = Category::where('cate_id',$cate_id)->update($input);
        if($re){
            return redirect('category');
        }else{
            return back()->with('errors', '分類信息更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($cate_id)
    {
        $level = Category::where('cate_id',$cate_id)->first();
        $comm = Commodity::where('cate_id',$cate_id)->get();
        Commodity::where('cate_id',$cate_id)->delete();
        if($comm){
            foreach($comm as $c){
                CommodityImg::where('commodity_id',$c->commodity_id)->delete();
            }
        }
        $re = Category::where('cate_id',$cate_id)->delete();
        if($re){
            $level2 = Category::where('cate_pid',$level->cate_id)->get();
            $re2 = Category::where('cate_pid',$level->cate_id)->delete();
            if($re2){
                foreach ($level2 as $v){
                    $level3 = Category::where('cate_pid',$v->cate_id)->get();
                    $comm2 =  Commodity::where('cate_id',$v->cate_id)->get();
                    Commodity::where('cate_id',$v->cate_id)->delete();
                    if($comm2){
                        foreach($comm2 as $e){
                            CommodityImg::where('commodity_id',$e->commodity_id)->delete();
                        }
                    }
                    $re3 = Category::where('cate_pid',$v->cate_id)->delete();
                    if($re3){
                        foreach ($level3 as $m){
                            $level4 = Category::where('cate_pid',$m->cate_id)->get();
                            $comm3 =  Commodity::where('cate_id',$m->cate_id)->get();
                            Commodity::where('cate_id',$m->cate_id)->delete();
                            if($comm3){
                                foreach($comm3 as $f){
                                    CommodityImg::where('commodity_id',$f->commodity_id)->delete();
                                }
                            }
                            $re4 = Category::where('cate_pid',$m->cate_id)->delete();
                            if($re4){
                                foreach ($level4 as $o){
                                    $level5 = Category::where('cate_pid',$o->cate_id)->get();
                                    $comm4 =  Commodity::where('cate_id',$o->cate_id)->get();
                                    Commodity::where('cate_id',$o->cate_id)->delete();
                                    if($comm4){
                                        foreach($comm4 as $j){
                                            CommodityImg::where('commodity_id',$j->commodity_id)->delete();
                                        }
                                    }
                                    $re5 = Category::where('cate_pid',$o->cate_id)->delete();
                                    if($re5){
                                        foreach ($level5 as $x){
                                            $comm5 =  Commodity::where('cate_id',$x->cate_id)->get();
                                            Commodity::where('cate_id',$x->cate_id)->delete();
                                            if($comm5){
                                                foreach($comm5 as $b){
                                                    CommodityImg::where('commodity_id',$b->commodity_id)->delete();
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
        }

        if($re){
            $data = [
                'status' => 0,
                'msg' => '分類刪除成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分類刪除失敗, 請稍後重試!',
            ];
        }
        return $data;
    }

    public function changeOrder(){
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '分類排序更新成功!',
            ];
        }else {
            $data = [
                'status' => 1,
                'msg' => '分類排序更新失敗,請稍後再重試!',
            ];
        }
        return $data;
    }

}
