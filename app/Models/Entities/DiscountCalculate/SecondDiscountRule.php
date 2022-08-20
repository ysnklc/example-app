<?php

namespace App\Models\Entities\DiscountCalculate;

use App\Models\Entities\Discount;
use App\Models\Entities\IDiscountCalculate;
use App\Models\Order;

class SecondDiscountRule implements IDiscountCalculate
{

    /**
     * @param Order $order
     * @return Discount
     */
    public function calculate(Order $order): Discount
    {
        $discount = new Discount();
        $discount->setDiscountReason("Second Discount Rule");

        $total = $order->total;

        foreach ($order->products as $product) {
            if ($product->category_id == 2 && $product->pivot->quantity == 6) {
                $discountAmount = $product->price;
                break;
            }
        }

        $discount->setDiscountAmount($discountAmount);
        $discount->setSubtotal($total - $discountAmount);

        return $discount;
    }
}
