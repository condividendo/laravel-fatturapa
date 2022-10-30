<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class RegulatoryReference extends AbstractTag
{

    use Makeable;

    /**
     * @var string
     */
    private $regulatoryReference;

    public function setRegulatoryReference(string $regulatoryReference): self
    {
        $this->regulatoryReference = $regulatoryReference;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('RiferimentoNormativo', $this->regulatoryReference);
    }
}
