<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Header extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\TransmissionData
     */
    private $transmissionData;

    /**
     * @var \Condividendo\FatturaPA\Tags\Supplier
     */
    private $supplier;

    /**
     * @var \Condividendo\FatturaPA\Tags\Customer
     */
    private $customer;

    public function setTransmissionData(TransmissionData $data): self
    {
        $this->transmissionData = $data;

        return $this;
    }

    public function setSupplier(Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('FatturaElettronicaHeader');

        $e->appendChild($this->transmissionData->toDOMElement($dom));
        $e->appendChild($this->supplier->toDOMElement($dom));
        $e->appendChild($this->customer->toDOMElement($dom));

        return $e;
    }
}
