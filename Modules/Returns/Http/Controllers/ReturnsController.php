<?php

namespace Modules\Returns\Http\Controllers;

use Modules\Order\Entities\Order;
use Modules\Order\Entities\Orderlist;
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
            switch ($v->returns_status) {
                case 'pending':
                    $v->_returns_status = '待處理';
                    break;
                case 'complete':
                    $v->_returns_status = '已解決';
                    break;
            }
        }
        return view('backstage.returns.index', compact('data'));
    }

    public function complete($returns_id)
    {
        $data = [
            "returns_status" => "complete",
            "editor" => session('admin_member.member_name'),
        ];
        $result = Returns::where("returns_id", $returns_id)->update($data);
        if (!$result) {
            return back()->with("errors", "修改退貨單失敗：請稍後再試！");
        }
        //$returns = Returns::where("returns_id", $returns_id)->first();
        //$result = Order::where("order_id", $returns->order_id)->update(["order_status" => "pending"]);
        return redirect("admin/returns");
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
    public function edit($returns_id)
    {
        $data = Returns::where("returns_id", $returns_id)->first();
        switch ($data->returns_reason) {
            case "1":
                $data->_returns_reason = "不滿意款式";
                break;
            case "2":
                $data->_returns_reason = "與網頁呈現有落差";
                break;
            case "3":
                $data->_returns_reason = "改變心意";
                break;
            case "4":
                $data->_returns_reason = "收到有瑕疵/損壞的商品(更換商品)";
                break;
        }
        switch ($data->returns_status) {
            case 'pending':
                $data->_returns_status = '待處理';
                break;
            case 'complete':
                $data->_returns_status = '已解決';
                break;
        }
        $order = Order::where("order_id", $data->order_id)->first();
        $orderDetail = Orderlist::where("order_id", $data->order_id)->get();
        return view('backstage.returns.edit', compact('data', 'order', 'orderDetail'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $returns_id)
    {
        dd($returns_id);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
