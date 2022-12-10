<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\ItemFactory;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $item = ItemFactory::makeItem('foo', 1, 0);
        $items = array($item);
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame('foo, 0, 0', $items[0]->__toString()); // Decrementa en 1 para DefaultItem
    }
}
