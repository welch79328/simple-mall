<?php

namespace Modules\Commodity\Http\Controllers;

use Exception;
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
use Modules\Commodity\Entities\CommoditySpec;

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
            switch ($v->commodity_type) {
                case "limited":
                    $v->_commodity_type = "限時";
                    break;
                case "general":
                    $v->_commodity_type = "一般";
                    break;
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
            $input = Input::except('_token', 'file_upload', 'file_upload1');
            $input['commodity_creator'] = session('admin_member.member_name');
            $image = explode(',', $input['image']);
            $input['commodity_period'] = explode(' to ', $input['commodity_period']);
            $input['commodity_start_time'] = $input['commodity_period'][0];
            $input['commodity_end_time'] = $input['commodity_period'][1];
            if (empty($input['commodity_originalprice'])) {
                $input['commodity_originalprice'] = $input['commodity_price'];
            }
            $speces = (isset($input['spec'])) ? $input['spec'] : [];
            $stocks = (isset($input['stock'])) ? $input['stock'] : [];
            unset($input['commodity_period']);
            unset($input['image']);
            unset($input['spec']);
            unset($input['stock']);

            $rules = [
                'commodity_title' => 'required',
                'commodity_price' => 'required',
                'commodity_stock' => 'required',
                'commodity_safe_stock' => 'required',
            ];
            $message = [
                'commodity_title.required' => '商品名稱不能為空!',
                'commodity_price.required' => '商品預購價不能為空!',
                'commodity_stock.required' => '商品庫存不能為空!',
                'commodity_safe_stock.required' => '商品安全庫存不能為空!',
            ];
            $validator = Validator::make($input, $rules, $message);

            if ($validator->passes()) {
                $re = Commodity::create($input);
                if (!$re) {
                    throw new Exception("新增商品失敗：請稍後再試！");
                }
                DB::beginTransaction();
                foreach ($image as $k => $v) {
                    if (!empty($v)) {
                        $commodityImg = [
                            "image" => $v,
                            "commodity_id" => $re->commodity_id,
                            "created_at" => \Carbon\Carbon::now(),
                            "updated_at" => \Carbon\Carbon::now()
                        ];
                        $result = DB::table("commodity_img")->insert($commodityImg);
                        if (!$result) {
                            throw new Exception("新增商品失敗：無法新增圖片！");
                        }
                    }
                }
                foreach ($speces as $key => $spec) {
                    if (!empty($spec)) {
                        $commoditySpec = [
                            "spec" => $spec,
                            "stock" => $stocks[$key],
                            "commodity_id" => $re->commodity_id,
                            "created_at" => \Carbon\Carbon::now(),
                            "updated_at" => \Carbon\Carbon::now()
                        ];
                        $result = DB::table("commodity_spec")->insert($commoditySpec);
                        if (!$result) {
                            throw new Exception("新增商品失敗：無法新增規格！");
                        }
                    }
                }
                DB::commit();
                return redirect('admin/commodity');
            } else {
                return back()->withErrors($validator);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('errors', $e->getMessage());
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
        $spec_array = CommoditySpec::where('commodity_id', $commodity_id)->orderBy("id", "asc")->get();
        return view('backstage.commodity.edit', compact('data', 'commodity', 'commodityImg', 'commodityImg_array', 'spec_array'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $commodity_id)
    {
        try {
            $input = Input::except('_token', '_method', 'file_upload', 'file_upload1');
            $image = explode(',', $input['image']);
            $input['commodity_period'] = explode(' to ', $input['commodity_period']);
            $input['commodity_start_time'] = $input['commodity_period'][0];
            $input['commodity_end_time'] = $input['commodity_period'][1];
            $input['commodity_creator'] = session('admin_member.member_name');
            $speces = (isset($input['spec'])) ? $input['spec'] : [];
            $specIds = (isset($input['specId'])) ? $input['specId'] : [];
            $stocks = (isset($input['stock'])) ? $input['stock'] : [];
            if (empty($input['commodity_originalprice'])) {
                $input['commodity_originalprice'] = $input['commodity_price'];
            }
            unset($input['commodity_period']);
            unset($input['image']);
            unset($input['spec']);
            unset($input['stock']);
            unset($input['specId']);

            $rules = [
                'commodity_title' => 'required',
                'commodity_price' => 'required',
                'commodity_stock' => 'required',
                'commodity_safe_stock' => 'required',
            ];
            $message = [
                'commodity_title.required' => '商品名稱不能為空!',
                'commodity_price.required' => '商品預購價不能為空!',
                'commodity_stock.required' => '商品庫存不能為空!',
                'commodity_safe_stock.required' => '商品安全庫存不能為空!',
            ];
            $validator = Validator::make($input, $rules, $message);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            DB::beginTransaction();
            $input["updated_at"] = \Carbon\Carbon::now();
            DB::table("commodity")->where('commodity_id', $commodity_id)->update($input);

            DB::table("commodity_img")->where('commodity_id', $commodity_id)->delete();
            foreach ($image as $k => $v) {
                if (!empty($v)) {
                    $k = 'image';
                    $commodityImg = [
                        $k => $v,
                        "commodity_id" => $commodity_id,
                        "created_at" => \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now()
                    ];
                    DB::table("commodity_img")->insert($commodityImg);
                }
            }

            $ids = DB::table("commodity_spec")->where("commodity_id", $commodity_id)->pluck("id")->toArray();
            $removeIds = array_diff($ids, $specIds);
            DB::table("commodity_spec")->whereIn('id', $removeIds)->delete();
            foreach ($speces as $key => $spec) {
                if (!empty($specIds[$key])) {
                    $commoditySpec = [
                        "spec" => $spec,
                        "stock" => $stocks[$key],
                        "updated_at" => \Carbon\Carbon::now()
                    ];
                    DB::table("commodity_spec")->where("id", $specIds[$key])->update($commoditySpec);
                } elseif (empty($specIds[$key]) && !empty($spec)) {
                    $commoditySpec = [
                        "spec" => $spec,
                        "stock" => $stocks[$key],
                        "commodity_id" => $commodity_id,
                        "created_at" => \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now()
                    ];
                    DB::table("commodity_spec")->insert($commoditySpec);
                }
            }
            DB::commit();
            return redirect('admin/commodity');
        } catch (\Exception $e) {
            DB::rollBack();
            //return back()->with('errors', $e->getMessage());
            return back()->with('errors', '商品更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($commodity_id)
    {
        try {
            DB::beginTransaction();
            Commodity::where('commodity_id', $commodity_id)->delete();
            CommodityImg::where('commodity_id', $commodity_id)->delete();
            CommoditySpec::where('commodity_id', $commodity_id)->delete();
            DB::commit();
            $data = [
                'status' => 0,
                'msg' => '商品刪除成功!',
            ];
            return $data;
        } catch (\Exception $e) {
            DB::rollBack();
            //return back()->with('errors', $e->getMessage());
            $data = [
                'status' => 1,
                'msg' => '商品刪除失敗, 請稍後重試!',
            ];
            return $data;
        }
    }
}
