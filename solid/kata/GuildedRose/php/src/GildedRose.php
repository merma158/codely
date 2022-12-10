<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    /**
     * GildedRose Constructor
     * @param array<Item> $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        /** @var Item */
        foreach ($this->items as $item) {
            $item->update();
        }
    }
}
