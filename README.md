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
- The minimum required PHP version is PHP 5.4.0.
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
use sspat\ProfiRu\APIConnector;
use sspat\ProfiRu\HTTPClients\StreamHTTPClient;
use sspat\ProfiRu\Constants\Domains;

// Create an HTTP Client and pass your partnership SSL certificate and key paths
$httpClient = new StreamHTTPClient(
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
Requests to the `pagination` API require choosing an API domain and can be further configured with a second argument.
```php
$organizations = $api->getOrganizations(
    Domains::HEALTHCARE,
    [
         'city'   => Cities::MOSCOW,
         'from'   => 220,
         'count'  => 10,
         'scope'  => Scopes::SCOPE_FULL,
         'ip'     => '127.0.0.2',
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

The connector returns response objects. The actual response body can be retrieved like this:
```php
// Get Locations dictionary
$locations = $api->getLocations();
// Get response body as JSON
$locationsJson = $locations->getRaw();
// Get response body as Array
$locationsArr = $locations->getArray();
```

Handling errors
---------------

The response object processes all errors returned by the API and raises them in form of an exception.
```php
use sspat\ProfiRu\Exceptions\ErrorResponseException;

try {
    $services = $api->getServices();
} catch (ErrorResponseException $e) {
    var_dump($e->getErrors());
}
```

HTTP Clients
------------

The package needs an HTTP client to send the requests.
You can choose from one of the two supplied clients or create your own by implementing the sspat\ProfiRu\Contracts\HTTPClient interface.

| Class | Requirements |
| --- | --- |
| sspat\ProfiRu\HTTPClients\StreamHTTPClient | none |
| sspat\ProfiRu\HTTPClients\CurlHTTPClient | [ext-curl](http://php.net/manual/ru/book.curl.php) |

Validating response schema
--------------------------

The response objects can be further validated with schema validators.
This can become necessary, because the API response has no clear schema definition in the API documentation and has no changelog. To avoid unexpected changes you can validate the incoming responses JSON schema.
If the response schema contains new fields an exception will be thrown.
```php
use sspat\ProfiRu\Responses\Validators\ArrayValidator\LocationsValidator;
use sspat\ProfiRu\Exceptions\ResponseSchemaValidationException;

$locations = $api->getLocations();
$validator = new LocationsValidator();
try {
    $validator($locations);
} catch (ResponseSchemaValidationException $e) {
    var_dump($e->getNewFields());
    // ... do something about it
}
```
You can also provide your own schema definition. The schema is simply an array representation of the response
JSON. You can get a schema just decoding a correct JSON response to a PHP array. Wrap it in a class that returns 
this array with the `__invoke` magic method and it's ready to use.
```php
$schema = new MyCustomSchema();
$validator = new LocationsValidator();

$validator($locations, $schema());
```