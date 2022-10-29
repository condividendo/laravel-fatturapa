<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class DocumentAmount extends AbstractTag
{
    use Makeable;

    /**
     * @var float
     */
    private $amount;

    public function setDescription(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('ImportoTotaleDocumento', $this->amount);
    }
}
