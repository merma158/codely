<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /** @var string */
    private const AGED_BRIE = 'Aged Brie';

    /** @var string */
    private const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';

    /** @var string */
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if (in_array($item->name, [self::AGED_BRIE, self::BACKSTAGE])) {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1; // Se incrementa quality siempre que sea menor a 50 al menos una vez para el caso de AgedBrieItem y BackstageItem
                    if ($item->name == self::BACKSTAGE) {
                        if ($item->sell_in < 11) { // Para caso de Backstage se incrementa doble si sellIn menor a 11
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sell_in < 6) { // Para caso de Backstage se incrementa triple si sellIn es menor a 6
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            } else {
                if ($item->quality > 0) { // Por defecto si quality mayor a 0 entonces decrementa en 1, para caso de DefaultItem
                    if ($item->name != self::SULFURAS) {
                        $item->quality = $item->quality - 1;
                    }
                }
            }

            // Decrementa SELL IN si no es sulfuras siempre una vez al actualizar/update
            if ($item->name != self::SULFURAS) {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                // Si sellIn es menor a cero y quality no ha llegado a 50 se incrementa para el caso de AgedBrieItem
                if ($item->name == self::AGED_BRIE) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                } else {
                    // Si sellIn es menor a cero se decrementa quality por el valor del mismo queda en 0 (cero) para el caso de BackstageItem
                    if ($item->name == self::BACKSTAGE) {
                        $item->quality = $item->quality - $item->quality;
                    } else {
                        if ($item->quality > 0) { // Si sellIn es menor a cero y quality mayor a cero, quality se decrementa en 1 para caso de DefaultItem
                            if ($item->name != self::SULFURAS) {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    }
                }
            }
        }
    }
}
