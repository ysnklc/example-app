<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderPorduct = new OrderProduct();
        $orderPorduct->product_id = 1;
        $orderPorduct->order_id = 1;
        $orderPorduct->unit_price = 500;
        $orderPorduct->discount = 200;
        $orderPorduct->quantity = 4;
        $orderPorduct->save();

        $orderPorduct2 = new OrderProduct();
        $orderPorduct2->product_id = 4;
        $orderPorduct2->order_id = 1;
        $orderPorduct2->unit_price = 50;
        $orderPorduct2->discount = 50;
        $orderPorduct2->quantity = 6;
        $orderPorduct2->save();

        $orderPorduct2 = new OrderProduct();
        $orderPorduct2->product_id = 2;
        $orderPorduct2->order_id = 2;
        $orderPorduct2->unit_price = 100;
        $orderPorduct2->discount = 20;
        $orderPorduct2->quantity = 1;
        $orderPorduct2->save();

        $orderPorduct3 = new OrderProduct();
        $orderPorduct3->product_id = 3;
        $orderPorduct3->order_id = 2;
        $orderPorduct3->unit_price = 150;
        $orderPorduct3->discount = 0;
        $orderPorduct3->quantity = 2;
        $orderPorduct3->save();
    }
}
