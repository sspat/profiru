<?php
namespace sspat\ProfiRu\Tests\Responses\Validators\ArrayValidator;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Exceptions\ResponseSchemaValidationException;
use sspat\ProfiRu\Tests\Stubs\Responses\ResponseStub;
use sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\ArrayValidatorStub;
use sspat\ProfiRu\Tests\Stubs\Responses\Validators\ArrayValidator\Schemas\TestSchema;

class ArrayValidatorTest extends TestCase
{
    /** @var string */
    protected $correctResponse;

    /** @var string */
    protected $wrongResponse;

    public function setUp()
    {
        $this->correctResponse = json_encode([
            'property' => 'value',
            'nested' => [
                [
                    'property' => 'value',
                    'nested' => [
                        'nested' => [
                            'property' => 'value'
                        ]
                    ]
                ]
            ]
        ]);

        $this->wrongResponse = json_encode([
            'property' => 'value',
            'nested' => [
                [
                    'wrong_property' => 'value',
                    'wrong_nested' => [
                        'nested' => [
                            'property' => 'value'
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
        $validator = new ArrayValidatorStub();
        $validator($response);
    }

    public function testWrongResponseValidatesNot()
    {
        $response = new ResponseStub($this->wrongResponse);

        $this->expectException('sspat\ProfiRu\Exceptions\ResponseSchemaValidationException');
        $validator = new ArrayValidatorStub();
        $validator($response);
    }

    public function testWrongResponseValidationExceptionContainsNewFields()
    {
        $response = new ResponseStub($this->wrongResponse);

        try {
            $validator = new ArrayValidatorStub();
            $validator($response);
            $this->fail();
        } catch (ResponseSchemaValidationException $e) {
            $this->assertArraySubset(
                [
                    [
                        'trace' => '["nested"]["0"]["wrong_property"]'
                    ],
                    [
                        'trace' => '["nested"]["0"]["wrong_nested"]'
                    ]
                ],
                $e->getNewFields()
            );
        }
    }

    public function testCustomSchemaValidates()
    {
        $response = new ResponseStub($this->correctResponse);
        $validator = new ArrayValidatorStub();
        $customSchema = new TestSchema();
        $validator($response, $customSchema());
    }
}
