# MacBook Serial Decoder

This is a simple library to decode MacBook serials (up to 2017 or 2018 I believe).

## Usage

Use in your application:

```
composer require tlamy/macbook-serial-decoder
```

## Lookup a serial

```php
<?php
require_once 'vendor/autoload.php';

$serialService = new \Tlamy\MacbookSerialDecoder\MacSerialService(new \Tlamy\MacbookSerialDecoder\TypeRepository());

$serialInfo = $serialService->lookup('C02NQJD9G3QD');

echo $serialInfo->model;        // "MacBook Pro (Retina, 15-inch, Mid 2014)"
echo $serialInfo->buildDate;    // "2014-11-24"
echo $serialInfo->location;     // "Tech Com-Quanta Computer Subsidiary, China"
```
