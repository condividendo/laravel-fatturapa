<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class OfficeCode extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $code;

    public function setOfficeCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Ufficio', $this->code);
    }
}
