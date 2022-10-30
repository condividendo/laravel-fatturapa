<?php

namespace Condividendo\FatturaPA;

use Condividendo\FatturaPA\Entities\Address;
use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Capital;
use Condividendo\FatturaPA\Entities\City;
use Condividendo\FatturaPA\Entities\CodeId;
use Condividendo\FatturaPA\Entities\CompanyName;
use Condividendo\FatturaPA\Entities\Contacts;
use Condividendo\FatturaPA\Entities\Country;
use Condividendo\FatturaPA\Entities\CountryId;
use Condividendo\FatturaPA\Entities\Currency;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Date;
use Condividendo\FatturaPA\Entities\Description;
use Condividendo\FatturaPA\Entities\DocumentAmount;
use Condividendo\FatturaPA\Entities\DocumentDescription;
use Condividendo\FatturaPA\Entities\DocumentNumber;
use Condividendo\FatturaPA\Entities\Duty;
use Condividendo\FatturaPA\Entities\Email;
use Condividendo\FatturaPA\Entities\Fax;
use Condividendo\FatturaPA\Entities\FirstName;
use Condividendo\FatturaPA\Entities\FiscalCode;
use Condividendo\FatturaPA\Entities\GeneralData;
use Condividendo\FatturaPA\Entities\GeneralDocumentData;
use Condividendo\FatturaPA\Entities\GoodsServicesData;
use Condividendo\FatturaPA\Entities\Header;
use Condividendo\FatturaPA\Entities\OfficeCode;
use Condividendo\FatturaPA\Entities\Overview;
use Condividendo\FatturaPA\Entities\PaymentAmount;
use Condividendo\FatturaPA\Entities\PaymentCondition as PaymentConditionEntity;
use Condividendo\FatturaPA\Entities\PaymentData;
use Condividendo\FatturaPA\Entities\PaymentDetail;
use Condividendo\FatturaPA\Entities\PaymentExpirationDate;
use Condividendo\FatturaPA\Entities\PaymentMethod as PaymentMethodEntity;
use Condividendo\FatturaPA\Entities\Phone;
use Condividendo\FatturaPA\Entities\ProvinceOrState;
use Condividendo\FatturaPA\Entities\Quantity;
use Condividendo\FatturaPA\Entities\REANumber;
use Condividendo\FatturaPA\Entities\REARegistration;
use Condividendo\FatturaPA\Entities\RecipientCode;
use Condividendo\FatturaPA\Entities\Registry;
use Condividendo\FatturaPA\Entities\RegulatoryReference as RegulatoryReferenceEntity;
use Condividendo\FatturaPA\Entities\ShareHolders;
use Condividendo\FatturaPA\Entities\Street;
use Condividendo\FatturaPA\Entities\StreetNumber;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Entities\TaxableAmount;
use Condividendo\FatturaPA\Entities\TaxableEntity;
use Condividendo\FatturaPA\Entities\Title;
use Condividendo\FatturaPA\Entities\TotalPrice;
use Condividendo\FatturaPA\Entities\TransmissionData;
use Condividendo\FatturaPA\Entities\TransmissionFormat as TransmissionFormatEntity;
use Condividendo\FatturaPA\Entities\TransmissionSequence;
use Condividendo\FatturaPA\Entities\TransmitterContacts;
use Condividendo\FatturaPA\Entities\TransmitterId;
use Condividendo\FatturaPA\Entities\Type as TypeEntity;
use Condividendo\FatturaPA\Entities\UnitPrice;
use Condividendo\FatturaPA\Entities\VatCollectionMode;
use Condividendo\FatturaPA\Entities\VatNumber;
use Condividendo\FatturaPA\Entities\VatTax;
use Condividendo\FatturaPA\Entities\Zip;
use Condividendo\FatturaPA\Enums\LiquidationStatus;
use Condividendo\FatturaPA\Enums\Nature;
use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Enums\RegulatoryReference;
use Condividendo\FatturaPA\Enums\ShareHolder;
use Condividendo\FatturaPA\Enums\TaxRegime;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Enums\VatCollection;

use Condividendo\FatturaPA\Tags\Address as AddressTag;
use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Tags\Capital as CapitalTag;
use Condividendo\FatturaPA\Tags\City as CityTag;
use Condividendo\FatturaPA\Tags\CodeId as CodeIdTag;
use Condividendo\FatturaPA\Tags\CompanyName as CompanyNameTag;
use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Tags\Country as CountryTag;
use Condividendo\FatturaPA\Tags\CountryId as CountryIdTag;
use Condividendo\FatturaPA\Tags\Currency as CurrencyTag;
use Condividendo\FatturaPA\Tags\Customer as CustomerTag;
use Condividendo\FatturaPA\Tags\Date as DateTag;
use Condividendo\FatturaPA\Tags\Description as DescriptionTag;
use Condividendo\FatturaPA\Tags\DocumentAmount as DocumentAmountTag;
use Condividendo\FatturaPA\Tags\DocumentDescription as DocumentDescriptionTag;
use Condividendo\FatturaPA\Tags\DocumentNumber as DocumentNumberTag;
use Condividendo\FatturaPA\Tags\Duty as DutyTag;
use Condividendo\FatturaPA\Tags\EInvoice;
use Condividendo\FatturaPA\Tags\Email as EmailTag;
use Condividendo\FatturaPA\Tags\Fax as FaxTag;
use Condividendo\FatturaPA\Tags\FirstName as FirstNameTag;
use Condividendo\FatturaPA\Tags\FiscalCode as FiscalCodeTag;
use Condividendo\FatturaPA\Tags\GeneralData as GeneralDataTag;
use Condividendo\FatturaPA\Tags\GeneralDocumentData as GeneralDocumentDataTag;
use Condividendo\FatturaPA\Tags\GoodsServicesData as GoodsServicesDataTag;
use Condividendo\FatturaPA\Tags\Header as HeaderTag;
use Condividendo\FatturaPA\Tags\OfficeCode as OfficeCodeTag;
use Condividendo\FatturaPA\Tags\Overview as OverviewTag;
use Condividendo\FatturaPA\Tags\PaymentAmount as PaymentAmountTag;
use Condividendo\FatturaPA\Tags\PaymentCondition as PaymentConditionTag;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Tags\PaymentDetail as PaymentDetailTag;
use Condividendo\FatturaPA\Tags\PaymentExpirationDate as PaymentExpirationDateTag;
use Condividendo\FatturaPA\Tags\PaymentMethod as PaymentMethodTag;
use Condividendo\FatturaPA\Tags\Phone as PhoneTag;
use Condividendo\FatturaPA\Tags\ProvinceOrState as ProvinceOrStateTag;
use Condividendo\FatturaPA\Tags\Quantity as QuantityTag;
use Condividendo\FatturaPA\Tags\REANumber as REANumberTag;
use Condividendo\FatturaPA\Tags\REARegistration as REARegistrationTag;
use Condividendo\FatturaPA\Tags\RecipientCode as RecipientCodeTag;
use Condividendo\FatturaPA\Tags\Registry as RegistryTag;
use Condividendo\FatturaPA\Tags\RegulatoryReference as RegulatoryReferenceTag;
use Condividendo\FatturaPA\Tags\ShareHolders as ShareHoldersTag;
use Condividendo\FatturaPA\Tags\Street as StreetTag;
use Condividendo\FatturaPA\Tags\StreetNumber as StreetNumberTag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;
use Condividendo\FatturaPA\Tags\TaxableAmount as TaxableAmountTag;
use Condividendo\FatturaPA\Tags\TaxableEntity as TaxableEntityTag;
use Condividendo\FatturaPA\Tags\Title as TitleTag;
use Condividendo\FatturaPA\Tags\TotalPrice as TotalPriceTag;
use Condividendo\FatturaPA\Tags\TransmissionData as TransmissionDataTag;
use Condividendo\FatturaPA\Tags\TransmissionFormat as TransmissionFormatTag;
use Condividendo\FatturaPA\Tags\TransmissionSequence as TransmissionSequenceTag;
use Condividendo\FatturaPA\Tags\TransmitterContacts as TransmitterContactsTag;
use Condividendo\FatturaPA\Tags\TransmitterId as TransmitterIdTag;
use Condividendo\FatturaPA\Tags\Type as TypeTag;
use Condividendo\FatturaPA\Tags\UnitPrice as UnitPriceTag;
use Condividendo\FatturaPA\Tags\VatCollectionMode as VatCollectionModeTag;
use Condividendo\FatturaPA\Tags\VatNumber as VatNumberTag;
use Condividendo\FatturaPA\Tags\VatTax as VatTaxTag;
use Condividendo\FatturaPA\Tags\Zip as ZipTag;

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
