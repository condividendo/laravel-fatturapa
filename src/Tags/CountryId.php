<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class CountryId extends AbstractTag
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
        return $dom->createElement('IdPaese', $this->id);
    }
}
