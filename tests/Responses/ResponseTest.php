<?php

declare(strict_types=1);

namespace sspat\ProfiRu\Tests\Responses;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use sspat\ProfiRu\Exceptions\ErrorResponse;
use sspat\ProfiRu\Tests\Stubs\Responses\ResponseStub;
use function json_encode;

class ResponseTest extends TestCase
{
    /** @var string */
    protected $responseJson = '["test",[1,2]]';

    public function testRawResponse() : void
    {
        $response = new ResponseStub(new Response(200, [], $this->responseJson));

        $this->assertEquals(
            (string) $response->response()->getBody(),
            $this->responseJson
        );
    }

    public function testArrayResponse() : void
    {
        $response = new ResponseStub(new Response(200, [], $this->responseJson));

        $this->assertEquals(
            json_encode($response->asArray()),
            $this->responseJson
        );
    }

    public function testErrorResponseThrowsException() : void
    {
        $this->expectException(ErrorResponse::class);

        new ResponseStub(
            new Response(
                200,
                [],
                json_encode(
                    ['message' => 'error']
                )
            )
        );

        $this->expectException(ErrorResponse::class);

        new ResponseStub(
            new Response(
                200,
                [],
                json_encode(
                    [
                        'errors' => ['error'],
                    ]
                )
            )
        );
    }

    public function testErrorResponseExceptionContainsErrors() : void
    {
        $errors = [];

        try {
            new ResponseStub(
                new Response(
                    200,
                    [],
                    json_encode(
                        [
                            'message' => 'error',
                            'errors' => [
                                'error2',
                                'error3',
                            ],
                        ]
                    )
                )
            );
        } catch (ErrorResponse $e) {
            $errors = $e->getErrors();
        }

        $this->assertEquals(
            $errors,
            [
                'error',
                'error2',
                'error3',
            ]
        );
    }
}
