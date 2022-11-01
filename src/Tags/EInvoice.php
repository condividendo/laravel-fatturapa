<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class EInvoice extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\TransmissionFormat
     */
    private $format;

    /**
     * @var Header
     */
    private $header;

    /**
     * @var Body[]
     */
    private $bodies = [];

    public function setTransmissionFormat(\Condividendo\FatturaPA\Enums\TransmissionFormat $format): self
    {
        $this->format = $format;
        return $this;
    }

    public function setHeader(Header $header): self
    {
        $this->header = $header;
        return $this;
    }

    public function addBody(Body $body): self
    {
        $this->bodies[] = $body;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElementNS(
            'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2',
            'q1:FatturaElettronica'
        );

        $e->setAttribute('versione', $this->format->value);
        $e->appendChild($this->header->toDOMElement($dom));

        foreach ($this->bodies as $body) {
            $e->appendChild($body->toDOMElement($dom));
        }

        return $e;
    }
}
