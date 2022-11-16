<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TotalPrice extends AbstractTag
{
    use Makeable;

    /**
     * @var BigDecimal
     */
    private $totalPrice;

    public function setTotalPrice(BigDecimal $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('PrezzoTotale', $this->totalPrice);
    }
}
