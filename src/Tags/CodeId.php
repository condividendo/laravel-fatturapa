<?php

namespace Condividendo\FatturaPA\Tags;

use DOMDocument;
use DOMElement;

class CodeId extends AbstractTag
{
    /**
     * @var string
     */
    private $id;

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('IdCodice', $this->id);
    }
}
