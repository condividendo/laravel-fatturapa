<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Currency extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $currency;

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Divisa', $this->currency);
    }
}
