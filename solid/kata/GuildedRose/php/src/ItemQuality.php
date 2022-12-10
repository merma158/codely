<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class ItemQuality
{
    /** @var int */
    private const MIN_VALUE = 0;

    /** @var int */
    private const MAX_VALUE = 50;

    /** @var int */
    private $value;

    /**
     * ItemQuality Constructor
     * @param int $value
     * 
     * @throws Exception
     */
    public function __construct(int $value)
    {
        if ($value < self::MIN_VALUE || $value > self::MAX_VALUE) {
            throw new Exception('Value out of range. must be between '. self::MIN_VALUE .' and '. self::MAX_VALUE);
        }

        $this->value = $value;
    }

    /**
     * @return ItemQuality
     */
    public function increase(): ItemQuality
    {
        if ($this->value == self::MAX_VALUE) {
            return $this;
        }

        return new ItemQuality($this->value + 1);
    }

    /**
     * @return ItemQuality
     */
    public function decrease(): ItemQuality
    {
        if ($this->value == self::MIN_VALUE) {
            return $this;
        }

        return new ItemQuality($this->value - 1);
    }

    /**
     * @return ItemQuality
     */
    public function reset(): ItemQuality
    {
        return new ItemQuality(self::MIN_VALUE);
    }
}