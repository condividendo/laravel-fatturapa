<?php
namespace Condividendo\FatturaPA\Tags;

class TaxableEntity
{
	
	const DEFAULT_TAX_REGIME = \Condividendo\FatturaPA\Enums\TaxRegime::ORDINARIO;
    
    /**
     * DatiAnagrafici/IdFiscaleIVA
     * @var Condividendo\FatturaPA\Tags\VatNumber
     */
    private $vatNumber;
    
    /**
     * DatiAnagrafici/CodiceFiscale
     * @var string
     */
    private $fiscalCode;
    
    /**
     * DatiAnagrafici/Anagrafica
     * @var Condividendo\FatturaPA\Tags\Registry
     */
    private $registry;
    
    /**
     * DatiAnagrafici/RegimeFiscale
     * @var string
     */
    private $taxRegime;
    
    
    /* TODO :
     * AlboProfessionale: nome dell'albo professionale cui appartiene il
		cedente/prestatore.
		ProvinciaAlbo: provincia dell'albo professionale.
		NumeroIscrizioneAlbo: numero di iscrizione all'albo professionale.
		DataIscrizioneAlbo: data di iscrizione all'albo professionale
		*/
        
                
    function __construct(){
		$this->vatNumber = VatNumber::make();
		$this->registry = Registry::make();	
		$this->taxRegime = self::DEFAULT_TAX_REGIME;
	}
	
	
    public static function make() : self { return new self(); }	
	

    public function setVatNumber(VatNumber $vatNumber): self
    {
        $this->vatNumber = $vatNumber;
        return $this;
    }
    

    public function setFiscalCode(string $fiscalCode): self
    {
        $this->fiscalCode = $fiscalCode;
        return $this;
    }


    public function setTaxRegime(string $regimeCode): self
    {
        $this->taxRegime = $regimeCode;
        return $this;
    }


    public function setRegistry(Registry $registry): self
    {
        $this->registry = $registry;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<DatiAnagrafici>\r\n" .
					($this->fiscalCode ? "$tabs\t\t<CodiceFiscale>$this->fiscalCode</CodiceFiscale>\r\n" : "") .
					$this->vatNumber->getTags("$tabs\t") . "\r\n" .
					$this->registry->getTags("$tabs\t") . "\r\n" .
					"$tabs\t\t<RegimeFiscale>{$this->taxRegime->value}</RegimeFiscale>\r\n" .
				"$tabs\t</DatiAnagrafici>";
	}
	
	/*
    public function setFirstName(string $name): self
    {
        $this->registry->setFirstName($name);
        return $this;
    }

    public function setLastName(string $name): self
    {
        $this->registry->setLastName($name);
        return $this;
    }

    public function setCompanyName(string $name): self
    {
        $this->registry->setCompanyName($name);
        return $this;
    }
    */

}
