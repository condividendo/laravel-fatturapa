<?php

namespace Condividendo\FatturaPA\Tests\Feature;

use Condividendo\FatturaPA\Entities\Address;
use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Item;
use Condividendo\FatturaPA\Entities\SummaryItem;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Enums\LiquidationStatus;
use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Enums\ShareHolder;
use Condividendo\FatturaPA\Enums\TaxRegime;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\Enums\VatCollectionMode;
use Condividendo\FatturaPA\FatturaPA;
use Condividendo\FatturaPA\FatturaPABuilder;
use Condividendo\FatturaPA\Tests\TestCase;

class Build2Test extends TestCase
{
    public function test_xml(): void
    {
        $xml = $this->build()->toXML()->asXML();
        assert(is_string($xml));

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/2.xml', $xml);
    }

    public function test_schema(): void
    {
        $dom = $this->build()->toDOM();

        $this->assertTrue(
            $dom->schemaValidate(__DIR__ . "/../fixtures/Schema_VFPR12.xsd"),
            "XML not compliant to invoice schema!"
        );
    }

    private function build(): FatturaPABuilder
    {
        return FatturaPA::build()
            ->setSenderId('IT', '0123456789')
            ->setTransmissionSequence('1')
            ->setTransmissionFormat(TransmissionFormat::FPR12())
            ->setSenderEmail("john@doe.com")
            ->setSenderPhone("3334455678")
            ->setRecipientCode('ABC1234')
            ->setSupplier(
                Supplier::make()
                    ->setName('Condividendo Italia srl')
                    ->setVatNumber('IT', '12345640962')
                    ->setAddress(
                        Address::make()
                            ->setStreet('Via Italia')
                            ->setStreetNumber('123')
                            ->setPostalCode('12345')
                            ->setCity('Milano')
                            ->setProvince('MI')
                            ->setCountry('IT')
                    )
                    ->setREANumber("12123")
                    ->setREAOfficeCode("MI")
                    ->setREAShareHolders(ShareHolder::SM())
                    ->setREACapital('11111.00')
                    ->setREALiquidationStatus(LiquidationStatus::LN())
                    ->setTaxRegime(TaxRegime::RF01())
                    ->setContactsEmail("fiscale@condividendo.eu")
                    ->setContactsFax("02334455")
            )
            ->setCustomer(
                Customer::make()
                    ->setFirstName('Mario')
                    ->setLastName('Rossi')
                    ->setFiscalCode('RSSMRA73L09Z103F')
                    ->setAddress(
                        Address::make()
                            ->setStreet('Via Italia')
                            ->setStreetNumber('123')
                            ->setPostalCode('12345')
                            ->setCity('Milano')
                            ->setProvince('MI')
                            ->setCountry('IT')
                    )
            )
            ->addBody(
                Body::make()
                    ->setType(Type::TD01())
                    ->setCurrency('EUR')
                    ->setDate('2022-01-23')
                    ->setNumber('1')
                    ->setDocumentAmount('12.20')
                    ->setDocumentDescription('Causale esempio')
                    ->setItems([
                        Item::make()
                            ->setNumber(1)
                            ->setDescription('Product description')
                            ->setPrice('10.00')
                            ->setTotalAmount('10.00')
                            ->setTaxRate('0.22')
                            ->setQuantity('1.00'),
                    ])
                    ->setSummaryItems([
                        SummaryItem::make()
                            ->setTaxableAmount('10.00')
                            ->setTaxRate('0.22')
                            ->setTaxAmount('2.20')
                            ->setVatCollectionMode(VatCollectionMode::I()),
                    ])
                    ->setPaymentMethod(PaymentMethod::MP21())
                    ->setPaymentAmount('12.20')
                    ->setPaymentExpirationDate("2022-10-28")
                    ->setPaymentCondition(PaymentCondition::TP02())
            );
    }
}
