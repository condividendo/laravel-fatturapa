<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class GeneralData extends AbstractTag
{

    use Makeable;

    /**
     * @var GeneralDocumentData
     */
    private $generalDocumentData;


    public function setGeneralDocumentData(GeneralDocumentData $generalDocumentData): self
    {
        $this->generalDocumentData = $generalDocumentData;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiGenerali');

        $e->appendChild($this->generalDocumentData->toDOMElement($dom));

        return $e;
    }
}
