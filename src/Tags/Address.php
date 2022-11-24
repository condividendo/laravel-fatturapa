<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Address extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\AddressLine
     */
    private $addressLine;

    /**
     * @var \Condividendo\FatturaPA\Tags\StreetNumber
     */
    private $streetNumber;

    /**
     * @var \Condividendo\FatturaPA\Tags\City
     */
    private $city;

    /**
     * @var \Condividendo\FatturaPA\Tags\Zip
     */
    private $zip;

    /**
     * @var \Condividendo\FatturaPA\Tags\ProvinceOrState
     */
    private $provinceOrState;

    /**
     * @var \Condividendo\FatturaPA\Tags\Country
     */
    private $country;

    public function setAddressLine(string $addressLine): self
    {
        $this->addressLine = AddressLine::make()->setAddressLine($addressLine);

        return $this;
    }

    public function setStreetNumber(string $streetNumber): self
    {
        $this->streetNumber = StreetNumber::make()->setStreetNumber($streetNumber);

        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = City::make()->setCity($city);

        return $this;
    }

    public function setPostalCode(string $zip): self
    {
        $this->zip = Zip::make()->setZip($zip);

        return $this;
    }

    public function setProvince(string $province): self
    {
        $this->provinceOrState = ProvinceOrState::make()->setProvinceOrState($province);

        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->country = Country::make()->setCountry($country);

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('Sede');

        $e->appendChild($this->addressLine->toDOMElement($dom));
        $e->appendChild($this->streetNumber->toDOMElement($dom));
        $e->appendChild($this->zip->toDOMElement($dom));
        $e->appendChild($this->city->toDOMElement($dom));
        $e->appendChild($this->provinceOrState->toDOMElement($dom));
        $e->appendChild($this->country->toDOMElement($dom));

        return $e;
    }
}
