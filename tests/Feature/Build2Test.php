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
            ->senderId('IT', '0123456789')
            ->transmissionSequence('1')
            ->transmissionFormat(TransmissionFormat::FPR12())
            ->senderEmail("john@doe.com")
            ->senderPhone("3334455678")
            ->recipientCode('ABC1234')
            ->supplier(
                Supplier::make()
                    ->companyName('Condividendo Italia srl')
                    ->vatNumber('IT12345640962')
                    ->address(
                        Address::make()
                            ->addressLine('Via Italia')
                            ->streetNumber('123')
                            ->postalCode('12345')
                            ->city('Milano')
                            ->province('MI')
                            ->country('IT')
                    )
                    ->REANumber("12123")
                    ->REAOfficeCode("MI")
                    ->REAShareHolders(ShareHolder::SM())
                    ->REACapital('11111.00')
                    ->REALiquidationStatus(LiquidationStatus::LN())
                    ->taxRegime(TaxRegime::RF01())
                    ->contactsEmail("fiscale@condividendo.eu")
                    ->contactsFax("02334455")
            )
            ->customer(
                Customer::make()
                    ->firstName('Mario')
                    ->lastName('Rossi')
                    ->fiscalCode('RSSMRA73L09Z103F')
                    ->address(
                        Address::make()
                            ->addressLine('Via Italia')
                            ->streetNumber('123')
                            ->postalCode('12345')
                            ->city('Milano')
                            ->province('MI')
                            ->country('IT')
                    )
            )
            ->addBody(
                Body::make()
                    ->type(Type::TD01())
                    ->currency('EUR')
                    ->date('2022-01-23')
                    ->number('1')
                    ->documentAmount('12.20')
                    ->documentDescription('Causale esempio')
                    ->items([
                        Item::make()
                            ->number(1)
                            ->description('Product description')
                            ->price('10.00')
                            ->totalAmount('10.00')
                            ->taxRate('0.22')
                            ->quantity('1.00'),
                    ])
                    ->summaryItems([
                        SummaryItem::make()
                            ->taxableAmount('10.00')
                            ->taxRate('0.22')
                            ->taxAmount('2.20')
                            ->vatCollectionMode(VatCollectionMode::I()),
                    ])
                    ->paymentMethod(PaymentMethod::MP21())
                    ->paymentAmount('12.20')
                    ->paymentExpirationDate("2022-10-28")
                    ->paymentCondition(PaymentCondition::TP02())
            );
    }
}
