<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class RegulatoryReference extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\RegulatoryReference
     */
    private $regulatoryReference;

    public function setRegulatoryReference(\Condividendo\FatturaPA\Enums\RegulatoryReference $regulatoryReference): self
    {
        $this->regulatoryReference = $regulatoryReference;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('RiferimentoNormativo', $this->regulatoryReference->value);
    }
}
