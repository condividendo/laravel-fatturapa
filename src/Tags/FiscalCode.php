<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class FiscalCode extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $code;

    public function setFiscalCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('CodiceFiscale', $this->code);
    }
}
