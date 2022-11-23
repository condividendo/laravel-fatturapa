<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Description extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $description;

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Descrizione', $this->description);
    }
}
