<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class DefaultItem extends Item
{
    /** @var int */
    private const DOUBLE_QUALITY_DECREASE_SELL_IN_THRESHOLD = 0;

    /**
     * DefaultItem Constructor
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
        $this->decreaseQuality();

        if ($this->hasToBeSoldInLessThan(self::DOUBLE_QUALITY_DECREASE_SELL_IN_THRESHOLD)) {
            $this->decreaseQuality();
        }
    }
}