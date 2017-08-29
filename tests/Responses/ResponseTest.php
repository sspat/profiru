<?php
namespace sspat\ProfiRu\Tests\Responses;

use sspat\ProfiRu\Exceptions\ErrorResponseException;
use sspat\ProfiRu\Tests\Stubs\Responses\ResponseStub;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    protected $responseJson = "[\"test\",[1,2]]";

    public function testRawResponse()
    {
        $response = new ResponseStub($this->responseJson);

        self::assertEquals(
            $response->getRaw(),
            $this->responseJson
        );
    }

    public function testArrayResponse()
    {
        $response = new ResponseStub($this->responseJson);

        self::assertEquals(
            json_encode($response->getArray()),
            $this->responseJson
        );
    }

    public function testErrorResponseThrowsException()
    {
        self::expectException(ErrorResponseException::class);
        new ResponseStub(
            json_encode([
                'message' => 'error'
            ])
        );

        self::expectException(ErrorResponseException::class);
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

        self::assertEquals(
            $errors,
            [
                'error',
                'error2',
                'error3'
            ]
        );
    }
}
