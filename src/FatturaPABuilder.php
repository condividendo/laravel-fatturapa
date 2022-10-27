<?php

namespace Condividendo\FatturaPA;

use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Tags\CodeId;
use Condividendo\FatturaPA\Tags\CountryId;
use Condividendo\FatturaPA\Tags\EInvoice;
use Condividendo\FatturaPA\Tags\Header;
use Condividendo\FatturaPA\Tags\TransmissionData;
use Condividendo\FatturaPA\Tags\TransmissionFormat as TransmissionFormatTag;
use Condividendo\FatturaPA\Tags\TransmissionSequence;
use Condividendo\FatturaPA\Tags\TransmitterId;
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

    public function setRecipientCode(string $code): self
    {
        return $this;
    }

    public function setSupplier(Supplier $supplier): self
    {
        return $this;
    }

    public function setCustomer(Customer $customer): self
    {
        return $this;
    }

    public function addBody(Body $body): self
    {
        $this->bodies[] = $body;
        return $this;
    }

    public function toXML(): SimpleXMLElement
    {
        $dom = new DOMDocument();

        $dom->appendChild($this->makeEInvoice()->toDOMElement($dom));

        /** @var SimpleXMLElement $xml */
        $xml = simplexml_import_dom($dom);

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

    private function makeHeader(): Header
    {
        return Header::make()->setTransmissionData($this->makeTransmissionData());
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

    private function makeTransmissionData(): TransmissionData
    {
        return TransmissionData::make()
            ->setTransmitterId($this->makeTransmitterId())
            ->setTransmissionFormat($this->makeTransmissionFormat())
            ->setTransmissionSequence($this->makeTransmissionSequence());
    }

    private function makeTransmitterId(): TransmitterId
    {
        return TransmitterId::make()
            ->setCountryId($this->makeCountryId())
            ->setCodeId($this->makeCodeId());
    }

    private function makeTransmissionFormat(): TransmissionFormatTag
    {
        return TransmissionFormatTag::make()->setFormat($this->transmissionFormat);
    }

    private function makeTransmissionSequence(): TransmissionSequence
    {
        return TransmissionSequence::make()
            ->setSequence($this->transmissionSequence);
    }

    private function makeCountryId(): CountryId
    {
        return CountryId::make()->setId($this->senderIdCountry);
    }

    private function makeCodeId(): CodeId
    {
        return CodeId::make()->setId($this->senderIdCode);
    }
}
