<?php

namespace Condividendo\FatturaPA;

use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Tags\CodeId as CodeIdTag;
use Condividendo\FatturaPA\Tags\CountryId as CountryIdTag;
use Condividendo\FatturaPA\Tags\Customer as CustomerTag;
use Condividendo\FatturaPA\Tags\EInvoice;
use Condividendo\FatturaPA\Tags\Header as HeaderTag;
use Condividendo\FatturaPA\Tags\RecipientCode as RecipientCodeTag;
use Condividendo\FatturaPA\Tags\RecipientPec as RecipientPecTag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;
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
        if (in_array(strtoupper($this->recipientCountryId), ["SM","VA"])) {
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

    // public function toXML(): SimpleXMLElement
    // {
    //     $dom = new DOMDocument();

    //     $dom->appendChild($this->makeEInvoice()->toDOMElement($dom));

    //     /** @var SimpleXMLElement $xml */
    //     $xml = simplexml_import_dom($dom);

    //     return $xml;
    // }

    public function toXML(): DOMDocument
    {
        $dom = new DOMDocument();
        $dom->appendChild($this->makeEInvoice()->toDOMElement($dom));
        return $dom;
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
            ->setTransmissionFormat($this->transmissionFormat)
            ->setTransmissionSequence($this->makeTransmissionSequence())
            ->setRecipientCode($this->makeRecipientCode())
            ->setRecipientPec($this->makeRecipientPec());
    }

    private function makeTransmitterId(): TransmitterIdTag
    {
        return TransmitterIdTag::make()
            ->setCountryId($this->makeSenderIdCountry())
            ->setCodeId($this->makeSenderIdCode());
    }

    /*
    private function makeTransmissionFormat(): TransmissionFormatTag
    {
        return TransmissionFormatTag::make()->setFormat($this->transmissionFormat);
    }
    */

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

    /*
    private function makeSupplier(): SupplierTag
    {
        return SupplierTag::make()
                ->setTaxableEntity($this->makeSupplierTaxableEntity())
                ->setAddress($this->makeSupplierAddress())
                ->setREARegistration($this->makeSupplierREARegistration())
                ->setContacts($this->makeSupplierContacts());
    }

    private function makeCustomer(): CustomerTag
    {
        return CustomerTag::make()
                ->setTaxableEntity($this->makeCustomerTaxableEntity())
                ->setAddress($this->makeCustomerAddress());
    }
    private function makeCustomerAddress(): AddressTag
    {
        return AddressTag::make()
                ->setStreet($this->makeCustomerStreet())
                ->setStreetNumber($this->makeCustomerStreetNumber())
                ->setCity($this->makeCustomerCity())
                ->setPostalCode($this->makeCustomerZip())
                ->setProvinceOrState($this->makeCustomerProvinceOrState())
                ->setCountyr($this->makeCustomerCountry());
    }

    private function makeSupplierAddress(): AddressTag
    {
        return AddressTag::make()
                ->setStreet($this->makeSupplierStreet())
                ->setStreetNumber($this->makeSupplierStreetNumber())
                ->setCity($this->makeSupplierCity())
                ->setPostalCode($this->makeSupplierZip())
                ->setProvinceOrState($this->makeSupplierProvinceOrState())
                ->setCountry($this->makeSupplierCountry());
    }
    private function makeCustomerTaxableEntity(): TaxableEntityTag
    {
        return TaxableEntityTag::make()
                ->setVat($this->makeCustomerVatNumber())
                ->setFiscalCode($this->makeCustomerFiscalCode())
                ->setRegistry($this->makeCustomerRegistry());
    }

    private function makeSupplierTaxableEntity(): TaxableEntityTag
    {
        return TaxableEntityTag::make()
                ->setVatTag($this->makeSupplierVatNumber())
                ->setFiscalCode($this->makeSupplierFiscalCode())
                ->setRegistry($this->makeSupplierRegistry());
    }


    private function makeSupplierREARegistration(): REARegistrationTag
    {
        return REARegistrationTag::make()
                ->setOfficeCode($this->makeSupplierREAOffice())
                ->setREANumberTag($this->makeSupplierREANumber())
                ->setCapital($this->makeSupplierREACapital())
                ->setShareHolders($this->makeSupplierREAShareHolders())
                ->setLiquidationStatus($this->makeSupplierREALiquidationStatus());
    }

    private function makeSupplierContacts(): ContactsTag
    {
        return ContactsTag::make()
                ->setEmail($this->makeSupplierEmail())
                ->setPhone($this->makeSupplierPhone())
                ->setFax($this->makeSupplierFax());
    }

    private function makeCustomerVatNumber() : ?VatNumberTag
    {
        return $this->customerVatNumber ?
                VatNumberTag::make()
                    ->setCountryId($this->makeCustomerCountryId())
                    ->setCodeId($this->makeCustomerVatCode())
                : null;
    }

    private function makeSupplierVatNumber() : VatNumberTag
    {
        return VatNumberTag::make()
                    ->setCountryId($this->makeSupplierCountryId())
                    ->setCodeId($this->makeSupplierVatCode());
    }

    private function makeSupplierCountryId() : CountryIdTag
    {
        return CountryIdTag::make()
                    ->setId($this->supplierCountryId);
    }

    private function makeSupplierVatCode() : CodeIdTag
    {
        return CodeIdTag::make()
                    ->setCode($this->supplierVatNumber);
    }

    private function makeCustomerCountryId() : CountryIdTag
    {
        return CountryIdTag::make()
                    ->setId($this->customerCountryId);
    }

    private function makeCustomerVatCode() : CodeIdTag
    {
        return CodeIdTag::make()
                    ->setCode($this->customerVatNumber);
    }

    private function makeCustomerFiscalCode() : ?FiscalCodeTag
    {
        return $this->customerFiscalCode ? FiscalCodeTag::make()
                                            ->setCode($this->customerFiscalCode)
                                            : null;
    }

    private function makeSupplierFiscalCode() : ?FiscalCodeTag
    {
        return $this->supplierFiscalCode ? FiscalCodeTag::make()
                                            ->setCode($this->supplierFiscalCode)
                                            : null;
    }

    private function makeSupplierRegistry() : RegistryTag
    {
        return RegistryTag::make()
                    ->setCompanyName($this->makeSupplierCompanyName());
    }

    private function makeCustomerRegistry() : RegistryTag
    {
        return RegistryTag::make()
                    ->setCompanyName($this->makeCustomerCompanyName())
                    ->setFirstName($this->makeCustomerFirstName())
                    ->setLastName($this->makeCustomerLastName())
                    ->setTitle($this->makeCustomerTitle());
    }

    private function makeSupplierCompanyName() : CompanyNameTag
    {
        return CompanyNameTag::make()
                    ->setName($this->supplierCompanyName);
    }

    private function makeCustomerCompanyName() : ?CompanyNameTag
    {
        return $this->customerCompanyName ? CompanyNameTag::make()
                                            ->setName($this->customerCompanyName)
                                            : null;
    }

    private function makeCustomerFirstName() : ?FirstNameTag
    {
        return $this->customerFirstName ?
                FirstNameTag::make()->setName($this->customerFirstName)
                : null;
    }

    private function makeCustomerLastName() : ?LastNameTag
    {
        return $this->customerLastName ?
                LastNameTag::make()->setName($this->customerLastName)
                : null;
    }

    private function makeCustomerTitle() : ?TitleTag
    {
        return $this->customerTitle ?
                TitleTag::make()->setName($this->customerTitle)
                : null;
    }


    private function makeSupplierREAOffice() : OfficeCodeTag
    {
        return OfficeCodeTag::make()
                ->setCode($this->supplierREAOffice);
    }

    private function makeSupplierREANumber() : REANumberTag
    {
        return REANumberTag::make()
                ->setNumber($this->supplierREANumber);
    }

    private function makeSupplierREACapital() : ?CapitalTag
    {
        return CapitalTag::make()
                ->setCapital($this->supplierREACapital);
    }

    private function makeSupplierREAShareHolders() : ?ShareHoldersTag
    {
        return ShareHoldersTag::make()
                ->setShareHolders($this->supplierREAShareHolders);
    }

    private function makeSupplierREALiquidationStatus() : LiquidationStatusTag
    {
        return LiquidationStatusTag::make()
                ->setStatus($this->supplierREALiquidationStatus);
    }
    */
}
