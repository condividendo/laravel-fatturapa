<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\TransmissionFormat as TransmissionFormatEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TransmissionData extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\TransmitterId
     */
    private $transmitterId;

    /**
     * @var \Condividendo\FatturaPA\Tags\TransmissionSequence
     */
    private $transmissionSequence;

    /**
     * @var \Condividendo\FatturaPA\Tags\TransmissionFormat
     */
    private $transmissionFormat;

    /**
     * @var \Condividendo\FatturaPA\Tags\RecipientCode
     */
    private $recipientCode;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\TransmitterContacts
     */
    private $transmitterContacts;

    /**
     * @var ?\Condividendo\FatturaPA\Tags\RecipientPec
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

    public function setTransmissionFormat(TransmissionFormatEnum $format): self
    {
        $this->transmissionFormat = TransmissionFormat::make()->setFormat($format);

        return $this;
    }

    public function setRecipientCode(RecipientCode $recipientCode): self
    {
        $this->recipientCode = $recipientCode;

        return $this;
    }

    public function setTransmitterContacts(?TransmitterContacts $transmitterContacts): self
    {
        $this->transmitterContacts = $transmitterContacts;

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
        $e->appendChild($this->transmissionSequence->toDOMElement($dom));
        $e->appendChild($this->transmissionFormat->toDOMElement($dom));
        $e->appendChild($this->recipientCode->toDOMElement($dom));

        if ($this->transmitterContacts) {
            $e->appendChild($this->transmitterContacts->toDOMElement($dom));
        }

        if ($this->recipientPec) {
            $e->appendChild($this->recipientPec->toDOMElement($dom));
        }

        return $e;
    }
}
