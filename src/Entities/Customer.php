<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Customer as CustomerTag;
use Condividendo\FatturaPA\Tags\TaxRegime as TaxRegimeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Customer extends AbstractEntity
{
    use Makeable;

    /**
     * @var ?string
     */
    private $companyName;

    /**
     * @var ?string
     */
    private $firstName;

    /**
     * @var ?string
     */
    private $lastName;

    /**
     * @var ?string
     */
    private $title;

    /**
     * @var ?string
     */
    private $fiscalCode;

    /**
     * @var ?string
     */
    private $vatCountryId;

    /**
     * @var ?string
     */
    private $vatNumber;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\TaxRegime
     */
    private $taxRegime;

    /**
     * @var Address
     */
    private $address;


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

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime $taxRegime): self
    {
        $this->taxRegime = $taxRegime;
        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }


    /**
     * @return CustomerTag
     */
    public function getTag()
    {
        $tag = CustomerTag::make()
                ->setAddress($this->address->getTag());
        if ($this->taxRegime) {
            $tag->setTaxRegime($this->taxRegime);
        }
        if ($this->companyName) {
            $tag->setCompanyName($this->companyName);
        }
        if ($this->firstName) {
            $tag->setFirstName($this->firstName);
        }
        if ($this->lastName) {
            $tag->setLastName($this->lastName);
        }
        if ($this->title) {
            $tag->setTitle($this->title);
        }
        if ($this->fiscalCode) {
            $tag->setFiscalCode($this->fiscalCode);
        }
        if ($this->vatCountryId && $this->vatNumber) {
            $tag->setVatNumber($this->vatCountryId, $this->vatNumber);
        }
        return $tag;
    }
}
