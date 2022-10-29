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
