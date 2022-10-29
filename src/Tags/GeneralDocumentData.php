<?php

namespace Condividendo\FatturaPA\Tags;

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


    public function setDocumentType(DocumentType $type): self
    {
        $this->type = $type;
        return $this;
    }


    public function setDate(Date $date): self
    {
        $this->date = $date;
        return $this;
    }


    public function setCurrency(Currency $currency): self
    {
        $this->currency = $currency;
        return $this;
    }


    public function setDocumentAmount(DocumentAmount $amount): self
    {
        $this->amount = $amount;
        return $this;
    }


    public function setDocumentDescription(DocumentDescription $description): self
    {
        $this->description = $description;
        return $this;
    }


    public function setDocumentNumber(DocumentNumber $number): self
    {
        $this->number = $number;
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
