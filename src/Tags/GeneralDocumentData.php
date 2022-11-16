<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class GeneralDocumentData extends AbstractTag
{
    use Makeable;

    /**
     * @var DocumentType
     */
    private $type;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @var Date
     */
    private $date;

    /**
     * @var DocumentNumber
     */
    private $number;

    /**
     * @var DocumentAmount
     */
    private $amount;

    /**
     * @var DocumentDescription
     */
    private $description;


    public function setType(Type $type): self
    {
        $this->type = DocumentType::make()->setType($type);
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->date = Date::make()->setDate($date);
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = Currency::make()->setCurrency($currency);
        return $this;
    }

    public function setDocumentAmount(BigDecimal $amount): self
    {
        $this->amount = DocumentAmount::make()->setDocumentAmount($amount);
        return $this;
    }

    public function setDocumentDescription(string $description): self
    {
        $this->description = DocumentDescription::make()->setDocumentDescription($description);
        return $this;
    }

    public function setDocumentNumber(string $number): self
    {
        $this->number = DocumentNumber::make()->setDocumentNumber($number);
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiGeneraliDocumento');

        $e->appendChild($this->type->toDOMElement($dom));
        $e->appendChild($this->currency->toDOMElement($dom));
        $e->appendChild($this->date->toDOMElement($dom));
        $e->appendChild($this->number->toDOMElement($dom));
        $e->appendChild($this->amount->toDOMElement($dom));
        $e->appendChild($this->description->toDOMElement($dom));

        return $e;
    }
}
