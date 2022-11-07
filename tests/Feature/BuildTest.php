<?php

namespace Condividendo\FatturaPA\Tests\Feature;

use Condividendo\FatturaPA\Entities\Body;
use Condividendo\FatturaPA\Enums\TransmissionFormat;
use Condividendo\FatturaPA\FatturaPA;
use Condividendo\FatturaPA\Tests\TestCase;

class BuildTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_build()
    {
        /** @var string $xml */
        $xml = FatturaPA::build()
            ->setSenderId('IT', '0123456789')
            ->setTransmissionSequence('1')
            ->setTransmissionFormat(TransmissionFormat::FPR12())
            ->setRecipientCode('ABC1234')
            ->setSupplier(
                \Condividendo\FatturaPA\Entities\Supplier::make()
                    ->setName('Condividendo Italia srl')
                    ->setVatNumber('IT', '12345640962')
                    ->setAddress(
                        \Condividendo\FatturaPA\Entities\Address::make()
                            ->setStreet('Via Italia')
                            ->setStreetNumber('123')
                            ->setPostalCode('123456')
                            ->setCity('Milano')
                            ->setProvince('MI')
                            ->setCountry('IT')
                    )
                    ->setREARegistration(
                        \Condividendo\FatturaPA\Entities\REARegistration::make()
                            ->setREANumber("12123")
                            ->setOfficeCode("MI")
                            ->setShareHolders(\Condividendo\FatturaPA\Enums\ShareHolder::SM())
                            ->setCapital(11111)
                            ->setLiquidationStatus(\Condividendo\FatturaPA\Enums\LiquidationStatus::LN())
                    )
                    ->setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime::RF01())
                    ->setContacts(
                        \Condividendo\FatturaPA\Entities\Contacts::make()
                        ->setEmail("fiscale@condividendo.eu")
                    )
            )
            ->setCustomer(
                \Condividendo\FatturaPA\Entities\Customer::make()
                    ->setFirstName('Mario')
                    ->setLastName('Rossi')
                    ->setFiscalCode('RSSMRA73L09Z103F')
                    ->setAddress(
                        \Condividendo\FatturaPA\Entities\Address::make()
                            ->setStreet('Via Italia')
                            ->setStreetNumber('123')
                            ->setPostalCode('123456')
                            ->setCity('Milano')
                            ->setProvince('MI')
                            ->setCountry('IT')
                    )
            )
            ->addBody(
                \Condividendo\FatturaPA\Entities\Body::make()
                    ->setType(\Condividendo\FatturaPA\Enums\Type::TD01())
                    ->setCurrency('EUR')
                    ->setDate('2022-01-23')
                    ->setNumber('1')
                    ->setDocumentAmount(12.20)
                    ->setDocumentDescription('Causale esempio')
                    ->setItems([
                        \Condividendo\FatturaPA\Entities\Item::make()
                            ->setNumber(1)
                            ->setDescription('Product description')
                            ->setPrice(10.0)
                            ->setTotalAmount(10.0)
                            ->setTaxRate(0.22)
                            ->setQuantity(1.0)
                    ])
                    ->setSummaryItems([
                        \Condividendo\FatturaPA\Entities\SummaryItem::make()
                            ->setTaxableAmount(10.0)
                            ->setTaxRate(0.22)
                            ->setTaxAmount(2.2)
                            ->setVatCollectionMode(\Condividendo\FatturaPA\Enums\VatCollectionMode::I())
                    ])
                    ->setPaymentData(
                        \Condividendo\FatturaPA\Entities\PaymentData::make()
                            ->setPaymentMethod(\Condividendo\FatturaPA\Enums\PaymentMethod::MP21())
                            ->setPaymentAmount(12.2)
                            ->setPaymentExpirationDate("2022-10-28")
                            ->setPaymentCondition(\Condividendo\FatturaPA\Enums\PaymentCondition::TP02())
                    )
            )
            ->toXML()
            ->asXML();

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/1.xml', $xml);
    }
}
