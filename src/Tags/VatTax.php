<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class VatTax extends Tag
{
    use Makeable;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $percentage;

    /**
     * @param \Brick\Math\BigDecimal $ratio Percentage as a ratio between [0,1]
     */
    public function setRate(BigDecimal $ratio): self
    {
        $this->percentage = $ratio;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('AliquotaIVA', $this->percentage->multipliedBy(100));
    }
}
