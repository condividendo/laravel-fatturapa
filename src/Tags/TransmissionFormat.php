<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\TransmissionFormat as TransmissionFormatEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

/**
 * FormatoTrasmissione
 */
class TransmissionFormat extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\TransmissionFormat
     */
    private $format;

    public function setFormat(TransmissionFormatEnum $format): self
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
