<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class BackstageItem extends Item
{
    /** @var int */
    private const DOUBLE_QUALITY_INCREASE_SELL_IN_THRESHOLD = 10;
    /** @var int */
    private const TRIPLE_QUALITY_INCREASE_SELL_IN_THRESHOLD = 5;
    /** @var int */
    private const QUALITY_RESET_SELL_IN_THRESHOLD = 0;

    /**
     * BackstageItem Constructor
     * @param ItemName $name
     * @param ItemSellin $sell_in
     * @param ItemQuality $quality
     */
    public function __construct(ItemName $name, ItemSellin $sell_in, ItemQuality $quality)
    {
        parent::__construct($name, $sell_in, $quality);
    }

    /**
     * @return void
     * 
     * @throws Exception
     */
    public function update(): void
    {
        $this->decreaseSellIn();

        $this->increaseQuality();

        if ($this->hasToBeSoldInLessThan(self::DOUBLE_QUALITY_INCREASE_SELL_IN_THRESHOLD)) {
            $this->increaseQuality();
        }

        if ($this->hasToBeSoldInLessThan(self::TRIPLE_QUALITY_INCREASE_SELL_IN_THRESHOLD)) {
            $this->increaseQuality();
        }

        if ($this->hasToBeSoldInLessThan(self::QUALITY_RESET_SELL_IN_THRESHOLD)) {
            $this->resetQuality();
        }
    }
}