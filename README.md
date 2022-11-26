# FatturaPA

[![Latest Version](http://img.shields.io/packagist/v/condividendo/laravel-fatturapa.svg?label=Release&style=for-the-badge)](https://packagist.org/packages/condividendo/laravel-fatturapa)
[![MIT License](https://img.shields.io/github/license/condividendo/laravel-fatturapa.svg?label=License&color=blue&style=for-the-badge)](https://github.com/condividendo/laravel-fatturapa/blob/master/LICENSE.md)

This package allows you to generate the XML of Italian eInvoice (aka [FatturaPA](https://www.fatturapa.gov.it/)).

Useful links:
- [FatturaPA documentation](https://www.fatturapa.gov.it/it/norme-e-regole/documentazione-fattura-elettronica/formato-fatturapa/)

## Installation

```shell
composer require condividendo/laravel-fatturapa
```

## Usage

```php
$invoice = \Condividendo\FatturaPA\FatturaPA::build()
    ->senderId('IT', '01879020517')
    ->transmissionFormat(\Condividendo\FatturaPA\Enums\TransmissionFormat::FPR12())
    ->transmissionSequence('1')
    ->recipientCode('ABC1234')
    ->supplier(
        \Condividendo\FatturaPA\Entities\Supplier::make()
            ->name('Condividendo italia srl')
            ->vatNumber('IT12345640962')
            ->taxRegime(\Condividendo\FatturaPA\Enums\TaxRegime::RF01())
            ->address(
                \Condividendo\FatturaPA\Entities\Address::make()
                    ->addressLine('Via Italia, 123')
                    ->postalCode('123456')
                    ->city('Milano')
                    ->province('MI')
                    ->country('IT')
            )
    )
    ->customer(
        \Condividendo\FatturaPA\Entities\Customer::make()
            ->firstName('Mario')
            ->lastName('Rossi')
            ->fiscalCode('RSSMRA73L09Z103F')
            ->address(
                \Condividendo\FatturaPA\Entities\Address::make()
                    ->addressLine('Via Italia, 123')
                    ->postalCode('123456')
                    ->city('Milano')
                    ->province('MI')
                    ->country('IT')
            )
    )
    ->addBody(
        \Condividendo\FatturaPA\Entities\Body::make()
            ->type(\Condividendo\FatturaPA\Enums\Type::TD01())
            ->currency('EUR')
            ->number('1')
            ->items([
                \Condividendo\FatturaPA\Entities\Item::make()
                    ->number(1)
                    ->description('Product description')
                    ->price('10.00')
                    ->taxRate('0.22')
            ])
            ->summaryItems([
                \Condividendo\FatturaPA\Entities\SummaryItem::make()
                    ->taxableAmount('10.00')
                    ->taxRate('0.22')
            ])
    );
    
/** @var \SimpleXMLElement $xml */
$xml = $invoice->toXML();

// do whatever you want with $xml variable...
```

## Changelog

Please see [Changelog File](CHANGELOG.md) for more information on what has changed recently.

## Testing

```shell
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
