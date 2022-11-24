<?php

namespace Condividendo\FatturaPA\Tests\Feature;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Entities\Address;
use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Entities\Contacts;
use Condividendo\FatturaPA\Entities\Customer;
use Condividendo\FatturaPA\Entities\Item;
use Condividendo\FatturaPA\Entities\SummaryItem;
use Condividendo\FatturaPA\Entities\Supplier;
use Condividendo\FatturaPA\Enums\LiquidationStatus;
use Condividendo\FatturaPA\Enums\Nature;
use Condividendo\FatturaPA\Enums\PaymentCondition;
use Condividendo\FatturaPA\Enums\PaymentMethod;
use Condividendo\FatturaPA\Enums\RegulatoryReference;
use Condividendo\FatturaPA\Enums\ShareHolder;
use Condividendo\FatturaPA\Enums\TaxRegime;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\Enums\Type;
use Condividendo\FatturaPA\FatturaPA;
use Condividendo\FatturaPA\FatturaPABuilder;
use Condividendo\FatturaPA\Tests\TestCase;

class Build4Test extends TestCase
{
    public function test_xml(): void
    {
        $xml = $this->build()->toXML()->asXML();
        assert(is_string($xml));

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/4.xml', $xml);
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
            ->setRecipientCode('ABC1234')
            ->setRecipientCountryId("SM")
            ->setSupplier(
                Supplier::make()
                    ->setName('Esempio azienda S. Marino srl')
                    ->setVatNumber('SM', '012345')
                    ->setAddress(
                        Address::make()
                            ->setStreet('Via Test')
                            ->setStreetNumber('1')
                            ->setPostalCode('1')
                            ->setCity('San Marino')
                            ->setProvince('SM')
                            ->setCountry('SM')
                    )
                    ->setREANumber("12123")
                    ->setREAOfficeCode("MI")
                    ->setREAShareHolders(ShareHolder::SM())
                    ->setREACapital(BigDecimal::of('11111.00'))
                    ->setREALiquidationStatus(LiquidationStatus::LN())
                    ->setTaxRegime(TaxRegime::RF01())
                    ->setContacts(
                        Contacts::make()
                            ->setEmail("fiscale@esempio.eu")
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
                            ->setTaxRate(BigDecimal::of('0.00'))
                            ->setTaxAmount(BigDecimal::of('0.00'))
                            ->setNature(Nature::N3_3())
                            ->setRegulatoryReference(RegulatoryReference::N3_3()),
                    ])
                    ->setPaymentMethod(PaymentMethod::MP21())
                    ->setPaymentAmount(BigDecimal::of('12.20'))
                    ->setPaymentExpirationDate("2022-10-28")
                    ->setPaymentCondition(PaymentCondition::TP02())
            );
    }
}
