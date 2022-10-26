<?php
namespace Condividendo\FatturaPA\Tags;

class REARegistration
{
        
    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA/Ufficio
     * @var string
     */
    private $officeCode;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA/NumeroREA
     * @var string
     */
    private $reaNumber;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA/CapitaleSociale
     * @var float
     */
    private $capital;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA/SocioUnico
     * @var string
     */
    private $shareholders;
    
    /**
     * FatturaElettronicaHeader/CedentePrestatore/IscrizioneREA/StatoLiquidazione
     * @var string
     */
    private $liquidation;
    
    
    
	
    public static function make() : self { return new self(); }	
	

    public function setOfficeCode(string $code): self
    {
        $this->officeCode = $code;
        return $this;
    }

    public function setReaNumber(string $number): self
    {
        $this->reaNumber = $number;
        return $this;
    }

    public function setCapital(float $capital): self
    {
        $this->capital = $capital;
        return $this;
    }

    public function setShareholders(string $shareholders): self
    {
        $this->shareholders = $shareholders;
        return $this;
    }

    public function setLiquidation(string $liquidation): self
    {
        $this->liquidation = $liquidation;
        return $this;
    }
    
    public function getTags(string $tabs){
		if(!$this->reaNumber) return "";
		return  "$tabs\t<IscrizioneREA>\r\n" .
					"$tabs\t\t<Ufficio>$this->officeCode</Ufficio>\r\n" .
					"$tabs\t\t<NumeroREA>$this->reaNumber</NumeroREA>\r\n" .
					($this->capital ? "$tabs\t\t<CapitaleSociale>$this->capital</CapitaleSociale>\r\n" : "") .
					($this->shareholders ? "$tabs\t\t<SocioUnico>$this->shareholders</SocioUnico>\r\n" : "") .
					"$tabs\t\t<StatoLiquidazione>$this->liquidation</StatoLiquidazione>\r\n" .
				"$tabs\t</IscrizioneREA>";
	}
    

}
