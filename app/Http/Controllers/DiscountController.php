<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscountResource;
use App\Http\Resources\DiscountResponseResource;
use App\Models\Entities\DiscountCalculate\FirstDiscountRule;
use App\Models\Entities\DiscountCalculate\SecondDiscountRule;
use App\Models\Entities\DiscountCalculate\ThirdDiscountRule;
use App\Models\Order;
use App\Services\DiscountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    private DiscountService $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|not_in:0'
        ]);

        if ($validator->fails()) {
            return appResponse()->failed(422, "validation_error", $validator->errors());
        }

        $orderId = $request->get('order_id');
        $order = Order::find($orderId);

        if (empty($order)) {
            return appResponse()->success(404, "Sipariş bulunamadı", []);
        }

        try {
            $data = new DiscountResponseResource($this->discountService->calculate($order));
            return appResponse()->success(200, "Data listelendi", $data);
        } catch (\Exception $e) {
            return appResponse()->failed($e->getCode(), $e->getMessage());
        }
    }
}
