<?php

namespace App\Models\Entities\DiscountCalculate;

use App\Models\Entities\Discount;
use App\Models\Entities\IDiscountCalculate;
use App\Models\Order;

class ThirdDiscountRule implements IDiscountCalculate
{

    /**
     * @param Order $order
     * @return Discount
     */
    public function calculate(Order $order): Discount
    {
        $discount = new Discount();
        $discount->setDiscountReason("Third Discount Rule");
        $total = $order->total;
        $productPrices = [];

        foreach ($order->products as $product) {
            if ($product->category_id == 1) {
                array_push($productPrices, $product->price);
            }
        }

        $subTotal = $total - min($productPrices);

        $discount->setDiscountAmount($total - $subTotal);
        $discount->setSubtotal($subTotal);

        return $discount;
    }
}
