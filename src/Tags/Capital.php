<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Capital extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $capital;

    public function setCapital(float $capital): self
    {
        $this->capital = sprintf("%.2f", $capital);
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('CapitaleSociale', $this->capital);
    }
}
