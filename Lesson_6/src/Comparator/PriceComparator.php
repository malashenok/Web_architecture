<?php


namespace Comparator;

use Comparator\Contract\ComparatorInterface;
use Model\Entity\Product;

class PriceComparator implements ComparatorInterface
{

    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }

}