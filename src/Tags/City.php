<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class City extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $city;

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Comune', $this->city);
    }
}
