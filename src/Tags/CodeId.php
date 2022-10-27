<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class CodeId extends AbstractTag
{
    use Makeable;

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
