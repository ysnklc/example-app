<?php

namespace App\Models\Entities;

class DiscountsResponse
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @var array|null
     */
    private $discounts;

    /**
     * @var float
     */
    private $totalDiscount;

    /**
     * @var float
     */
    private $discountedTotal;

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return array|null
     */
    public function getDiscounts(): ?array
    {
        return $this->discounts;
    }

    /**
     * @param array|null $discounts
     */
    public function setDiscounts(?array $discounts): void
    {
        $this->discounts = $discounts;
    }

    /**
     * @return float
     */
    public function getTotalDiscount(): float
    {
        return $this->totalDiscount;
    }

    /**
     * @param float $totalDiscount
     */
    public function setTotalDiscount(float $totalDiscount): void
    {
        $this->totalDiscount = $totalDiscount;
    }

    /**
     * @return float
     */
    public function getDiscountedTotal(): float
    {
        return $this->discountedTotal;
    }

    /**
     * @param float $discountedTotal
     */
    public function setDiscountedTotal(float $discountedTotal): void
    {
        $this->discountedTotal = $discountedTotal;
    }

    /**
     * @return Discount[]
     */
    public function addDiscount(Discount $discount): array
    {
        $this->discounts[] = $discount;

        return $this->discounts;

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
