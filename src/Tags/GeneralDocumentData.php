<?php
namespace Condividendo\FatturaPA\Tags;

class GeneralDocumentData
{
	
	const DEFAULT_CURRENCY = "EUR";
	
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/TipoDocumento
     * @var Condividendo\FatturaPA\Enums\Type
     */
    private $type;
    
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Divisa
     * @var string
     */
    private $currency;
    
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Data
     * @var string
     */
    private $date;
    
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Numero
     * @var string
     */
    private $number;
    
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/ImportoTotaleDocumento
     * @var float
     */
    private $amount;
    
    /**
     * FatturaElettronicaBody/DatiGenerali/DatiGeneraliDocumento/Causale
     * @var string
     */
    private $description;
    
    
    function __construct(){
		$this->currency = self::DEFAULT_CURRENCY;
	}
    
    public static function make() : self { return new self(); }		
	

    public function setType(\Condividendo\FatturaPA\Enums\Type $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function setDate(string $date): self
    {
        $this->date = \Condividendo\FatturaPA\FatturaPABuilder::formatDate($date);
        return $this;
    }
    
    
    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }
    
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
    
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    
    public function getTags(string $tabs){
		return 	"$tabs\t<DatiGeneraliDocumento>\r\n" .
					"$tabs\t\t<TipoDocumento>{$this->type->value}</TipoDocumento>\r\n" .					
					"$tabs\t\t<Divisa>$this->currency</Divisa>\r\n" .					
					"$tabs\t\t<Data>$this->date</Data>\r\n" .					
					"$tabs\t\t<Numero>$this->number</Numero>\r\n" .					
					"$tabs\t\t<ImportoTotaleDocumento>$this->amount</ImportoTotaleDocumento>\r\n" .					
					"$tabs\t\t<Causale>$this->description</Causale>\r\n" .					
				"$tabs\t</DatiGeneraliDocumento>";
	}

}
