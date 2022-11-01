<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Item extends AbstractTag
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
    

    public function setLineNumber(int $lineNumber): self
    {
        $this->lineNumber = LineNumber::make()->setNumber($lineNumber);
        return $this;
    }
    
    public function setDescription(string $description): self
    {
        $this->description = Description::make()->setDescription($description);
        return $this;
    }
    
    public function setQuantity(int $quantity): self
    {
        $this->quantity = Quantity::make()->setQuantity($quantity);
        return $this;
    }
    
    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = UnitPrice::make()->setUnitPrice($unitPrice);
        return $this;
    }
    
    public function setTotalAmount(float $totalPrice): self
    {
        $this->totalPrice = TotalPrice::make()->setTotalPrice($totalPrice);
        return $this;
    }
    
    public function setTaxRate(float $rate): self
    {
        $this->vatTax = VatTax::make()->setRate($rate);
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
