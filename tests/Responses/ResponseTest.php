<?php
namespace sspat\ProfiRu\Tests\Responses;

use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Exceptions\ErrorResponseException;
use sspat\ProfiRu\Tests\Stubs\Responses\ResponseStub;

class ResponseTest extends TestCase
{
    protected $responseJson = '["test",[1,2]]';

    public function testRawResponse()
    {
        $response = new ResponseStub($this->responseJson);

        $this->assertEquals(
            $response->getRaw(),
            $this->responseJson
        );
    }

    public function testArrayResponse()
    {
        $response = new ResponseStub($this->responseJson);

        $this->assertEquals(
            json_encode($response->getArray()),
            $this->responseJson
        );
    }

    public function testErrorResponseThrowsException()
    {
        $this->expectException(ErrorResponseException::class);
        new ResponseStub(
            json_encode([
                'message' => 'error'
            ])
        );

        $this->expectException(ErrorResponseException::class);
        new ResponseStub(
            json_encode([
                'errors' => [
                    'error'
                ]
            ])
        );
    }

    public function testErrorResponseExceptionContainsErrors()
    {
        $errors = [];

        try {
            new ResponseStub(
                json_encode([
                    'message' => 'error',
                    'errors' => [
                        'error2',
                        'error3'
                    ]
                ])
            );
        } catch (ErrorResponseException $e) {
            $errors = $e->getErrors();
        }

        $this->assertEquals(
            $errors,
            [
                'error',
                'error2',
                'error3'
            ]
        );
    }
}
