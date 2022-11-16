<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class UnitPrice extends AbstractTag
{
    use Makeable;

    /**
     * @var BigDecimal
     */
    private $unitPrice;

    public function setUnitPrice(BigDecimal $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('PrezzoUnitario', $this->unitPrice);
    }
}
