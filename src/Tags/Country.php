<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Country extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $country;

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Nazione', $this->country);
    }
}
