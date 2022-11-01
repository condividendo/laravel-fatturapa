<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Address extends AbstractTag
{
    use Makeable;

    /**
     * @var Street
     */
    private $street;

    /**
     * @var StreetNumber
     */
    private $streetNumber;

    /**
     * @var City
     */
    private $city;

    /**
     * @var Zip
     */
    private $zip;

    /**
     * @var ProvinceOrState
     */
    private $provinceOrState;

    /**
     * @var Country
     */
    private $country;


    public function setStreet(string $street): self
    {
        $this->street = Street::make()->setStreet($street);
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

        $e->appendChild($this->street->toDOMElement($dom));
        $e->appendChild($this->streetNumber->toDOMElement($dom));
        $e->appendChild($this->city->toDOMElement($dom));
        $e->appendChild($this->zip->toDOMElement($dom));
        $e->appendChild($this->provinceOrState->toDOMElement($dom));
        $e->appendChild($this->country->toDOMElement($dom));

        return $e;
    }
}
