# Profi.ru partership program API connector
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
- The minimum required PHP version is PHP 5.3.0.
- `php-curl` extension
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
Sending request to the API 
```php
use sspat\Profiru\APIConnector;
use sspat\ProfiRu\HTTPClients\CurlHTTPClient;
use sspat\ProfiRu\Constants\Domains;

// Create a HTTP Client and pass your partnership SSL certificate and key paths
$httpClient = new CurlHTTPClient(
    realpath(__DIR__.'/../partner.crt'),
    realpath(__DIR__.'/../partner.key')
);
// Create an instance of the API Connector, passing the HTTP client to it
$api = new APIConnector($httpClient);

// Get Locations dictionary
$locations = $api->getLocations();
// Get Services dictionary
$services = $api->getServices();

// For requests to the pagination API an API domain must be specified
$organizations = $api->getOrganizations(Domains::HEALTHCARE);
$specialists = $api->getSpecialists(Domains::BEAUTY);
```
The connector returns response objects. The actual response body can be retrieved like this:
```php
// Get Locations dictionary
$locations = $api->getLocations();
// Get response body as JSON
$locations->getRaw();
// Get response body as Array
$locations->getArray();
```
The response objects can be further validated with schema validators.
This can become necessary, because the API response has no clear schema definition in the API documentation and has no changelog. To avoid unexpected changes you can validate the incoming responses JSON schema.
If the response schema contains new fields an exception will be thrown.
```php
use sspat\ProfiRu\Responses\Validators\ArrayValidator\LocationsValidator;
use sspat\ProfiRu\Exceptions\ResponseSchemaValidationException;

$locations = $api->getLocations();
try {
    LocationsValidator::validate($locations);
} catch (ResponseSchemaValidationException $e) {
    var_dump($e->getNewFields());
    // ... do something about it
}
```
You can also provide your own schema definition, see the current schemas in the package for more information.
```php
$schema = new MyCustomSchema();

LocationsValidator::validate($locations, $schema);
```