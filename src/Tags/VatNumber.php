<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class VatNumber extends AbstractTag
{
    use Makeable;

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
        $e = $dom->createElement('IdFiscaleIVA');

        $e->appendChild($this->countryId->toDOMElement($dom));
        $e->appendChild($this->codeId->toDOMElement($dom));

        return $e;
    }
}
