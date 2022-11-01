<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

/**
 * FormatoTrasmissione
 */
class TransmissionFormat extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\TransmissionFormat
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
        return $dom->createElement('FormatoTrasmissione', $this->format->value);
    }
}
