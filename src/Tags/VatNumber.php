<?php
namespace Condividendo\FatturaPA\Tags;

class VatNumber
{
    
    /**
     * DatiAnagrafici/IdFiscaleIVA/IdPaese
     * @var string
     */
    private $countryCode = "IT";    
    
    /**
     * DatiAnagrafici/IdFiscaleIVA/IdCodice
     * @var string
     */
    private $vat;
	
	
    public static function make() : self { return new self(); }	
	

    public function setCountryCode(string $code): self
    {
        $this->countryCode = $code;
        return $this;
    }

    public function setVat(string $vat): self
    {
        $this->vat = $vat;
        return $this;
    }
    
    public function getTags(string $tabs){
		return $this->vat ? 
				"$tabs\t<IdFiscaleIVA>\r\n" .
					"$tabs\t\t<IdPaese>$this->countryCode</IdPaese>\r\n" .
					"$tabs\t\t<IdCodice>$this->vat</IdCodice>\r\n" .
				"$tabs\t</IdFiscaleIVA>"
				: "";
	}

}
