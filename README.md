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

### Build

```php
$invoice = \Condividendo\FatturaPA\FatturaPA::build()
    ->setRecipientCode('ABCXCR1')
    ->setType(\Condividendo\FatturaPA\Enums\Type::TD01())
    ->setCurrency('EUR')
    ->setDate('2022-01-23')
    ->setNumber('1')
    ->setSupplier(
        \Condividendo\FatturaPA\Supplier::make()
            ->setName('Condividendo italia srl')
            ->setVatNumber('IT', '12345640962')
            ->setAddress(
                \Condividendo\FatturaPA\Address::make()
                    ->setAddress('Via Italia, 123')
                    ->setPostalCode('123456')
                    ->setCity('Milano')
                    ->setProvince('MI')
                    ->setCountry('IT')
            )
    )
    ->setCustomer(
        \Condividendo\FatturaPA\Customer::make()
            ->setFirstName('Mario')
            ->setLastName('Rossi')
            ->setFiscalCode('RSSMRA73L09Z103F')
            ->setAddress(
                \Condividendo\FatturaPA\Address::make()
                    ->setAddress('Via Italia, 123')
                    ->setPostalCode('123456')
                    ->setCity('Milano')
                    ->setProvince('MI')
                    ->setCountry('IT')
            )
    )
    ->setItems([
        \Condividendo\FatturaPA\Item::make()
            ->setNumber(1)
            ->setDescription('Product description')
            ->setPrice(10.0)
            ->setTotalAmount(10.0)
            ->setTaxRate(0.22)
    ])
    ->setSummary([
        \Condividendo\FatturaPA\SummaryItem::make()
            ->setTaxableAmount(10.0)
            ->setTaxRate(0.22)
            ->setTaxAmount(2.2)
    ]);
```

### Convert to XML

```php
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
