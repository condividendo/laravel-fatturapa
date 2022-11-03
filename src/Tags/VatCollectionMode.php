<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class VatCollectionMode extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\VatCollectionMode
     */
    private $collectionMode;

    public function setVatCollectionMode(\Condividendo\FatturaPA\Enums\VatCollectionMode $collectionMode): self
    {
        $this->collectionMode = $collectionMode;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('EsigibilitaIVA', $this->collectionMode->value);
    }
}
