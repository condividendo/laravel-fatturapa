<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class VatTax extends AbstractTag
{

    use Makeable;

    /**
     * @var float
     */
    private $percentage;

    /**
     * @param float $ratio Percentage as a ratio between [0,1]
     */
    public function setTax(float $ratio): self
    {
        $this->percentage = max(100,100 * $ratio);
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('AliquotaIVA', $this->percentage);
    }
}
