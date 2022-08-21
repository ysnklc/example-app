<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @param $orderRequest
     * @return array
     */
    public function orderCreate($orderRequest): array
    {
        $items = $orderRequest['item'];
        $stockControl = $this->stockControl($items);

        if (!$stockControl) {
            return [
                'code' => 200,
                'message' => "Stok adedi yetersiz."
            ];
        }

        $total = 0;
        foreach ($items as $item) {
            $total += $item['quantity'] * $item['unit_price'];
        }

        DB::transaction(function () use ($orderRequest, $total, $items) {
            $order = Order::create([
                'customer_id' => $orderRequest['customer_id'],
                'total' => $total
            ]);

            foreach ($items as $item) {
                OrderProduct::create([
                    'product_id' => $item['product_id'],
                    'order_id' => $order->id,
                    'unit_price' => $item['unit_price'],
                    'quantity' => $item['quantity']
                ]);
            }
        });

        return [
            'code' => 200,
            'message' => "Sipariş eklendi."
        ];
    }

    private function stockControl($items)
    {
        foreach ($items as $item) {
            $product = Product::find($item['product_id']);
            if ($product->stock < $item['quantity']) {
                return false;
            }
        }

        return true;
    }
}
