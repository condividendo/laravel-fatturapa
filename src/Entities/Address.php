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
    private $postalCode;

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

    public function postalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

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

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getTag(): AddressTag
    {
        $tag = AddressTag::make()
            ->setAddressLine($this->addressLine)
            ->setCity($this->city)
            ->setPostalCode($this->postalCode)
            ->setProvince($this->provinceOrState)
            ->setCountry($this->country);

        if ($this->streetNumber) {
            $tag->setStreetNumber($this->streetNumber);
        }

        return $tag;
    }
}
