<?php
namespace Condividendo\FatturaPA\Tags;

class GoodsServicesData
{
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DettaglioLinee
     * @var array
     */
    private $lineItems;
	
    /**
     * FatturaElettronicaBody/DatiBeniServizi/DatiRiepilogo
     * @var Condividendo\FatturaPA\Tags\Overview
     */
    private $overview;    
    
    
    function __construct(){
		$this->lineItems = [];
		$this->overview = Overview::make();
	}
    
    public static function make() : self { return new self(); }		
	

    public function setOverview(Overview $overview): self
    {
        $this->overview = $overview;
        return $this;
    }

    public function setItems(array $items): self
    {
        foreach($items as $item) $this->addItem($item);
        return $this;
    }

    public function addItem(LineItem $item): self
    {
        $this->lineItems[] = $item;
        $item->setLineNumber(count($this->lineItems));
        return $this;
    }
    
    public function getTags(string $tabs){
		$tags = "$tabs\t<DatiBeniServizi>\r\n";
		foreach($this->lineItems as $item) $tags .= $item->getTags("$tabs\t") . "\r\n";
		$tags .= $this->overview->getTags("$tabs\t") . "\r\n";
		$tags .= "$tabs\t</DatiBeniServizi>";
		return $tags;
	}
	
}
