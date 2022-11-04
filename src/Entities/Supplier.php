<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Supplier extends AbstractEntity
{
    use Makeable;

    /**
     * @var string
     */
    private $companyName;
    
    /**
     * @var ?string
     */
    private $fiscalCode;

    /**
     * @var string
     */
    private $vatCountryId;

    /**
     * @var string
     */
    private $vatNumber;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\TaxRegime
     */
    private $taxRegime;

    /**
     * @var ?REARegistration
     */
    private $reaRegistration;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var ?Contacts
     */
    private $contacts;


    public function setName(string $name): self
    {
        return $this->setCompanyName($name);
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function setVatNumber(string $countryId, string $vatNumber): self
    {
        $this->vatCountryId = $countryId;
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function setFiscalCode(string $fiscalCode): self
    {
        $this->fiscalCode = $fiscalCode;
        return $this;
    }

    public function setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime $taxRegime): self
    {
        $this->taxRegime = $taxRegime;
        return $this;
    }

    public function setREARegistration(REARegistration $reaRegistration): self
    {
        $this->reaRegistration = $reaRegistration;
        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function setContacts(Contacts $contacts): self
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return SupplierTag
     */
    public function getTag()
    {
        $tag = SupplierTag::make()
                ->setVatNumber($this->vatCountryId, $this->vatNumber)
                ->setTaxRegime($this->taxRegime ?: \Condividendo\FatturaPA\Enums\TaxRegime::RF01())
                ->setCompanyName($this->companyName)
                ->setAddress($this->address);
        if($this->fiscalCode){
            $tag->setFiscalCode($this->fiscalCode);
        }
        if($this->reaRegistration){
            $tag->setREARegistration($this->reaRegistration->getTag());
        }
        if($this->contacts){
            $tag->setContacts($this->contacts);
        }
        return $tag;
    }
    
}
