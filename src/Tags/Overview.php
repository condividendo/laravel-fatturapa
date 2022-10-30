<?php

namespace Condividendo\FatturaPA\Tags;

class Overview extends AbstractTag
{
    use Makeable;
		
    /**
     * @var VatTax
     */
    private $vatTax;
		
    /**
     * @var TaxableAmount
     */
    private $taxableAmount;
		
    /**
     * @var Duty
     */
    private $duty;
    
    /**
     * @var VatCollectionMode
     */
    private $vatCollectionMode;
    
    /**
     * @var Nature
     */
    private $nature;
    
    /**
     * @var RegulatoryReference
     */
    private $regulatoryReference;
    
    	
    public function setVatTaxAmount(VatTax $amount): self
    {
        $this->vatTax = $amount;
        return $this;
    }
    
    
    public function setTaxableAmount(TaxableAmount $amount): self
    {
        $this->taxableAmount = $amount;
        return $this;
    }
    
    
    public function setDuty(Duty $duty): self
    {
        $this->duty = $duty;
        return $this;
    }
    
    
    public function setNature(Nature $nature): self
    {
        $this->nature = $nature;
        return $this;
    }
    
    
    public function setRegulatoryReference(RegulatoryReference $ref): self
    {
        $this->regulatoryReference = $ref;
        return $this;
    }
        
    
    public function setVatCollection(VatCollectionMode $collectionMode): self
    {
        $this->vatCollectionMode = $collectionMode;
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiRiepilogo');

        $e->appendChild($this->vatTax->toDOMElement($dom));
        if($this->nature) $e->appendChild($this->nature->toDOMElement($dom));
        $e->appendChild($this->taxableAmount->toDOMElement($dom));
        $e->appendChild($this->duty->toDOMElement($dom));
        if($this->vatCollectionMode) $e->appendChild($this->vatCollectionMode->toDOMElement($dom));
        if($this->regulatoryReference) $e->appendChild($this->regulatoryReference->toDOMElement($dom));
        
        return $e;
    }
}
