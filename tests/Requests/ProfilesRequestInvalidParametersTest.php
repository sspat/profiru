<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Requests;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Exceptions\InvalidRequestParameter;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterValue;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestInvalidParametersTest extends TestCase
{
    public function testInvalidCityParameterThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['city' => 'test']);
    }

    public function testInvalidFromParameterThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['from' => -1]);
    }

    public function testInvalidCountParameterThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => Defaults::MIN_PROFILES_PER_PAGE-1]);

        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['count' => Defaults::MAX_PROFILES_PER_PAGE+1]);
    }

    public function testInvalidScopeParameterThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['scope' => 'test']);
    }

    public function testInvalidIPParameterThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['ip' => 'test']);
    }

    public function testInvalidModelParameterThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['models' => ['test']]);

        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['models' => [Models::ASSOCIATION]]);
    }

    public function testDomainChangeThrowsException() : void
    {
        $this->expectException(InvalidRequestParameterValue::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['domain' => Domains::BEAUTY]);
    }

    public function testInvalidPropertyThrowsException() : void
    {
        $this->expectException(InvalidRequestParameter::class);
        new ProfilesRequestStub(Domains::HEALTHCARE, ['test' => 'test']);
    }
}
