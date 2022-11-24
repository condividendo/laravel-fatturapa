<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Enums\LiquidationStatus;
use Condividendo\FatturaPA\Enums\ShareHolder;
use Condividendo\FatturaPA\Enums\TaxRegime;
use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Tags\REARegistration as REARegistrationTag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;
use Condividendo\FatturaPA\Traits\Makeable;
use Condividendo\FatturaPA\Traits\UsesDecimal;
use RuntimeException;

class Supplier extends Entity
{
    use Makeable;
    use UsesDecimal;

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
     * @var \Condividendo\FatturaPA\Enums\TaxRegime
     */
    private $taxRegime;

    /**
     * @var ?string
     */
    private $reaOfficeCode = null;

    /**
     * @var ?string
     */
    private $reaNumber = null;

    /**
     * @var ?\Brick\Math\BigDecimal
     */
    private $reaCapital = null;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\ShareHolder
     */
    private $reaShareHolders = null;

    /**
     * @var ?\Condividendo\FatturaPA\Enums\LiquidationStatus
     */
    private $reaLiquidationStatus = null;

    /**
     * @var \Condividendo\FatturaPA\Entities\Address
     */
    private $address;

    /**
     * @var ?string
     */
    private $contactsEmail = null;

    /**
     * @var ?string
     */
    private $contactsFax = null;

    /**
     * @var ?string
     */
    private $contactsPhoneNumber = null;

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

    public function setTaxRegime(TaxRegime $taxRegime): self
    {
        $this->taxRegime = $taxRegime;

        return $this;
    }

    public function setREAOfficeCode(string $officeCode): self
    {
        $this->reaOfficeCode = $officeCode;

        return $this;
    }

    public function setREANumber(string $reaNumber): self
    {
        $this->reaNumber = $reaNumber;

        return $this;
    }

    /**
     * @param string|\Brick\Math\BigDecimal $capital
     * @return $this
     */
    public function setREACapital($capital): self
    {
        $this->reaCapital = static::makeDecimal($capital);

        return $this;
    }

    public function setREAShareHolders(ShareHolder $shareHolders): self
    {
        $this->reaShareHolders = $shareHolders;

        return $this;
    }

    public function setREALiquidationStatus(LiquidationStatus $liquidationStatus): self
    {
        $this->reaLiquidationStatus = $liquidationStatus;

        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function setContactsEmail(string $email): self
    {
        $this->contactsEmail = $email;

        return $this;
    }

    public function setContactsFax(string $fax): self
    {
        $this->contactsFax = $fax;

        return $this;
    }

    public function setContactsPhoneNumber(string $number): self
    {
        $this->contactsPhoneNumber = $number;

        return $this;
    }

    public function getTag(): SupplierTag
    {
        $tag = SupplierTag::make()
            ->setVatNumber($this->vatCountryId, $this->vatNumber)
            ->setTaxRegime($this->taxRegime)
            ->setCompanyName($this->companyName)
            ->setAddress($this->address->getTag());

        if ($this->fiscalCode) {
            $tag->setFiscalCode($this->fiscalCode);
        }

        $reaTag = $this->getREARegistrationTag();

        if ($reaTag) {
            $tag->setREARegistration($reaTag);
        }

        $contactsTag = $this->getContactsTag();

        if ($contactsTag) {
            $tag->setContacts($contactsTag);
        }

        return $tag;
    }

    public function getREARegistrationTag(): ?REARegistrationTag
    {
        if (!$this->reaOfficeCode) {
            return null;
        }

        if (!$this->reaNumber || !$this->reaLiquidationStatus) {
            throw new RuntimeException("'reaNumber' and 'reaLiquidationStatus' cannot be null!");
        }

        $tag = REARegistrationTag::make()
            ->setOfficeCode($this->reaOfficeCode)
            ->setREANumber($this->reaNumber)
            ->setLiquidationStatus($this->reaLiquidationStatus);

        if ($this->reaCapital) {
            $tag->setCapital($this->reaCapital);
        }

        if ($this->reaShareHolders) {
            $tag->setShareHolders($this->reaShareHolders);
        }

        return $tag;
    }

    public function getContactsTag(): ?ContactsTag
    {
        if (!$this->contactsEmail && !$this->contactsFax && !$this->contactsPhoneNumber) {
            return null;
        }

        $tag = ContactsTag::make();

        if ($this->contactsEmail) {
            $tag->setEmail($this->contactsEmail);
        }

        if ($this->contactsFax) {
            $tag->setFax($this->contactsFax);
        }

        if ($this->contactsPhoneNumber) {
            $tag->setPhone($this->contactsPhoneNumber);
        }

        return $tag;
    }
}
