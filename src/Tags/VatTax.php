<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class VatTax extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $percentage;

    /**
     * @param float $ratio Percentage as a ratio between [0,1]
     */
    public function setRate(float $ratio): self
    {
        $this->percentage = sprintf("%.2f", max(0, min(100, 100 * $ratio)));
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
