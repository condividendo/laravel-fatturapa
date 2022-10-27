<?php

namespace Condividendo\FatturaPA\Tags;

// TODO: <RappresentanteFiscale>

class Supplier extends AbstractTag
{
    /**
     * FatturaElettronicaHeader/CedentePrestatore/DatiAnagrafici
     * @var Condividendo\FatturaPA\Tags\TaxableEntity
     */
    private $taxableEntity;

    /**
     * FatturaElettronicaHeader/CedentePrestatore/Sede
     * @var Condividendo\FatturaPA\Tags\Addresss
     */
    private $address;

    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA
     * @var Condividendo\FatturaPA\Tags\REARegistration
     */
    private $reaRegistration;

    /**
     * FatturaElettronicaHeader/CedentePrestatore/Contatti
     * @var Condividendo\FatturaPA\Tags\Contacts
     */
    private $contacts;

    public function setTaxableEntity(TaxableEntity $e): self
    {
        $this->taxableEntity = $e;
        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function setReaRegistration(REARegistration $reaRegistration): self
    {
        $this->reaRegistration = $reaRegistration;
        return $this;
    }

    public function setContacts(Contacts $contacts): self
    {
        $this->contacts = $contacts;
        return $this;
    }
}
