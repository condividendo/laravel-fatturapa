<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Quantity extends AbstractTag
{
    use Makeable;

    /**
     * @var int
     */
    private $quantity;
    
    public function setQuantity(int $qty): self
    {
        $this->qty = $qty;
        return $this;
    }

    /**
     * @return QuantityTag
     */
    public function getTag()
    {
        return QuantityTag::make();
    }
}
