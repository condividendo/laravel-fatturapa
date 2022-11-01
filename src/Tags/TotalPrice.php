<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

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
