<?php

namespace Condividendo\FatturaPA\Tags;

use DOMDocument;
use DOMElement;

/**
 * ProgressivoInvio
 */
class TransmissionSequence extends AbstractTag
{
    /**
     * @var string
     */
    private $sequence;

    public function setSequence(string $sequence): self
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('ProgressivoInvio', $this->sequence);
    }
}
