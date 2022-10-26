<?php
namespace Condividendo\FatturaPA\Tags;

class TransmitterId
{
	
	const DEFAULT_COUNTRY_CODE = "IT";
	
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente/IdPaese
     * @var string
     */
    private $countryCode;
    
    /**
     * FatturaElettronicaHeader/DatiTrasmissione/IdTrasmittente/IdCodice
     * @var string
     */
    private $code;
    
    function __construct(){
		$this->countryCode = self::DEFAULT_COUNTRY_CODE;
	}
    
    public static function make() : self { return new self(); }
    
    
    public function setCountryCode(string $code): self
    {
        $this->countryCode = $code;
        return $this;
    }
    
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    
    public function getTags(string $tabs){
		return  "$tabs\t<IdTrasmittente>\r\n" .
					"$tabs\t\t<IdPaese>$this->countryCode</IdPaese>\r\n" .
					"$tabs\t\t<IdCodice>$this->code</IdCodice>\r\n" .
				"$tabs\t</IdTrasmittente>";
	}
	
}
