<?php

namespace Condividendo\FatturaPA;

use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Tags\CodeId as CodeIdTag;
use Condividendo\FatturaPA\Tags\CountryId as CountryIdTag;
use Condividendo\FatturaPA\Tags\EInvoice;
use Condividendo\FatturaPA\Tags\Header as HeaderTag;
use Condividendo\FatturaPA\Tags\RecipientCode as RecipientCodeTag;
use Condividendo\FatturaPA\Tags\RecipientPec as RecipientPecTag;
use Condividendo\FatturaPA\Tags\TransmissionData as TransmissionDataTag;
use Condividendo\FatturaPA\Tags\TransmissionSequence as TransmissionSequenceTag;
use Condividendo\FatturaPA\Tags\TransmitterId as TransmitterIdTag;
use DOMDocument;
use SimpleXMLElement;

class FatturaPABuilder
{
    /**
     * @var TransmissionFormat
     */
    private $transmissionFormat;

    /**
     * @var string
     */
    private $senderIdCountry;

    /**
     * @var string
     */
    private $senderIdCode;

    /**
     * @var string
     */
    private $transmissionSequence;

    /**
     * @var string
     */
    private $recipientCountryId;

    /**
     * @var string
     */
    private $recipientCode;

    /**
     * @var string
     */
    private $recipientPec;

    /**
     * @var Supplier
     */
    private $supplier;

    /**
     * @var Customer
     */
    private $customer;


    /**
     * @var Body[]
     */
    private $bodies = [];


    public function setTransmissionFormat(TransmissionFormat $format): self
    {
        $this->transmissionFormat = $format;
        return $this;
    }

    public function setSenderId(string $country, string $code): self
    {
        $this->senderIdCountry = $country;
        $this->senderIdCode = $code;
        return $this;
    }

    public function setTransmissionSequence(string $sequence): self
    {
        $this->transmissionSequence = $sequence;
        return $this;
    }

    public function setRecipientCountryId(string $countryId): self
    {
        $this->recipientCountryId = $countryId;
        if (in_array(strtoupper($this->recipientCountryId), ["SM", "VA"])) {
            $this->recipientCode = "XXXXXXX"; // <== recipient code for San Marino and Vatican suppliers
        }
        return $this;
    }

    public function setRecipientCode(string $code): self
    {
        $this->recipientCode = $code;
        return $this;
    }

    public function setRecipientPec(string $pec): self
    {
        $this->recipientPec = $pec;
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


    public function addBody(Body $body): self
    {
        $this->bodies[] = $body;
        return $this;
    }

    public function toDOM(): DOMDocument
    {
        $dom = new DOMDocument();
        $dom->appendChild($this->makeEInvoice()->toDOMElement($dom));
        return $dom;
    }

    public function toXML(): SimpleXMLElement
    {
        /** @var SimpleXMLElement $xml */
        $xml = simplexml_import_dom($this->toDOM());

        return $xml;
    }

    private function makeEInvoice(): EInvoice
    {
        $r = EInvoice::make()
            ->setTransmissionFormat($this->transmissionFormat)
            ->setHeader($this->makeHeader());

        foreach ($this->makeBodies() as $body) {
            $r->addBody($body);
        }

        return $r;
    }

    private function makeHeader(): HeaderTag
    {
        return HeaderTag::make()->setTransmissionData($this->makeTransmissionData())
            ->setSupplier($this->supplier->getTag())
            ->setCustomer($this->customer->getTag());
    }

    /**
     * @return BodyTag[]
     */
    private function makeBodies(): array
    {
        $b = [];

        foreach ($this->bodies as $body) {
            $b[] = $body->getTag();
        }

        return $b;
    }

    private function makeTransmissionData(): TransmissionDataTag
    {
        return TransmissionDataTag::make()
            ->setTransmitterId($this->makeTransmitterId())
            ->setTransmissionSequence($this->makeTransmissionSequence())
            ->setTransmissionFormat($this->transmissionFormat)
            ->setRecipientCode($this->makeRecipientCode())
            ->setRecipientPec($this->makeRecipientPec());
    }

    private function makeTransmitterId(): TransmitterIdTag
    {
        return TransmitterIdTag::make()
            ->setCountryId($this->makeSenderIdCountry())
            ->setCodeId($this->makeSenderIdCode());
    }

    private function makeTransmissionSequence(): TransmissionSequenceTag
    {
        return TransmissionSequenceTag::make()
            ->setSequence($this->transmissionSequence);
    }

    private function makeRecipientCode(): RecipientCodeTag
    {
        assert($this->recipientCode || $this->recipientPec, "Either Recipient Pec, Code or Country must be set");
        return RecipientCodeTag::make()
            ->setCode($this->recipientPec ? "0000000" : $this->recipientCode);
    }

    private function makeRecipientPec(): ?RecipientPecTag
    {
        return $this->recipientPec ? RecipientPecTag::make()->setPec($this->recipientPec) : null;
    }

    private function makeSenderIdCountry(): CountryIdTag
    {
        return CountryIdTag::make()->setId($this->senderIdCountry);
    }

    private function makeSenderIdCode(): CodeIdTag
    {
        return CodeIdTag::make()->setId($this->senderIdCode);
    }
}
