<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\TaxRegime;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Customer extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\TaxableEntity
     */
    private $taxableEntity;

    /**
     * @var \Condividendo\FatturaPA\Tags\Address
     */
    private $address;

    public function __construct()
    {
        $this->taxableEntity = TaxableEntity::make();
    }

    public function setCompanyName(string $name): self
    {
        $this->taxableEntity->setCompanyName($name);

        return $this;
    }

    public function setVatNumber(string $countryCode, string $vatNumber): self
    {
        $this->taxableEntity->setVatNumber($countryCode, $vatNumber);

        return $this;
    }

    public function setFiscalCode(string $code): self
    {
        $this->taxableEntity->setFiscalCode($code);

        return $this;
    }

    public function setFirstName(string $name): self
    {
        $this->taxableEntity->setFirstName($name);

        return $this;
    }

    public function setLastName(string $name): self
    {
        $this->taxableEntity->setLastName($name);

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->taxableEntity->setTitle($title);

        return $this;
    }

    public function setTaxRegime(TaxRegime $taxRegime): self
    {
        $this->taxableEntity->setTaxRegime($taxRegime);

        return $this;
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
