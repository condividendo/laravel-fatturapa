<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Street extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $street;

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Indirizzo', $this->street);
    }
}
