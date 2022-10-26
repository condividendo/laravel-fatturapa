<?php
namespace Condividendo\FatturaPA\Tags;

class LineItem
{
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/NumeroLinea
     * @var int
     */
    private $lineNumber;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Descrizione
     * @var string
     */
    private $description;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/Quantita
     * @var float
     */
    private $quantity;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoUnitario
     * @var float
     */
    private $unitPrice;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/PrezzoTotale
     * @var float
     */
    private $totalPrice;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee/AliquotaIVA
     * @var float
     */
    private $vatTax;
    
    
    public static function make() : self { return new self(); }		
	

    public function setLineNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }
    
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    
    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
    
    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }
    
    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
    
    public function setVatTaxPercentage(float $percentage): self
    {
        $this->vatTax = $percentage;
        return $this;
    }
    
    public function getTags(string $tabs){
		return  "$tabs\t<DettaglioLinee>\r\n" .
					"$tabs\t\t<NumeroLinea>$this->number</NumeroLinea>\r\n" .
					"$tabs\t\t<Descrizione>$this->description</Descrizione>\r\n" .
					"$tabs\t\t<Quantita>$this->quantity</Quantita>\r\n" .
					"$tabs\t\t<PrezzoUnitario>$this->unitPrice</PrezzoUnitario>\r\n" .
					"$tabs\t\t<PrezzoTotale>$this->totalPrice</PrezzoTotale>\r\n" .
					"$tabs\t\t<AliquotaIVA>$this->vatTax</AliquotaIVA>\r\n" .
				"$tabs\t</DettaglioLinee>";
	}
	
}
