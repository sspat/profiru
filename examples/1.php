<?php

declare(strict_types=1);

use GuzzleHttp\RequestOptions;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use sspat\ProfiRu\Client;
use sspat\ProfiRu\Constants\Domains;

ini_set('display_errors', 'true');
error_reporting(E_ALL & ~E_NOTICE);
require __DIR__ . '/../vendor/autoload.php';

$api = new Client(
    GuzzleAdapter::createWithConfig([
        RequestOptions::TIMEOUT => 5,
        RequestOptions::SSL_KEY => 'partner.key',
        RequestOptions::CERT => 'partner.crt',
        RequestOptions::VERIFY => false,
    ])
);

$specialists = $api->getSpecialists(Domains::HEALTHCARE);

var_dump($specialists->asArray());
