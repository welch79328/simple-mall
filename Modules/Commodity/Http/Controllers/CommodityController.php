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
        $data = Commodity::orderBy('updated_at', 'desc')->paginate(10);
        $cate = Category::get();
        foreach ($data as $v) {
            if ($v->cate_id == Null) {
                $v->cate_name = '';
            } else {
                foreach ($cate as $q) {
                    if ($v->cate_id == $q->cate_id) {
                        $v->cate_name = $q->cate_name;
                    }
                }
            }
        }
        return view('backstage.commodity.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categorys = Category::get();
        $data = $this->moduleHelper->getTree($categorys, 'cate_name', 'cate_id', 'cate_parent', 'cate_level', '5');

        return view('backstage.commodity.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $input = Input::except('_token', 'file_upload', 'file_upload1');
            $input['commodity_creator'] = session('admin_member.member_name');
            $image = explode(',', $input['image']);
            $input['commodity_period'] = explode(' to ', $input['commodity_period']);
            $input['commodity_start_time'] = $input['commodity_period'][0];
            $input['commodity_end_time'] = $input['commodity_period'][1];
            $speces = $input['spec'];
            dd($input);
            unset($input['commodity_period']);
            unset($input['image']);


            $rules = [
                'commodity_title' => 'required',
//                'commodity_description'=>'required',
            ];

            $message = [
                'commodity_title.required' => '商品名稱不能為空!',
//                'commodity_description.required'=>'商品內容不能為空!',
            ];

            $validator = Validator::make($input, $rules, $message);

            if ($validator->passes()) {
                $re = Commodity::create($input);
                foreach ($image as $k => $v) {
                    $k = 'image';
                    $commodityImg = [$k => $v, 'commodity_id' => $re->commodity_id];
                    CommodityImg::create($commodityImg);
                }
                foreach () {

                }
                DB::commit();
                return redirect('admin/commodity');
//                if($re){
//                    return redirect('admin/commodity');
//                }else {
//                    return back()->with('errors', '數據填充錯誤, 請稍後重試');
//                }
            } else {
                return back()->withErrors($validator);
            }

        } catch (\Exception $e) {
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
        $data = $this->moduleHelper->getTree($categorys, 'cate_name', 'cate_id', 'cate_parent', 'cate_level', '4');
        $commodity = Commodity::find($commodity_id);
        $commodityImg = CommodityImg::where('commodity_id', $commodity_id)->get();
        $commodityImg_array = '';
        foreach ($commodityImg as $v) {
            $commodityImg_array = $commodityImg_array . ',' . $v->image;
        }
        $commodityImg_array = substr($commodityImg_array, 1);
        return view('backstage.commodity.edit', compact('data', 'commodity', 'commodityImg', 'commodityImg_array'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $commodity_id)
    {
        $input = Input::except('_token', '_method', 'file_upload', 'file_upload1');
        $image = explode(',', $input['image']);
        $input['commodity_period'] = explode('to ', $input['commodity_period']);
        $input['commodity_start_time'] = $input['commodity_period'][0];
        $input['commodity_end_time'] = $input['commodity_period'][1];
        $input['commodity_creator'] = session('admin_member.member_name');

        unset($input['commodity_period']);
        unset($input['image']);
        $re = Commodity::where('commodity_id', $commodity_id)->update($input);

        CommodityImg::where('commodity_id', $commodity_id)->delete();
        foreach ($image as $k => $v) {
            $k = 'image';
            $commodityImg = [$k => $v, 'commodity_id' => $commodity_id];
            $re1 = CommodityImg::create($commodityImg);
        }
        if ($re || $re1) {
            return redirect('admin/commodity');
        } else {
            return back()->with('errors', '商品更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($commodity_id)
    {
        $re = Commodity::where('commodity_id', $commodity_id)->delete();
        $re1 = CommodityImg::where('commodity_id', $commodity_id)->delete();
        if ($re || $re1) {
            $data = [
                'status' => 0,
                'msg' => '商品刪除成功!',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '商品刪除失敗, 請稍後重試!',
            ];
        }

        return $data;
    }
}
