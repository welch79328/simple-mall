<?php

namespace Modules\Returns\Http\Controllers;

use Modules\Order\Entities\Order;
use Modules\Returns\Entities\Returns;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Returns::orderBy('created_at', 'desc')->paginate(20);
        foreach ($data as $v) {
            switch ($v->return_status) {
                case 'exchange':
                    $v->_return_status = '換貨';
                    break;
                case 'refund':
                    $v->_return_status = '退款';
                    break;
                case 'complete':
                    $v->_return_status = '已解決';
                    break;
            }
        }
        return view('backstage.returns.index', compact('data'));
    }

    public function complete($return_id)
    {
        $data = [
            "return_status" => "complete",
            "creator" => session('admin_member.member_name'),
        ];
        $result = Returns::where("return_id", $return_id)->update($data);
        if (!$result) {
            return back()->with("errors", "修改退貨單失敗：請稍後再試！");
        }
        $return = Returns::where("return_id", $return_id)->first();
        $result = Order::where("order_id", $return->order_id)->update(["order_status" => "pending"]);
        return redirect("admin/return");
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('returns::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('returns::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('returns::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
