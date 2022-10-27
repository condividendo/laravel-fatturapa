<?php
namespace Condividendo\FatturaPA\Tags;

class Customer extends AbstractTag
{
    // TODO: RappresentanteFiscale

    /**
     * FatturaElettronicaHeader/CessionarioCommittente/DatiAnagrafici
     * @var Condividendo\FatturaPA\Tags\TaxableEntity
     */
    private $taxableEntity;

    /**
     * FatturaElettronicaHeader/CessionarioCommittente/Sede
     * @var Condividendo\FatturaPA\Tags\Address
     */
    private $address;

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function setTaxableEntity(TaxableEntity $taxableEntity): self
    {
        $this->taxableEntity = $taxableEntity;
        return $this;
    }

	/*
    public function setFirstName(string $name): self
    {
        $this->taxableEntity->setFirstName($name)));
        return $this;
    }

    public function setLastName(string $name): self
    {
        $this->taxableEntity->setLastName($name)));
        return $this;
    }

    public function setFiscalCode(string $code): self
    {
        $this->taxableEntity->setFiscalCode($code)));
        return $this;
    }
    */

}
