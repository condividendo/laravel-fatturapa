<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TransmitterId extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\CountryId
     */
    private $countryId;

    /**
     * @var \Condividendo\FatturaPA\Tags\CodeId
     */
    private $codeId;

    public function setCountryId(CountryId $id): self
    {
        $this->countryId = $id;

        return $this;
    }

    public function setCodeId(CodeId $id): self
    {
        $this->codeId = $id;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('IdTrasmittente');

        $e->appendChild($this->countryId->toDOMElement($dom));
        $e->appendChild($this->codeId->toDOMElement($dom));

        return $e;
    }
}
