<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TaxableAmount extends AbstractTag
{
    use Makeable;

    /**
     * @var BigDecimal
     */
    private $amount;

    public function setAmount(BigDecimal $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('ImponibileImporto', $this->amount);
    }
}
