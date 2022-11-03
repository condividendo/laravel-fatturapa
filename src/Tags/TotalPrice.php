<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TotalPrice extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $totalPrice;

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = sprintf("%.2f",$totalPrice);
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
