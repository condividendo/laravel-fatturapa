<?php
namespace Condividendo\FatturaPA\Tags;

class Overview
{
	
	const DEFAULT_VAT_TAX = 0;
	const DEFAULT_DUTY = 0;
		
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/AliquotaIVA
     * @var float
     */
    private $vatTax;
		
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/ImponibileImporto
     * @var float
     */
    private $taxableAmount;
		
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/Imposta
     * @var float
     */
    private $duty;
    
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/EsigibilitaIVA
     * @var Condividendo\FatturaPA\Enums\VatCollection
     */
    private $vatCollection;
    
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/Natura
     * @var Condividendo\FatturaPA\Enums\Nature
     */
    private $nature;
    
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo/RiferimentoNormativo
     * @var Condividendo\FatturaPA\Enums\RegulatoryReference
     */
    private $regulatoryReference;
	
                
    function __construct(){
		$this->vatTax = self::DEFAULT_VAT_TAX;
		$this->duty = self::DEFAULT_DUTY;
	}
	
    
    public static function make() : self { return new self(); }		
	
	
    public function setVatTaxAmount(float $amount): self
    {
        $this->vatTax = $amount;
        return $this;
    }
    
    
    public function setTaxableAmount(float $amount): self
    {
        $this->taxableAmount = $amount;
        return $this;
    }
    
    
    public function setDuty(float $duty): self
    {
        $this->duty = $duty;
        return $this;
    }
    
    
    public function setNature(\Condividendo\FatturaPA\Enums\Nature $nature): self
    {
        $this->nature = $nature;
        return $this;
    }
    
    
    public function setNatureByCountryCode(string $countryCode): self
    {
		switch($countryCode){ 
			case "SM":
			$this->nature = Condividendo\FatturaPA\Enums\Nature::SM;
			break;
			case "VA":
			$this->nature = Condividendo\FatturaPA\Enums\Nature::VA;
			break;
		}
		return $this;
    }
    
    
    public function setRegulatoryReference(\Condividendo\FatturaPA\Enums\RegulatoryReference $ref): self
    {
        $this->regulatoryReference = $ref;
        return $this;
    }
    
    
    public function setRegulatoryReferenceByCountryCode(string $countryCode): self
    {
		switch($countryCode){ 
			case "SM":
			$this->regulatoryReference = Condividendo\FatturaPA\Enums\RegulatoryReference::SM;
			break;
			case "VA":
			$this->regulatoryReference = Condividendo\FatturaPA\Enums\RegulatoryReference::VA;
			break;
		}
        return $this;
    }
    
    
    public function setVatCollection(\Condividendo\FatturaPA\Enums\VatCollection $collectionMode): self
    {
        $this->vatCollection = $collectionMode;
        return $this;
    }
    
    
    public function getTags(string $tabs){
		return  "$tabs\t<DatiRiepilogo>\r\n" .
					"$tabs\t\t<AliquotaIVA>$this->vatTax</AliquotaIVA>\r\n" .
					($this->nature ? "$tabs\t\t<Natura>$this->nature</Natura>\r\n" : "") .
					"$tabs\t\t<ImponibileImporto>$this->taxableAmount</ImponibileImporto>\r\n" .
					"$tabs\t\t<Imposta>$this->duty</Imposta>\r\n" .
					($this->vatCollection ? "$tabs\t\t<EsigibilitaIVA>$this->vatCollection</EsigibilitaIVA>\r\n" : "") .
					($this->regulatoryReference ? "$tabs\t\t<RiferimentoNormativo>$this->regulatoryReference</RiferimentoNormativo>\r\n" : "") .
				"$tabs\t</DatiRiepilogo>";
	}
	
}
