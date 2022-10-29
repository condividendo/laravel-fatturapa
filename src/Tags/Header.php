<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Header extends AbstractTag
{
    use Makeable;

    /**
     * @var TransmissionData
     */
    private $transmissionData;

    /**
     * @var Supplier
     */
    private $supplier;

    /**
     * @var Customer
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
