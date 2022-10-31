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
use Condividendo\FatturaPA\Tags\LiquidationStatus as LiquidationStatusTag;
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
     * @var int
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
     * @var string
     */
    private $supplierVatNumber;

    /**
     * @var string
     */
    private $supplierFiscalCode;

    /**
     * @var string
     */
    private $supplierCompanyName;

    /**
     * @var TaxRegime
     */
    private $supplierTaxRegime;

    /**
     * @var string
     */
    private $supplierStreet;

    /**
     * @var string
     */
    private $supplierStreetNumber;

    /**
     * @var string
     */
    private $supplierCity;

    /**
     * @var string
     */
    private $supplierProvinceOrState;

    /**
     * @var string
     */
    private $supplierZip;

    /**
     * @var string
     */
    private $supplierCountry;

    /**
     * @var string
     */
    private $supplierREAOffice;

    /**
     * @var string
     */
    private $supplierREANumber;

    /**
     * @var float
     */
    private $supplierREACapital;

    /**
     * @var ShareHolders
     */
    private $supplierREAShareHolders;

    /**
     * @var LiquidationStatus
     */
    private $supplierREALiquidationStatus;

    /**
     * @var string
     */
    private $supplierEmail;

    /**
     * @var string
     */
    private $supplierPhone;

    /**
     * @var string
     */
    private $supplierFax;


    /**
     * @var string
     */
    private $customerVatNumber;

    /**
     * @var string
     */
    private $customerFiscalCode;

    /**
     * @var string
     */
    private $customerFirstName;

    /**
     * @var string
     */
    private $customerLastName;

    /**
     * @var string
     */
    private $customerTitle;

    /**
     * @var string
     */
    private $customerCompanyName;

    /**
     * @var string
     */
    private $customerStreet;

    /**
     * @var string
     */
    private $customerStreetNumber;

    /**
     * @var string
     */
    private $customerCity;

    /**
     * @var string
     */
    private $customerProvinceOrState;

    /**
     * @var string
     */
    private $customerZip;

    /**
     * @var string
     */
    private $customerCountry;
    

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

    public function setTransmissionSequence(int $sequence): self
    {
        $this->transmissionSequence = $sequence;
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

    public function setSupplierVatNumber(string $vatNumber): self
    {
        $this->supplierVatNumber = $vatNumber; 
        return $this;
    }

    public function setSupplierFiscalCode(string $supplierFiscalCode): self
    {
        $this->supplierFiscalCode = $supplierFiscalCode; 
        return $this;
    }    

    public function setSupplierCompanyName(string $supplierCompanyName): self
    {
        $this->supplierCompanyName = $supplierCompanyName; 
        return $this;
    }      

    public function setSupplierTaxRegime(TaxRegime $supplierTaxRegime): self
    {
        $this->supplierTaxRegime = $supplierTaxRegime; 
        return $this;
    }    

    public function setSupplierStreet(string $supplierStreet): self
    {
        $this->supplierStreet = $supplierStreet; 
        return $this;
    }      

    public function setSupplierStreetNumber(string $supplierStreetNumber): self
    {
        $this->supplierStreetNumber = $supplierStreetNumber; 
        return $this;
    }      

    public function setSupplierCity(string $supplierCity): self
    {
        $this->supplierCity = $supplierCity; 
        return $this;
    }       

    public function setSupplierCity(string $supplierProvinceOrState): self
    {
        $this->supplierProvinceOrState = $supplierProvinceOrState; 
        return $this;
    }    

    public function setSupplierZip(string $supplierZip): self
    {
        $this->supplierZip = $supplierZip; 
        return $this;
    }    

    public function setSupplierCountry(string $supplierCountry): self
    {
        $this->supplierCountry = $supplierCountry; 
        return $this;
    }    

    public function setSupplierREAOffice(string $supplierREAOffice): self
    {
        $this->supplierREAOffice = $supplierREAOffice; 
        return $this;
    }    

    public function setSupplierREANumber(string $supplierREANumber): self
    {
        $this->supplierREANumber = $supplierREANumber; 
        return $this;
    }    

    public function setSupplierREACapital(float $supplierREACapital): self
    {
        $this->supplierREACapital = $supplierREACapital; 
        return $this;
    }    

    public function setSupplierREAShareHolders(ShareHolders $supplierREAShareHolders): self
    {
        $this->supplierREAShareHolders = $supplierREAShareHolders; 
        return $this;
    }    

    public function setSupplierREALiquidationStatus(LiquidationStatus $supplierREALiquidationStatus): self
    {
        $this->supplierREALiquidationStatus = $supplierREALiquidationStatus; 
        return $this;
    }    

    public function setSupplierEmail(string $supplierEmail): self
    {
        $this->supplierEmail = $supplierEmail; 
        return $this;
    }    

    public function setSupplierPhone(string $supplierPhone): self
    {
        $this->supplierPhone = $supplierPhone; 
        return $this;
    }    

    public function setSupplierFax(string $supplierFax): self
    {
        $this->supplierFax = $supplierFax; 
        return $this;
    }    

    public function setCustomerVatNumber(string $vatNumber): self
    {
        $this->customerVatNumber = $vatNumber; 
        return $this;
    }    

    public function setCustomerFiscalCode(string $customerFiscalCode): self
    {
        $this->customerFiscalCode = $customerFiscalCode; 
        return $this;
    }    

    public function setCustomerFirstName(string $customerFirstName): self
    {
        $this->customerFirstName = $customerFirstName; 
        return $this;
    }    

    public function setCustomerLastName(string $customerLastName): self
    {
        $this->customerLastName = $customerLastName; 
        return $this;
    }    

    public function setCustomerTitle(string $customerTitle): self
    {
        $this->customerTitle = $customerTitle; 
        return $this;
    }    

    public function setCustomerCompanyName(string $customerCompanyName): self
    {
        $this->customerCompanyName = $customerCompanyName; 
        return $this;
    }    

    public function setCustomerStreet(string $customerStreet): self
    {
        $this->customerStreet = $customerStreet; 
        return $this;
    }    

    public function setCustomerStreetNumber(string $customerStreetNumber): self
    {
        $this->customerStreetNumber = $customerStreetNumber; 
        return $this;
    }    

    public function setCustomerCity(string $customerCity): self
    {
        $this->customerCity = $customerCity; 
        return $this;
    }    

    public function setCustomerProvinceOrState(string $customerProvinceOrState): self
    {
        $this->customerProvinceOrState = $customerProvinceOrState; 
        return $this;
    }    

    public function setCustomerZip(string $customerZip): self
    {
        $this->customerZip = $customerZip; 
        return $this;
    }    

    public function setCustomerCountry(string $customerCountry): self
    {
        $this->customerCountry = $customerCountry; 
        return $this;
    }    

    /*
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
    */

    public function addBody(BodyTag $body): self
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

    private function makeHeader(): HeaderTag
    {
        return HeaderTag::make()->setTransmissionData($this->makeTransmissionData())
                            ->setSupplier($this->makeSupplier())
                            ->setCustomer($this->makeCustomer());
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
            ->setTransmissionFormat($this->makeTransmissionFormat())
            ->setTransmissionSequence($this->makeTransmissionSequence())
            ->setRecipientCode($this->makeRecipientCode())
            ->setRecipientPec($this->makeRecipientPec());
    }

    private function makeTransmitterId(): TransmitterIdTag
    {
        return TransmitterIdTag::make()
            ->setCountryId($this->makeCountryId())
            ->setCodeId($this->makeCodeId());
    }

    private function makeTransmissionFormat(): TransmissionFormatTag
    {
        return TransmissionFormatTag::make()->setFormat($this->transmissionFormat);
    }

    private function makeTransmissionSequence(): TransmissionSequenceTag
    {
        return TransmissionSequenceTag::make()
            ->setSequence($this->transmissionSequence);
    }

    private function makeRecipientCode(): RecipientCodeTag
    {
        $countryCode = strtoloupper(substr($this->supplierCountry,0,2));
        if($countryCode != "IT") $this->recipientCode = "XXXXXXX";
        return RecipientCodeTag::make()
            ->setCode($this->recipientPec ? "0000000" : $this->recipientCode);
    }

    private function makeRecipientPec(): ?RecipientPecTag
    {
        return $this->recipientPec ? RecipientPecTag::make()
            ->setSequence($this->transmissionSequence) : null;
    }

    private function makeSenderCountryId(): CountryIdTag
    {
        return CountryIdTag::make()->setId($this->senderIdCountry);
    }

    private function makeSenderCodeId(): CodeIdTag
    {
        return CodeIdTag::make()->setId($this->senderIdCode);
    }

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

    private function makeCustomerTaxableEntity(): TaxableEntityTag 
    {
        return TaxableEntityTag::make()
                ->setVatNumber($this->makeCustomerVatNumber())
                ->setFiscalCode($this->makeCustomerFiscalCode())
                ->setRegistry($this->makeCustomerRegistry());
    }

    private function makeSupplierTaxableEntity(): TaxableEntityTag 
    {
        return TaxableEntityTag::make()
                ->setVatNumber($this->makeSupplierVatNumber())
                ->setFiscalCode($this->makeSupplierFiscalCode())
                ->setRegistry($this->makeSupplierRegistry());
    }

    private function makeCustomerAddress(): AddressTag 
    {
        return AddressTag::make()
                ->setStreet($this->makeCustomerStreet())
                ->setStreetNumber($this->makeCustomerStreetNumber())
                ->setCity($this->makeCustomerCity())
                ->setZip($this->makeCustomerZip())
                ->setProvinceOrState($this->makeCustomerProvinceOrState())
                ->setCountyr($this->makeCustomerCountry());
    }

    private function makeSupplierAddress(): AddressTag 
    {
        return AddressTag::make()
                ->setStreet($this->makeSupplierStreet())
                ->setStreetNumber($this->makeSupplierStreetNumber())
                ->setCity($this->makeSupplierCity())
                ->setZip($this->makeSupplierZip())
                ->setProvinceOrState($this->makeSupplierProvinceOrState())
                ->setCountyr($this->makeSupplierCountry());
    }

    private function makeSupplierREARegistration(): REARegistrationTag 
    {
        return REARegistrationTag::make()
                ->setOfficeCode($this->makeSupplierREAOffice())
                ->setREANumber($this->makeSupplierREANumber())
                ->setREACapital($this->makeSupplierREACapital())
                ->setREAShareHolders($this->makeSupplierREAShareHolders())
                ->setREALiquidationStatus($this->makeSupplierREALiquidationStatus());
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
                                            : nulll
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

}
