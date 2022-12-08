<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Capital extends Tag
{
    use Makeable;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $capital;

    public function setCapital(BigDecimal $capital): self
    {
        static::checkScale($capital);

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
