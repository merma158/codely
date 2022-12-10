<?php

declare(strict_types=1);

namespace GildedRose;

use Exception;

abstract class Item
{
    /**
     * @var ItemName
     */
    private $name;

    /**
     * @var ItemSellin
     */
    public $sellIn;

    /**
     * @var ItemQuality
     */
    public $quality;

    public function __construct(ItemName $name, ItemSellin $sell_in, ItemQuality $quality)
    {
        $this->name = $name;
        $this->sellIn = $sell_in;
        $this->quality = $quality;
    }

    /**
     * @return void
     * 
     * @throws Exception
     */
    abstract function update(): void;

    /**
     * @return ItemSellIn
     */
    public function sellIn(): ItemSellIn
    {
        return $this->sellIn;
    }

    /**
     * @return ItemQuality
     */
    public function quality(): ItemQuality
    {
        return $this->quality;
    }

    /**
     * @return void
     */
    public function decreaseSellIn(): void
    {
        $this->sellIn = $this->sellIn->decrease();
    }

    /**
     * @param int $days
     * @return bool
     */
    public function hasToBeSoldInLessThan(int $days): bool
    {
        return $this->sellIn->isLessThan($days);
    }

    /**
     * @return void
     */
    public function increaseQuality(): void
    {
        $quality = $this->quality->increase();
    }

    /**
     * @return void
     */
    public function decreaseQuality(): void
    {
        $this->quality = $this->quality->decrease();
    }

    /**
     * @return void
     */
    public function resetQuality(): void
    {
        $this->quality = $this->quality->reset();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->name->getName()}, {$this->sellIn->getQuantity()}, {$this->quality}";
    }
}
