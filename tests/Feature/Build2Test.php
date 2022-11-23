<?php

namespace Condividendo\FatturaPA\Tests\Feature;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Entities\Address;
use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Contacts;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Item;
use Condividendo\FatturaPA\Entities\PaymentData;
use Condividendo\FatturaPA\Entities\REARegistration;
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
                    ->setREARegistration(
                        REARegistration::make()
                            ->setREANumber("12123")
                            ->setOfficeCode("MI")
                            ->setShareHolders(ShareHolder::SM())
                            ->setCapital(BigDecimal::of('11111.00'))
                            ->setLiquidationStatus(LiquidationStatus::LN())
                    )
                    ->setTaxRegime(TaxRegime::RF01())
                    ->setContacts(
                        Contacts::make()
                            ->setEmail("fiscale@condividendo.eu")
                            ->setFax("02334455")
                    )
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
                    ->setDocumentAmount(BigDecimal::of('12.20'))
                    ->setDocumentDescription('Causale esempio')
                    ->setItems([
                        Item::make()
                            ->setNumber(1)
                            ->setDescription('Product description')
                            ->setPrice(BigDecimal::of('10.00'))
                            ->setTotalAmount(BigDecimal::of('10.00'))
                            ->setTaxRate(BigDecimal::of('0.22'))
                            ->setQuantity(BigDecimal::of('1.00')),
                    ])
                    ->setSummaryItems([
                        SummaryItem::make()
                            ->setTaxableAmount(BigDecimal::of('10.00'))
                            ->setTaxRate(BigDecimal::of('0.22'))
                            ->setTaxAmount(BigDecimal::of('2.20'))
                            ->setVatCollectionMode(VatCollectionMode::I()),
                    ])
                    ->setPaymentData(
                        PaymentData::make()
                            ->setPaymentMethod(PaymentMethod::MP21())
                            ->setPaymentAmount(BigDecimal::of('12.20'))
                            ->setPaymentExpirationDate("2022-10-28")
                            ->setPaymentCondition(PaymentCondition::TP02())
                    )
            );
    }
}
