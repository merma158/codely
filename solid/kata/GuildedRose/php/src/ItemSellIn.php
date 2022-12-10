<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class ItemSellin
{
    /** @var int */
    private $value;

    /**
     * ItemSellin Constructor
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->value;
    }

    /**
     * @return ItemSellIn
     */
    public function decrease(): ItemSellIn
    {
        return new ItemSellIn($this->value - 1);
    }

    /**
     * @return bool
     */
    public function isLessThan(int $days): bool
    {
        return $this->value < $days;
    }
}