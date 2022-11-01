<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Quantity as QuantityTag;
use Condividendo\FatturaPA\Traits\Makeable;

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
