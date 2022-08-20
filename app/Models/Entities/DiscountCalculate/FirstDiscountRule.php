<?php

namespace App\Models\Entities\DiscountCalculate;

use App\Models\Entities\Discount;
use App\Models\Entities\IDiscountCalculate;
use App\Models\Order;

class FirstDiscountRule implements IDiscountCalculate
{
    /**
     * @param Order $order
     * @return Discount
     */
    public function calculate(Order $order): Discount
    {//dd($order);
        $discount = new Discount();
        $discount->setDiscountReason("First Discount Rule");
        $subTotal = ($order->total) - (($order->total * 10) / 100);
        $discount->setDiscountAmount($order->total - $subTotal);
        $discount->setSubtotal($subTotal);

        return $discount;
    }
}
