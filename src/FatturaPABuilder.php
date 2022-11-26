<?php

namespace Condividendo\FatturaPA;

use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Tags\CodeId as CodeIdTag;
use Condividendo\FatturaPA\Tags\CountryId as CountryIdTag;
use Condividendo\FatturaPA\Tags\EInvoice;
use Condividendo\FatturaPA\Tags\Header as HeaderTag;
use Condividendo\FatturaPA\Tags\RecipientCode as RecipientCodeTag;
use Condividendo\FatturaPA\Tags\RecipientPec as RecipientPecTag;
use Condividendo\FatturaPA\Tags\TransmissionData as TransmissionDataTag;
use Condividendo\FatturaPA\Tags\TransmissionSequence as TransmissionSequenceTag;
use Condividendo\FatturaPA\Tags\TransmitterContacts as TransmitterContactsTag;
use Condividendo\FatturaPA\Tags\TransmitterId as TransmitterIdTag;
use DOMDocument;
use SimpleXMLElement;

class FatturaPABuilder
{
    /**
     * @var \Condividendo\FatturaPA\Enums\TransmissionFormat
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
     * @var ?string
     */
    private $senderEmail;

    /**
     * @var ?string
     */
    private $senderPhone;

    /**
     * @var string
     */
    private $transmissionSequence;

    /**
     * @var string
     */
    private $recipientCode;

    /**
     * @var string
     */
    private $recipientPec;

    /**
     * @var \Condividendo\FatturaPA\Entities\Supplier
     */
    private $supplier;

    /**
     * @var \Condividendo\FatturaPA\Entities\Customer
     */
    private $customer;

    /**
     * @var array<\Condividendo\FatturaPA\Entities\Body>
     */
    private $bodies = [];

    public function transmissionFormat(TransmissionFormat $format): self
    {
        $this->transmissionFormat = $format;

        return $this;
    }

    public function senderId(string $country, string $code): self
    {
        $this->senderIdCountry = $country;
        $this->senderIdCode = $code;

        return $this;
    }

    public function senderEmail(string $email): self
    {
        $this->senderEmail = $email;

        return $this;
    }

    public function senderPhone(string $phone): self
    {
        $this->senderPhone = $phone;

        return $this;
    }

    public function transmissionSequence(string $sequence): self
    {
        $this->transmissionSequence = $sequence;

        return $this;
    }

    public function recipientCode(string $code): self
    {
        $this->recipientCode = $code;

        return $this;
    }

    public function recipientPec(string $pec): self
    {
        $this->recipientPec = $pec;

        return $this;
    }

    public function supplier(Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function customer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function addBody(Body $body): self
    {
        $this->bodies[] = $body;

        return $this;
    }

    public function getRecipientCode(): string
    {
        $country = $this->customer->getAddress()->getCountry();

        assert(
            $this->recipientPec || $this->recipientCode || $country !== 'IT',
            'Either Recipient PEC, Code or Country (different from "IT") must be set.'
        );

        if ($this->recipientPec) {
            return '0000000';
        }

        return $country === 'IT'
            ? $this->recipientCode
            : 'XXXXXXX';
    }

    public function toDOM(): DOMDocument
    {
        $dom = new DOMDocument();
        $dom->appendChild($this->makeEInvoice()->toDOMElement($dom));

        return $dom;
    }

    public function toXML(): SimpleXMLElement
    {
        $xml = simplexml_import_dom($this->toDOM());
        assert($xml instanceof SimpleXMLElement);

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
     * @return array<\Condividendo\FatturaPA\Tags\Body>
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
            ->setTransmitterContacts($this->makeTransmitterContacts())
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

    private function makeTransmitterContacts(): ?TransmitterContactsTag
    {
        if ($this->senderEmail || $this->senderPhone) {
            $tag = TransmitterContactsTag::make();

            if ($this->senderEmail) {
                $tag->setEmail($this->senderEmail);
            }

            if ($this->senderPhone) {
                $tag->setPhone($this->senderPhone);
            }
        }

        return $tag ?? null;
    }

    private function makeRecipientCode(): RecipientCodeTag
    {
        return RecipientCodeTag::make()->setCode($this->getRecipientCode());
    }

    private function makeRecipientPec(): ?RecipientPecTag
    {
        return $this->recipientPec
            ? RecipientPecTag::make()->setPec($this->recipientPec)
            : null;
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
