# Profi.ru partership program API client
[![Author](https://img.shields.io/badge/author-@sspat-blue.svg?style=flat-square)](https://moikrug.ru/sspat)
[![GitHub tag](https://img.shields.io/github/tag/sspat/profiru.svg)]()
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://github.com/sspat/profiru/blob/master/LICENSE)

Features
--------
This package provides easy access to the [Profi.ru partnership program API](https://reg.profi.ru/partner/). 

After registering on the program and receiving your SSL certificate and key you 
can use the API right away.

Currently implemented in the package are the `dictionary` and `pagination` API's.
The `provisioning` API will be implemented in future releases. 

Requirements
------------
- The minimum required PHP version is PHP 7.3.0.
- You will need an SSL certificate and public key provided by the Profi.ru 
partnership program representatives to get access to the API

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require sspat/profiru
```

or add

```
"sspat/profiru": "*"
```

to the require section of your `composer.json` file.

Usage
-----
**Sending requests to the API** 
```php
use GuzzleHttp\RequestOptions;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use sspat\ProfiRu\Client;
use sspat\ProfiRu\Constants\Domains;

// Create an instance of any PSR-18 compliant HTTP Client and pass your partnership SSL certificate and key paths
$httpClient = GuzzleAdapter::createWithConfig([
    RequestOptions::TIMEOUT => 5,
    RequestOptions::SSL_KEY => 'partner.key',
    RequestOptions::CERT => 'partner.crt',
    RequestOptions::VERIFY => false,
]);
// Create an instance of the API client, passing the HTTP client to it
$api = new Client($httpClient);

// Get Locations dictionary
$locations = $api->getLocations();
// Get Services dictionary
$services = $api->getServices();

// For requests to the pagination API an API domain must be specified
$organizations = $api->getOrganizations(Domains::HEALTHCARE);
$specialists = $api->getSpecialists(Domains::BEAUTY);
```
Requests to the `pagination` API require choosing an API domain and can be further configured with a second argument.
```php
$organizations = $api->getOrganizations(
    Domains::HEALTHCARE,
    [
         'city'   => Cities::MOSCOW,
         'from'   => 220,
         'count'  => 10,
         'scope'  => Scopes::SCOPE_FULL,
         'ip'     => '144.135.23.1',
         'models' => [
             Models::ASSOCIATION,
             Models::ASSOCIATION_STRUCTURE_UNIT
         ]
    ]
);
```

Supported domains for the `pagination` API

| Domain | Description | Supported cities |
| --- | --- | --- |
| dktr | Healthcare | msk, spb |
| krst | Beauty | msk, spb |

Supported additional parameters for the `pagination` API

| Parameter | Description | Default | Possible values | Constant class |
| --- | --- | --- | --- | --- |
| city | The pagination API can return entries only for a single city at once. Different domains support different sets of cities. Moscow is supported by all domains, so it is the default value. | msk | Depends on domain | [\sspat\ProfiRu\Constants\Cities](https://github.com/sspat/profiru/blob/master/src/Constants/Cities.php) |   
| from | Used for skipping a number of entries for pagination | 0 | Positive integers | |
| count | Number of entries per page | 20 | 1-20 | |
| scope | Defines the ammount of data retrieved for each entry | profile.mini | profile.mini, profile.full | [\sspat\ProfiRu\Constants\Scopes](https://github.com/sspat/profiru/blob/master/src/Constants/Scopes.php) |
| ip | IP address of the API client | 127.0.0.1 | IPv4/IPv6 address | |
| models | Types of entries to get from the API | Depends on whether you request organizations or specialists | Depends on whether you request organizations or specialists | [\sspat\ProfiRu\Constants\Models](https://github.com/sspat/profiru/blob/master/src/Constants/Models.php) |

Getting the response
--------------------

The client returns response objects that already contain the API response in form of an array.
You can also retrieve the PSR-7 response object if you need additional response data.
```php
// Get Locations dictionary
$locations = $api->getLocations();
// Get response body as Array
$locationsArray = $locations->asArray();
// Get PSR-7 response object
$psrResponse = $locations->response();
var_dump((string) $psrResponse->getBody());
```

Handling errors
---------------

The response object processes all errors returned by the API and raises them in form of an exception.
```php
use sspat\ProfiRu\Exceptions\ErrorResponse;

try {
    $services = $api->getServices();
} catch (ErrorResponse $e) {
    var_dump($e->getErrors());
}
```
