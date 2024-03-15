# An SDK to easily work with the Asnef API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/benkigroup/asnef-Benkigroup-sdk.svg?style=flat-square)](https://packagist.org/packages/benkigroup/asnef-Benkigroup-sdk)
[![Build Status](https://img.shields.io/travis/benkigroup/asnef-Benkigroup-sdk/master.svg?style=flat-square)](https://travis-ci.org/benkigroup/asnef-benkigroup-sdk)
[![Quality Score](https://img.shields.io/scrutinizer/g/benkigroup/asnef-Benkigroup-sdk.svg?style=flat-square)](https://scrutinizer-ci.com/g/benkigroup/asnef-benkigroup-sdk)
[![Total Downloads](https://img.shields.io/packagist/dt/benkigroup/asnef-Benkigroup-sdk.svg?style=flat-square)](https://packagist.org/packages/benkigroup/asnef-benkigroup-sdk)

This SDK lets you perform API calls to [Asnef Benkigroup](https://asnef.bnk.mobi).

## Documentation

First, grab the latest stable version via composer.

    composer require benkigroup/asnef-benkigroup-sdk

Next, create an instance of the SDK. This takes token mandatory, parameter.

    $token = "xxxxxx";
    
    $asnef = new \Asnef\Benkigroup\Asnef($token);
    $asnef = new \Asnef\Benkigroup\Asnef($token, 'https://test.asnef.bnk.mobi/api/client');
    
    $transaction = $asnef->consult('personalid');
    $transaction = $asnef->consult('personalid', 'customer_id', 'lead_id');
    $transaction = $asnef->consult('personalid', 'customer_id', 'lead_id'); //with reference customer_id and lead_id your system

    $transaction = $asnef->consult('personalid', 'customer_id', 'lead_id', 'true'); //force the request to service asnef without reutilize previous request
    
    $transaction = $asnef->consultTransaction('2');
    $transaction = $asnef->transaction('2', true); // transaction with details
    
    $transaction->valid();
    $transaction->invalid();
 
    $transaction = $asnef->consultTransactionByLead('2345');
    $transaction = $asnef->consultTransactionByLead('2345', true); // transaction by lead_id with details

    $operations = $asnef->consultOperations($transaction->id);
    $monthly_informations = $asnef->consultMonthlyInformations($transaction->id);



Once the SDK has been initiated, you can continue adding an identity document to check your data in asnef .


## Security

If you discover any security related issues, please email antonio@benkigroup.com instead of using the issue tracker.

## Credits

- [Antonio Ramírez Aberasturis.](https://github.com/benkigroup)
- [Maikel Enrique Pernía](https://github.com/benkigroup)

This package uses code from and is greatly inspired by the [Oh Dear SDK package](https://github.com/ohdearapp/ohdear-php-sdk) by [Freek Van der Herten](https://github.com/freekmurze).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
