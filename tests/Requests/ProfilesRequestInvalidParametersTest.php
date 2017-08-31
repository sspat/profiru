<?php
namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterException;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterValueException;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestInvalidParametersTest extends TestCase
{
    public function testInvalidCityParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['city' => 'test']);
    }

    public function testInvalidFromParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['from' => '1']);

        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['from' => -1]);
    }

    public function testInvalidCountParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => '1']);

        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => Defaults::MIN_PROFILES_PER_PAGE-1]);

        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => Defaults::MAX_PROFILES_PER_PAGE+1]);
    }

    public function testInvalidScopeParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['scope' => 'test']);
    }

    public function testInvalidIPParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['ip' => 'test']);
    }

    public function testInvalidModelParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['models' => ['test']]);

        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['models' => [Models::ASSOCIATION]]);
    }

    public function testDomainChangeThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['domain' => Domains::BEAUTY]);
    }

    public function testInvalidPropertyThrowsException()
    {
        $this->expectException(InvalidRequestParameterException::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['test' => 'test']);
    }
}
