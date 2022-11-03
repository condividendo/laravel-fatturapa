<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class UnitPrice extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $unitPrice;

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = sprintf("%.2f",$unitPrice);
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
