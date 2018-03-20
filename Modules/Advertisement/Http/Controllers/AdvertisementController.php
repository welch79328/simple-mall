<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Modules\Advertisement\Entities\Advertisement;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Advertisement::orderBy('updated_at','desc')->paginate(10);

//        $now = date("Y/m/d h:i:s");
//        $date = strtotime($now);
//        if ('2018-03-03 23:59:59' > $now){
//            dd(2131,$now);
//        }else{
//            dd(3333,$date);
//        }

        return view('backstage.advertisement.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backstage.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            $input = Input::except('_token','file_upload');
            $input['advertisement_creator'] = session('admin_member.member_name');
            $input['advertisement_period'] = explode('to',$input['advertisement_period']);
            $input['advertisement_start_time'] = $input['advertisement_period'][0];
            $input['advertisement_end_time'] = $input['advertisement_period'][1];

            unset($input['advertisement_period']);

            $rules=[
                'advertisement_name'=>'required',
            ];

            $message=[
                'advertisement_name.required'=>'廣告名稱不能為空!',
            ];
            $validator = Validator::make($input,$rules,$message);

            if($validator->passes()){
                $re = Advertisement::create($input);

                return redirect('admin/advertisement');
//                if($re){
//                    return redirect('admin/commodity');
//                }else {
//                    return back()->with('errors', '數據填充錯誤, 請稍後重試');
//                }
            }else{
                return back()->withErrors($validator);
            }
        }catch (\Exception $e){
            return back()->with('errors', '數據填充錯誤, 請稍後重試');
        }
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('backstage.advertisement.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($advertisement_id)
    {
        $data = Advertisement::where('advertisement_id',$advertisement_id)->first();
        return view('backstage.advertisement.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request,$advertisement_id)
    {
        $input = Input::except('_token','_method','file_upload');
        $input['advertisement_period'] = explode('to',$input['advertisement_period']);
        $input['advertisement_start_time'] = $input['advertisement_period'][0];
        $input['advertisement_end_time'] = $input['advertisement_period'][1];
        $input['advertisement_creator'] = session('admin_member.member_name');

        unset($input['advertisement_period']);
        $re = Advertisement::where('advertisement_id',$advertisement_id)->update($input);
        if($re){
            return redirect('admin/advertisement');
        }else{
            return back()->with('errors', '商品更新失敗, 請稍後重試');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($advertisement_id)
    {
        $re = Advertisement::where('advertisement_id',$advertisement_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '廣告刪除成功!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '廣告刪除失敗, 請稍後重試!',
            ];
        }

        return $data;
    }
}
