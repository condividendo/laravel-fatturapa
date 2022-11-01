<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

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
