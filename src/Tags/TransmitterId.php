<?php

namespace Condividendo\FatturaPA\Tags;

use DOMDocument;
use DOMElement;

class TransmitterId extends AbstractTag
{
    /**
     * @var CountryId
     */
    private $countryId;

    /**
     * @var CodeId
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
