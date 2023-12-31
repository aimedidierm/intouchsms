# aimedidierm/intouchsms

[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][packagist]
[![Software License][badge-license]][license]
[![PHP Version][badge-php]][php]
[![Build Status][badge-build]][build]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

[badge-source]: http://img.shields.io/badge/source-aimedidierm/intouchsms-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/packagist/v/aimedidierm/intouchsms.svg?style=flat-square&label=release
[badge-license]: https://img.shields.io/packagist/l/aimedidierm/intouchsms.svg?style=flat-square
[badge-php]: https://img.shields.io/packagist/php-v/aimedidierm/intouchsms.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/aimedidierm/intouchsms/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coveralls/github/aimedidierm/intouchsms/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/aimedidierm/intouchsms.svg?style=flat-square&colorB=mediumvioletred
[source]: https://github.com/aimedidierm/intouchsms
[packagist]: https://packagist.org/packages/aimedidierm/intouchsms
[license]: https://github.com/aimedidierm/intouchsms/blob/master/LICENSE
[php]: https://php.net
[build]: https://travis-ci.org/aimedidierm/intouchsms
[coverage]: https://coveralls.io/r/aimedidierm/intouchsms?branch=master
[downloads]: https://packagist.org/packages/aimedidierm/intouchsms

This is a php library to help developers include sms service, with IntouchSms gateway from RWANDA

## Installation

Install this package as a dependency using [Composer](https://getcomposer.org).

```bash
composer require aimedidierm/intouchsms
```

## Usage

This is the documantion

```php
use Aimedidierm\IntouchSms\SmsSimple;

/** @var \Aimedidierm\IntouchSms\SmsSimple */
$sms = new SmsSimple();
$sms->recipients(["250788750979","0738584462"])
    ->message("Hello world")
    ->sender("intouchSenderId")
    ->username("intouchUsername")
    ->password("intouchPassword")
    ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
    ->callBackUrl("");
print_r($sms->send());

```

That code works well, however it does call some static parameters such as senderId,Username,Password,ApiUrl and CallbackUrl. we can solve this by creating another class Called Sms which extends SmsAbstract

```php

namespace App\Services;

use Aimedidierm\IntouchSms\SmsAbstract;

class Sms extends SmsAbstract
{
    public function __construct()
    {
        parent::__construct();

        //
    }

    public function configSender(): string
    {
        return "intouchSenderId";
    }

    public function configUsername(): string
    {
        return "intouchUsername";
    }

    public function configPassword(): string
    {
        return "intouchPassword";
    }

    public function configApiUrl(): string
    {
        return "www.intouchsms.co.rw/api/sendsms/.json";
    }

    public function configCallBackUrl(): string
    {
        return "";
    }


    public static function QuickSend($recipients, String $message, String $senderId = null)
    {
        $sms = new Sms();
        $sms->requiredData($recipients, $message, $senderId);
        return $sms->send();
    }
}

```

After creating this class you can now use simple codes like

```php

$sms = new Sms();
// first parameter is recipients and second one is message
$sms->requiredData(["250788750979","0738584462"], "Hello there");
print_r($sms->send());

```

NB: For some people who are not using composer remember to add:

```php
include_once("../vendor/autoload.php");
```

## Contributing

Contributions are welcome! Before contributing to this project, familiarize
yourself with [CONTRIBUTING.md](CONTRIBUTING.md).

To develop this project, you will need [PHP](https://www.php.net) 8.0 or greater,
[Composer](https://getcomposer.org),

After cloning this repository locally, execute the following commands:

```bash
cd /path/to/repository
composer install
```

Now, you are ready to develop!

## Copyright and License

This libraly is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
