<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\UnitPrice as UnitPriceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class UnitPrice extends AbstractTag
{
    use Makeable;

    /**
     * @var float
     */
    private $unitPrice;
    
    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return UnitPriceTag
     */
    public function getTag()
    {
        return UnitPriceTag::make();
    }
}
