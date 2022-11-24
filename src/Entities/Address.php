<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\Address as AddressTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Address extends Entity
{
    use Makeable;

    /**
     * @var string
     */
    private $addressLine;

    /**
     * @var string
     */
    private $streetNumber;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $provinceOrState;

    /**
     * @var string
     */
    private $country;

    public function setAddressLine(string $addressLine): self
    {
        $this->addressLine = $addressLine;

        return $this;
    }

    public function setStreetNumber(string $streetNumber): self
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function setPostalCode(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function setProvince(string $province): self
    {
        $this->provinceOrState = $province;

        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTag(): AddressTag
    {
        return AddressTag::make()
            ->setAddressLine($this->addressLine)
            ->setStreetNumber($this->streetNumber)
            ->setCity($this->city)
            ->setPostalCode(strtoupper(substr($this->country, 0, 2)) === "IT" ? $this->zip : "00000")
            ->setProvince($this->provinceOrState)
            ->setCountry($this->country);
    }
}
