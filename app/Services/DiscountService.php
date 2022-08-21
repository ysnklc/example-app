<?php

namespace App\Services;

use App\Models\Entities\Discount;
use App\Models\Entities\DiscountCalculate\FirstDiscountRule;
use App\Models\Entities\DiscountCalculate\SecondDiscountRule;
use App\Models\Entities\DiscountCalculate\ThirdDiscountRule;
use App\Models\Entities\DiscountsResponse;
use App\Models\Entities\IDiscountCalculate;
use App\Models\Order;
use App\Models\Product;

class DiscountService
{
    /**
     * @param Order $order
     * @return DiscountsResponse
     */
    public function calculate(Order $order): DiscountsResponse
    {
        $totalDiscount = 0;
        $discountedTotal = 0;
        $subTotal = 0;
        $discountsResponse = new DiscountsResponse();
        $discountsResponse->setOrderId($order->id);
        $orderTotal = $order->total;

        if ($orderTotal > 1000) {
            /* @var Discount $discount */
            $discount = $this->getDiscount(new FirstDiscountRule(), $order);
            $discountsResponse->addDiscount($discount);
            $totalDiscount += $discount->getDiscountAmount();
            $subTotal = $discount->getSubtotal();
        }

        if ($this->quantityPurchased($order->products, 2) == 6) {
            /* @var Discount $discount */
            $discount = $this->getDiscount(new SecondDiscountRule(), $order);
            $discountsResponse->addDiscount($discount);
            $totalDiscount += $discount->getDiscountAmount();
            $discount->setSubtotal($subTotal - $discount->getDiscountAmount());
            $subTotal = $discount->getSubtotal();
        }

        if ($this->quantityPurchased($order->products, 1) >= 2) {
            /* @var Discount $discount */
            $discount = $this->getDiscount(new ThirdDiscountRule(), $order);
            $discountsResponse->addDiscount($discount);
            $totalDiscount += $discount->getDiscountAmount();
            $discount->setSubtotal($subTotal - $discount->getDiscountAmount());
            $subTotal = $discount->getSubtotal();
        }

        $discountsResponse->setTotalDiscount($totalDiscount);
        $discountsResponse->setDiscountedTotal($order->total - $totalDiscount);

        return $discountsResponse;
    }

    /**
     * @param IDiscountCalculate $discountCalculate
     * @param Order $order
     * @return Discount
     */
    private function getDiscount(IDiscountCalculate $discountCalculate, Order $order): Discount
    {
        return $discountCalculate->calculate($order);
    }

    /**
     * @param $productsArray
     * @param $categoryId
     * @return int
     */
    private function quantityPurchased($productsArray, $categoryId): int
    {
        $quantity=0;

        /* @var Product $product*/
        foreach ($productsArray as $product) {
            if ($product->category_id == $categoryId) {
                $quantity += $product->pivot->quantity;
            }
        }

        return $quantity;
    }
}
