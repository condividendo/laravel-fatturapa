<?php

namespace Condividendo\FatturaPA\Tags;

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


    public function setStreet(Street $street): self
    {
        $this->street = $street;
        return $this;
    }


    public function setStreetNumber(Street $streetNumber): self
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }


    public function setCity(City $city): self
    {
        $this->city = $city;
        return $this;
    }


    public function setZip(Zip $zip): self
    {
        $this->zip = $zip;
        return $this;
    }


    public function setProvinceOrState(ProvinceOrState $provinceOrState): self
    {
        $this->provinceOrState = $provinceOrState;
        return $this;
    }


    public function setCountry(Country $country): self
    {
        $this->country = $country;
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

