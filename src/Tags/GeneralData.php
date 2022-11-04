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


    public function setType(\Condividendo\FatturaPA\Enums\Type $type): self
    {
        $this->generalDocumentData->setType($type);
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->generalDocumentData->setDate($date);
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->generalDocumentData->setCurrency($currency);
        return $this;
    }

    public function setDocumentAmount(float $amount): self
    {
        $this->generalDocumentData->setDocumentAmount($amount);
        return $this;
    }

    public function setDocumentDescription(string $description): self
    {
        $this->generalDocumentData->setDocumentDescription($description);
        return $this;
    }

    public function setDocumentNumber(string $number): self
    {
        $this->generalDocumentData->setDocumentNumber($number);
        return $this;
    }

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
