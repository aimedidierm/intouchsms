
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Aimedidierm\IntouchSms\SmsSimple;

/** @var \Aimedidierm\IntouchSms\SmsSimple */
$sms = new SmsSimple();
$sms->recipients(["0788750979"])
    ->message("Hello world")
    ->sender("intouchSenderId")
    ->username("intouchUsername")
    ->password("intouchPassword")
    ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
    ->callBackUrl("");
print_r($sms->send());
