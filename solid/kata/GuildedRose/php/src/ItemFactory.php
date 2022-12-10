<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class ItemFactory
{
    /**
     * @return Item
     * 
     * @throws Exception
     */
    public static function makeItem(string $name, int $sell_in, int $quality): Item
    {
        /** @var ItemName */
        $itemName = new ItemName($name);
        /** @var ItemSellin */
        $itemSellin = new ItemSellin($sell_in);
        /** @var ItemQuality */
        $itemQuality = new ItemQuality($quality);

        if ($itemName->isAgedBrie()) {
            return new AgedBrieItem($itemName, $itemSellin, $itemQuality);
        } elseif ($itemName->isBackstagePasses()) {
            return new BackstageItem($itemName, $itemSellin, $itemQuality);
        } elseif ($itemName->isSulfuras()) {
            return new SulfurasItem($itemName, $itemSellin, $itemQuality);
        } else {
            return new DefaultItem($itemName, $itemSellin, $itemQuality);
        }
    }
}