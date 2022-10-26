<?php
namespace Condividendo\FatturaPA\Tags;

class Address
{
	
	const DEFAULT_ZIP = "00000";
        
    /**
     * Sede/Indirizzo
     * @var string
     */
    private $street;
    
    /**
     * Sede/NumeroCivico
     * @var string
     */
    private $streetNumber;
    
    /**
     * Sede/CAP
     * @var string
     */
    private $zip;
    
    /**
     * Sede/Comune
     * @var string
     */
    private $city;
    
    /**
     * Sede/Provincia
     * @var string
     */
    private $provinceOrState;
    
    /**
     * Sede/Nazione
     * @var string
     */
    private $countryCode;
        
	
    public static function make() : self { return new self(); }	
	

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function setStreetNumber(string $number): self
    {
        $this->streetNumber = $number;
        return $this;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    public function setProvinceOrState(string $provinceOrState): self
    {
        $this->provinceOrState = $provinceOrState;
        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<Sede>\r\n" .
					"$tabs\t\t<Indirizzo>$this->street</Indirizzo>\r\n" .
					"$tabs\t\t<NumeroCivico>$this->streetNumber</NumeroCivico>\r\n" .
					"$tabs\t\t<CAP>$this->zip</CAP>\r\n" .
					($this->city ? "$tabs\t\t<Comune>$this->city</Comune>\r\n" : "") .
					($this->provinceOrState ? "$tabs\t\t<Provincia>$this->provinceOrState</Provincia>\r\n" : "").
					"$tabs\t\t<Nazione>$this->countryCode</Nazione>\r\n" .
				"$tabs\t</Sede>";
	}

}
