<?php

namespace App\Http\Resources;

use App\Models\Entities\Discount;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = Discount::class;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'discountReason' => $this->getDiscountReason(),
            'discountAmount' => $this->getDiscountAmount(),
            'subtotal' => $this->getSubtotal(),
        ];
    }
}
