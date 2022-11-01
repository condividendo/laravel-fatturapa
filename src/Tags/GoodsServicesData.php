<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class GoodsServicesData extends AbstractTag
{
    use Makeable;
	
    /**
     * @var Item[]
     */
    private $lineItems;
	
    /**
     * @var SummaryItem[]
     */
    private $summaryItems;    
    

    public function setItems(array $items): self
    {
        foreach($items as $item) $this->addItem($item);
        return $this;
    }

    public function addItem(Item $item): self
    {
        $this->lineItems[] = $item;
        $item->setLineNumber(count($this->lineItems));
        return $this;
    }

    public function setSummaryItems(array $summaryItems): self
    {
        $this->summaryItems = $summaryItems;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiBeniServizi');

        foreach($this->lineItems as $item) $e->appendChild($item->toDOMElement($dom));
        foreach($this->summaryItems as $item) $e->appendChild($item->toDOMElement($dom));
        
        return $e;
    }
}

