<?php

namespace App\Models\Entities;

use App\Models\Order;

interface IDiscountCalculate
{
    /**
     * @param Order $order
     * @return Discount
     */
    public function calculate(Order $order): Discount;
}
