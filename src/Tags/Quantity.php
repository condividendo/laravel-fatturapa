<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Quantity extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $quantity;

    public function setQuantity(int $qty): self
    {
        $this->quantity = sprintf("%.2f",$qty);
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
