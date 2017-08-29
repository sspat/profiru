<?php
namespace sspat\ProfiRu\Tests\Responses\Validators\ArrayValidator;

use sspat\ProfiRu\Exceptions\ResponseSchemaValidationException;
use sspat\ProfiRu\Tests\Stubs\Responses\ResponseStub;
use sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\ArrayValidatorStub;
use sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\Schemas\TestSchema;

class ArrayValidatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var string */
    protected $correctResponse;

    /** @var string */
    protected $wrongResponse;

    public function setUp()
    {
        $this->correctResponse = json_encode([
            "property" => "value",
            "nested" => [
                [
                    "property" => "value",
                    "nested" => [
                        "nested" => [
                            "property" => "value"
                        ]
                    ]
                ]
            ]
        ]);

        $this->wrongResponse = json_encode([
            "property" => "value",
            "nested" => [
                [
                    "wrong_property" => "value",
                    "wrong_nested" => [
                        "nested" => [
                            "property" => "value"
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function tearDown()
    {
        $this->correctResponse = null;
        $this->wrongResponse = null;
    }

    public function testCorrectResponseValidates()
    {
        $response = new ResponseStub($this->correctResponse);

        try {
            ArrayValidatorStub::validate($response);
            self::assertTrue(true);
        } catch (ResponseSchemaValidationException $e) {
            self::assertTrue(false);
        }
    }

    public function testValidatorInvocation()
    {
        $response = new ResponseStub($this->correctResponse);

        try {
            $validator = new ArrayValidatorStub();
            $validator($response);
            self::assertTrue(true);
        } catch (ResponseSchemaValidationException $e) {
            self::assertTrue(false);
        }
    }

    public function testWrongResponseValidatesNot()
    {
        $response = new ResponseStub($this->wrongResponse);

        self::expectException(ResponseSchemaValidationException::class);
        ArrayValidatorStub::validate($response);
    }

    public function testWrongResponseValidationExceptionContainsNewFields()
    {
        $response = new ResponseStub($this->wrongResponse);

        try {
            ArrayValidatorStub::validate($response);
            self::assertTrue(false);
        } catch (ResponseSchemaValidationException $e) {
            self::assertArraySubset(
                [
                    [
                        "trace" => "[\"nested\"][\"0\"][\"wrong_property\"]"
                    ],
                    [
                        "trace" => "[\"nested\"][\"0\"][\"wrong_nested\"]"
                    ]
                ],
                $e->getNewFields()
            );
        }
    }

    public function testCustomSchemaValidates()
    {
        $response = new ResponseStub($this->correctResponse);

        // test static call
        try {
            ArrayValidatorStub::validate($response, new TestSchema());
            self::assertTrue(true);
        } catch (ResponseSchemaValidationException $e) {
            self::assertTrue(false);
        }
    }
}
