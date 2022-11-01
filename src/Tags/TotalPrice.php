<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TotalPrice as TotalPriceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TotalPrice extends AbstractTag
{
    use Makeable;

    /**
     * @var float
     */
    private $totalPrice;
    
    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    /**
     * @return TotalPriceTag
     */
    public function getTag()
    {
        return TotalPriceTag::make();
    }
}
