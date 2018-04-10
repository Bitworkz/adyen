# PHP simplified Adyen library

[![Build Status](https://travis-ci.org/bitworkz/adyen.svg?branch=master)](https://travis-ci.org/bitworkz/adyen)
[![Latest Stable Version](http://img.shields.io/packagist/v/bitworkz/adyen.svg)](https://packagist.org/packages/bitworkz/adyen)
[![License](https://img.shields.io/github/license/bitworkz/adyen.svg)](https://packagist.org/packages/bitworkz/adyen)

## Description ##
This library is a simplified library to work with the adyen-php-api-library

## Getting Started ##
Make sure you have an Adyen account. You can make an account <a href="https://www.adyen.com/home/discover/test-account-signup#form" target="_blank">here</a>. Configure a payment skin under your settings with all needed payment options.

## DISCLAIMER ##
The ownership of the content of the Adyen API Library remains with Bitworkz. The content of the Adyen Library may only be used in connection with the services of Adyen and subject to the applicable license (MIT, the “License”), a copy of which is included in the library. 
Unless required by applicable law or agreed to in writing, the library is offered and/or distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. Bitworkz does not warrant that the library or any content will be available uninterrupted or error free, that defects will be corrected, or that the library or its supporting systems are free of viruses or bugs. Please refer to the License for the specific language governing permissions and limitations under the License.

## Documentation ##
http://adyen.github.io/adyen-php-api-library/

## Installation ##
You can use Composer or simply Download the Release

## Composer ##

The preferred method is via [composer](https://getcomposer.org). Follow the
[installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have
composer installed.


Once composer is installed, execute the following command in your project root to install this library:

```sh
composer require bitworkz/adyen
```

## Examples ##
List all available payment methods:

```php
$adyen = new Adyen();
$adyen
    ->setAmount('10')
    ->setCountryCode('BE')
    ->setCurrency('EUR')
    ->setEnvironment('test')
    ->setHmacCode('[HMAC-of-your-skin]')
    ->setLocale('nl_BE')
    ->setMerchant('[your-merchant-code]')
    ->setMerchantReference('Get payment methods')
    ->setSkinCode('[your-skin-code]');

$adyenPaymentMethods = $adyen->listPaymentMethods();
```

Make a payment with credit card:

```php
$adyen = new Adyen();
$adyen
    ->setWsUser('[your-ws-user]')
    ->setWsPassword('[your-ws-user-password]')
    ->setAmount('10')
    ->setCurrency('EUR')
    ->setMerchant('[your-merchant-code]')
    ->setClientEmail('[client-email]')
    ->setClientReference('Client123')
    ->setPaymentReference('Order123')
    ->setEncryptedData('[encrypted-payment-data]')
    ->setAuthUrl('https://pal-test.adyen.com/pal/servlet/Payment/v25/authorise')
;

$paymentResult = $adyen->pay();
```
Information about encrypting the form data can be found <a href="https://pal-test.adyen.com/pal/servlet/Payment/v25/authorise" target="_blank">here</a>


Generate a payment form for bank transfer payment method:

```php
$adyen = new Adyen();
$adyen
    ->setAmount('10')
    ->setCurrency('EUR')
    ->setHmacCode('[your-skins-hmac-code]')
    ->setLocale('nl_BE')
    ->setMerchant('[your-merchant-code]')
    ->setClientEmail('[client-email]')
    ->setClientReference('client123')
    ->setResultUrl('http://www.url-to-return-after-payment.com')
    ->setBrandCode('directEbanking')
    ->setMerchantReference('order123')
    ->setSkinCode('[your-skin-code]')
;

$paymentForm = $adyen->generatePaymentForm();
```

Make a refund

```php
$adyen = new Adyen();
$adyen
    ->setMerchant('[your-merchant-code]')
    ->setWsUser('[your-ws-user]')
    ->setWsPassword('[your-ws-user-password]')
    ->setEnvironment('test')
    ->setAmount('10')
    ->setCurrency('EUR')
    ->setPayId('[adyen-payment-id]')
    ->setMerchantReference('order123')
    ->setRefundUrl('https://pal-test.adyen.com/pal/Payment.wsdl')
;

$result = $adyen->refund();
```
