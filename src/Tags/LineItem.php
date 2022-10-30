<?php

namespace Condividendo\FatturaPA\Tags;

class LineItem extends AbstractTag
{
    use Makeable;
	
    /**
     * @var LineNumber
     */
    private $lineNumber;
	
    /**
     * @var Description
     */
    private $description;
	
    /**
     * @var Quantity
     */
    private $quantity;
	
    /**
     * @var UnitPrice
     */
    private $unitPrice;
	
    /**
     * @var TotalPrice
     */
    private $totalPrice;
	
    /**
     * @var VatTax
     */
    private $vatTax;
    

    public function setLineNumber(LineNumber $lineNumber): self
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }
    
    public function setDescription(Description $description): self
    {
        $this->description = $description;
        return $this;
    }
    
    public function setQuantity(Quantity $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
    
    public function setUnitPrice(UnitPrice $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }
    
    public function setTotalPrice(TotalPrice $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
    
    public function setVatTax(VatTax $vatTax): self
    {
        $this->vatTax = $vatTax;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DettaglioLinee');

        $e->appendChild($this->lineNumber->toDOMElement($dom));
        $e->appendChild($this->description->toDOMElement($dom));
        $e->appendChild($this->quantity->toDOMElement($dom));
        $e->appendChild($this->unitPrice->toDOMElement($dom));
        $e->appendChild($this->totalPrice->toDOMElement($dom));
        $e->appendChild($this->vatTax->toDOMElement($dom));
        
        return $e;
    }
}
