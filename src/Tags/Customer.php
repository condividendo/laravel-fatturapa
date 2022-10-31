<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Customer extends AbstractTag
{

    use Makeable;

    /**
     * @var TaxableEntity
     */
    private $taxableEntity;
    
    /**
     * @var Address
     */
    private $address;


    function __construct(){
        $this->taxableEntity = TaxableEntity::make();
    }


    public function setCompanyName(string $name){
        $this->taxableEntity->setCompanyName($name);
    }

    public function setVatNumber(string $countryCode,string $vatNumber){
        $this->taxableEntity->setVatNumber($countryCode,$vatNumber);
    }

    public function setFiscalCode(string $code){
        $this->taxableEntity->setFiscalCode($code);
    }

    public function setFirstName(string $name){
        $this->taxableEntity->setFirstName($name);
    }

    public function setLastName(string $name){
        $this->taxableEntity->setLastName($name);
    }

    public function setTitle(string $title){
        $this->taxableEntity->setTitle($title);
    }


    public function setTaxableEntity(TaxableEntity $taxableEntity): self
    {
        $this->taxableEntity = $taxableEntity;
        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('CessionarioCommittente');

        $e->appendChild($this->taxableEntity->toDOMElement($dom));
        $e->appendChild($this->address->toDOMElement($dom));

        return $e;
    }
}
