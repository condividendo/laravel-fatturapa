<?php

namespace Condividendo\FatturaPA\Tests\Unit;

use PHPUnit\Framework\TestCase;
use SimpleXMLElement;

class ExampleTest extends TestCase
{
	
	/**
	 * @var SimpleXMLElement
	 **/
	private $xml;
	
	protected function setUp() : void {
		
		$invoice = \Condividendo\FatturaPA\FatturaPA::build()
					->setHeader(
						\Condividendo\FatturaPA\Tags\Header::make()
						->setTransmissionData(
							\Condividendo\FatturaPA\Tags\TransmissionData::make()
							->setTransmitterId(
								\Condividendo\FatturaPA\Tags\TransmitterId::make()
								->setCode("01879020517")
							)
							->setNumber("1")
							->setRecipientPec("grottarossasrls@pec.it")
						)
						->setSupplier(
							\Condividendo\FatturaPA\Tags\Supplier::make()
							->setTaxableEntity(
								\Condividendo\FatturaPA\Tags\TaxableEntity::make()
								->setVatNumber(
									\Condividendo\FatturaPA\Tags\VatNumber::make()
									->setVat("04565350404")
								)
								->setFiscalCode("04565350404")
								->setRegistry(
									\Condividendo\FatturaPA\Tags\Registry::make()
									->setCompanyName("Condividendo Italia srl")
								)
							)
							->setAddress(
								\Condividendo\FatturaPA\Tags\Address::make()
								->setStreet("Viale Sardegna")
								->setStreetNumber("31")
								->setZip("47838")
								->setCity("Riccione")
								->setProvinceOrState("RN")
								->setCountryCode("IT")
							)
							->setReaRegistration(
								\Condividendo\FatturaPA\Tags\REARegistration::make()
								->setOfficeCode("RN")
								->setReaNumber("RN-422261")
								->setCapital(10000)
								->setShareholders("SM")
								->setLiquidation("LN")
							)
							->setContacts(
								\Condividendo\FatturaPA\Tags\Contacts::make()
								->setEmail("fiscale@condividendo.eu")
							)
						)
						->setCustomer(
							\Condividendo\FatturaPA\Tags\Customer::make()
							->setTaxableEntity(
								\Condividendo\FatturaPA\Tags\TaxableEntity::make()
								->setVatNumber(
									\Condividendo\FatturaPA\Tags\VatNumber::make()
									->setVat("04302510401")
								)
								->setFiscalCode("04302510401")
								->setRegistry(
									\Condividendo\FatturaPA\Tags\Registry::make()
									->setCompanyName("GROTTA ROSSA S.R.L.S.")
								)
							)
							->setAddress(
								\Condividendo\FatturaPA\Tags\Address::make()
								->setStreet("Via Della Grotta Rossa")
								->setStreetNumber("13")
								->setZip("47923")
								->setCity("Rimini")
								->setProvinceOrState("RN")
								->setCountryCode("IT")
							)
						)
					)
					->setBody(
						\Condividendo\FatturaPA\Tags\Body::make()
						->setGeneralData(
							\Condividendo\FatturaPA\Tags\GeneralData::make()
							->setGeneralDocumentData(
								\Condividendo\FatturaPA\Tags\GeneralDocumentData::make()
								->setType(\Condividendo\FatturaPA\Enums\Type::TD01)
								->setDate("2022-10-18")
								->setNumber("FPR 1/22")
								->setAmount(12.20)
								->setDescription('Pagamento Commissioni per adesione circuito "Condividi lo Shopping"')
							)
						)
						->setGoodsServicesData(
							\Condividendo\FatturaPA\Tags\GoodsServicesData::make()
							->addItem(
								\Condividendo\FatturaPA\Tags\LineItem::make()
								->setLineNumber(1)
								->setDescription("Servizi pubblicitari")
								->setQuantity(1)
								->setUnitPrice(10)
								->setTotalPrice(10)
								->setVatTaxPercentage(22)
							)
							->setOverview(
								\Condividendo\FatturaPA\Tags\Overview::make()
								->setVatTaxAmount(22)
								->setTaxableAmount(10)
								->setDuty(2.20)
							)
						)
						->setPaymentDataData(
							\Condividendo\FatturaPA\Tags\PaymentData::make()
							->setPaymentDetail(
								\Condividendo\FatturaPA\Tags\PaymentDetail::make()
								->setPaymentMethod(\Condividendo\FatturaPA\Enums\PaymentMethod::SEPA_DIRECT_DEBIT_CORE)
								->setPaymentExpirationDate("2022-10-28")
								->setPaymentAmount(12.20)
							)
						)
					);
		$this->xml = $invoice->toXML();
		
		echo "setUp() complete. XML:\r\n" . $this->xml->asXML();
		
		parent::setUp(); 
	}
	
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
}
