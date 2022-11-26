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
     * @var ?string
     */
    private $streetNumber = null;

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

    public function addressLine(string $addressLine): self
    {
        $this->addressLine = $addressLine;

        return $this;
    }

    public function streetNumber(string $streetNumber): self
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function city(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function postalCode(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function province(string $province): self
    {
        $this->provinceOrState = $province;

        return $this;
    }

    public function country(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTag(): AddressTag
    {
        $tag = AddressTag::make()
            ->setAddressLine($this->addressLine)
            ->setCity($this->city)
            ->setPostalCode(strtoupper(substr($this->country, 0, 2)) === "IT" ? $this->zip : "00000")
            ->setProvince($this->provinceOrState)
            ->setCountry($this->country);

        if ($this->streetNumber) {
            $tag->setStreetNumber($this->streetNumber);
        }

        return $tag;
    }
}
