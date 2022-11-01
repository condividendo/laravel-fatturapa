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

    /**
     * @var RecipientCode
     */
    private $recipientCode;

    /**
     * @var ?RecipientPec
     */
    private $recipientPec;


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

    public function setTransmissionFormat(\Condividendo\FatturaPA\Enums\TransmissionFormat $format): self
    {
        $this->transmissionFormat = TransmissionFormat::make()->setFormat($format);
        return $this;
    }

    public function setRecipientCode(RecipientCode $recipientCode): self
    {
        $this->recipientCode = $recipientCode;
        return $this;
    }

    public function setRecipientPec(?RecipientPec $recipientPec): self
    {
        $this->recipientPec = $recipientPec;
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
        $e->appendChild($this->recipientCode->toDOMElement($dom));
        if($this->recipientPec) $e->appendChild($this->recipientPec->toDOMElement($dom));
        
        return $e;
    }
}
