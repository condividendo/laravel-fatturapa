<?php

namespace Condividendo\FatturaPA\Tags;

use DOMDocument;
use DOMElement;

/**
 * FormatoTrasmissione
 */
class TransmissionFormat extends AbstractTag
{
    /**
     * @var string
     */
    private $format;

    public function setFormat(\Condividendo\FatturaPA\Enums\TransmissionFormat $format): self
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('FormatoTrasmissione', $this->format);
    }
}
