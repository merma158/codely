<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class SulfurasItem extends Item
{
    /**
     * SulfurasItem Constructor
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
        // nothing
    }
}