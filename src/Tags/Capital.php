<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Capital extends AbstractTag
{
    use Makeable;

    /**
     * @var float
     */
    private $capital;

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;
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
