<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TransmissionData extends AbstractTag
{
    use Makeable;

    /**
     * @var TransmitterId
     */
    private $transmitterId;

    /**
     * @var TransmissionSequence
     */
    private $transmissionSequence;

    /**
     * @var TransmissionFormat
     */
    private $transmissionFormat;

    public function setTransmitterId(TransmitterId $id): self
    {
        $this->transmitterId = $id;
        return $this;
    }

    public function setTransmissionSequence(TransmissionSequence $transmissionSequence): self
    {
        $this->transmissionSequence = $transmissionSequence;
        return $this;
    }

    public function setTransmissionFormat(TransmissionFormat $format): self
    {
        $this->transmissionFormat = $format;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiTrasmissione');

        $e->appendChild($this->transmitterId->toDOMElement($dom));
        $e->appendChild($this->transmissionFormat->toDOMElement($dom));
        $e->appendChild($this->transmissionSequence->toDOMElement($dom));

        return $e;
    }
}
