<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

final class ItemName
{
    /** @var string */
    private const AGED_BRIE = 'Aged Brie';

    /** @var string */
    private const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';

    /** @var string */
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    /** @var string */
    private $name;

    /**
     * ItemName Constructor
     * @param string $name
     * 
     * @throws Exception
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isAgedBrie(): bool
    {
        return $this->name === self::AGED_BRIE;
    }

    /**
     * @return bool
     */
    public function isBackstagePasses(): bool
    {
        return $this->name === self::BACKSTAGE;
    }

    /**
     * @return bool
     */
    public function isSulfuras(): bool
    {
        return $this->name === self::SULFURAS;
    }
}