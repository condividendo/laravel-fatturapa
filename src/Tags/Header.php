<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Header extends AbstractTag
{
    use Makeable;

    /**
     * @var TransmissionData
     */
    private $transmissionData;

    public function setTransmissionData(TransmissionData $data): self
    {
        $this->transmissionData = $data;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('FatturaElettronicaHeader');

        $e->appendChild($this->transmissionData->toDOMElement($dom));

        return $e;
    }
}
