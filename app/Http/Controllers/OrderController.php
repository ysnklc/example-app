<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        try {
            $orders = Order::all();

            return appResponse()->success(200, "Data listelendi", OrderResource::collection($orders));
        } catch (\Exception $e) {
            return appResponse()->failed($e->getCode(), $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|not_in:0',
            'item' => 'required'
        ]);

        if ($validator->fails()) {
            return appResponse()->failed(422, "validation_error", $validator->errors());
        }

        try {
            $return = $this->orderService->orderCreate($request->all());
            return appResponse()->success($return['code'], $return['message'], []);
        } catch (\Exception $e) {
            return appResponse()->failed($e->getCode(), $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        try {
            $order = Order::find($request->get('order_id'));

            if (empty($order)) {
                return appResponse()->success(404, "Sipariş bulunamadı", []);
            }

            $order->delete();

            return appResponse()->success(200, "Sipariş silindi", []);
        } catch (\Exception $e) {
            return appResponse()->failed($e->getCode(), $e->getMessage());
        }
    }

}
