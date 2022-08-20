<?php

namespace App\Http\Resources;

use App\Models\Entities\DiscountsResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResponseResource extends JsonResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DiscountsResponse::class;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'orderId' => $this->getOrderId(),
            'discounts' => DiscountResource::collection($this->getDiscounts()),
            'totalDiscount' => $this->getTotalDiscount(),
            'discountedTotal' => $this->getDiscountedTotal(),
        ];
    }
}
