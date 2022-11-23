<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigNumber;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Capital extends Tag
{
    use Makeable;

    /**
     * @var \Brick\Math\BigNumber
     */
    private $capital;

    public function setCapital(BigNumber $capital): self
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
