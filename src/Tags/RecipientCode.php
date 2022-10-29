<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class RecipientCode extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $code;

    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('CodiceDestinatario', $this->code);
    }
}
