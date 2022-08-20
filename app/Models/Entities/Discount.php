<?php

namespace App\Models\Entities;

class Discount
{
    /**
     * @var string
     */
    private $discountReason;

    /**
     * @var float
     */
    private $discountAmount;

    /**
     * @var float
     */
    private $subtotal;

    /**
     * @return string
     */
    public function getDiscountReason(): string
    {
        return $this->discountReason;
    }

    /**
     * @param string $discountReason
     */
    public function setDiscountReason(string $discountReason): void
    {
        $this->discountReason = $discountReason;
    }

    /**
     * @return float
     */
    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }

    /**
     * @param float $discountAmount
     */
    public function setDiscountAmount(float $discountAmount): void
    {
        $this->discountAmount = $discountAmount;
    }

    /**
     * @return float
     */
    public function getSubtotal(): float
    {
        return $this->subtotal;
    }

    /**
     * @param float $subtotal
     */
    public function setSubtotal(float $subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @return false|string
     */
    public function toJson(): bool|string
    {
        return json_encode($this->toArray());
    }
}
