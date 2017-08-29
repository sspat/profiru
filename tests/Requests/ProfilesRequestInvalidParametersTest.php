<?php
namespace sspat\ProfiRu\Tests\Requests;

use sspat\ProfiRu\Constants\Defaults;
use sspat\ProfiRu\Constants\Domains;
use sspat\ProfiRu\Constants\Models;
use sspat\ProfiRu\Exceptions\InvalidRequestParameterValueException;
use sspat\ProfiRu\Tests\Stubs\Requests\ProfilesRequestStub;

class ProfilesRequestInvalidParametersTest extends \PHPUnit_Framework_TestCase
{
    /** @var ProfilesRequestStub */
    private $request;

    /** @var string */
    private $domain;

    protected function setUp()
    {
        $this->domain = Domains::HEALTHCARE;
        $this->request = new ProfilesRequestStub($this->domain);
    }

    protected function tearDown()
    {
        $this->request = null;
        $this->domain = null;
    }

    public function testInvalidCityParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setCity('test');
    }

    public function testInvalidFromParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setFrom('1');

        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setFrom(-1);
    }

    public function testInvalidCountParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setCount('1');

        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setCount(Defaults::MIN_PROFILES_PER_PAGE-1);

        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setCount(Defaults::MAX_PROFILES_PER_PAGE+1);
    }

    public function testInvalidScopeParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setScope('test');
    }

    public function testInvalidIPParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setIP('test');
    }

    public function testInvalidModelParameterThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setModels(['test']);

        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setModels([Models::ASSOCIATION]);
    }

    public function testDomainChangeThrowsException()
    {
        $this->expectException(InvalidRequestParameterValueException::class);
        $this->request->setDomain(Domains::BEAUTY);
    }
}
