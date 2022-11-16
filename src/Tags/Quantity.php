<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Quantity extends AbstractTag
{
    use Makeable;

    /**
     * @var BigDecimal
     */
    private $quantity;

    public function setQuantity(BigDecimal $qty): self
    {
        $this->quantity = $qty;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Quantita', $this->quantity);
    }
}
