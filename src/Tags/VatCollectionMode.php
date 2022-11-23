<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\VatCollectionMode as VatCollectionModeEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class VatCollectionMode extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\VatCollectionMode
     */
    private $collectionMode;

    public function setVatCollectionMode(VatCollectionModeEnum $collectionMode): self
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
