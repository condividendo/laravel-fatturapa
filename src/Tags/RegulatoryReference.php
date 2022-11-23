<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\RegulatoryReference as RegulatoryReferenceEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class RegulatoryReference extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\RegulatoryReference
     */
    private $regulatoryReference;

    public function setRegulatoryReference(RegulatoryReferenceEnum $regulatoryReference): self
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
