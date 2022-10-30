<?php

namespace Condividendo\FatturaPA\Tags;

class GoodsServicesData extends AbstractTag
{
    use Makeable;
	
    /**
     * @var LineItems[]
     */
    private $lineItems;
	
    /**
     * @var Overview
     */
    private $overview;    
    

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


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiBeniServizi');

        foreach($this->lineItems as $item) $e->appendChild($item->toDOMElement($dom));
        $e->appendChild($this->overview->toDOMElement($dom));
        
        return $e;
    }
}

