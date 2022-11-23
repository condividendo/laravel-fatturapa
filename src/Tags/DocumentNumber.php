<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class DocumentNumber extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $number;

    public function setDocumentNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Numero', $this->number);
    }
}
