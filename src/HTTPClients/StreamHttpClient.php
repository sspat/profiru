<?php
namespace sspat\ProfiRu\HTTPClients;

use sspat\ProfiRu\Contracts\HTTPClient;
use sspat\ProfiRu\Contracts\Request;
use sspat\ProfiRu\Exceptions\HTTPClientException;

final class StreamHttpClient implements HTTPClient
{
    /** @var string */
    private $sslKey;

    /** @var string */
    private $sslCert;

    /**
     * StreamHTTPClient constructor.
     * @param string $cert      Absolute path to Profi.ru SSL certificate
     * @param string $key       Absolute path to Profi.ru SSL key
     */
    public function __construct($cert, $key)
    {
        $this->sslCert = $cert;
        $this->sslKey = $key;
    }

    /**
     * @inheritdoc
     * @throws HTTPClientException
     */
    public function getResponse(Request $request)
    {
        $context = stream_context_create(
            [
                'http' => [
                    'method' => 'POST',
                    'header' => array_merge(
                        [
                            'Connection: close',
                            'Content-Type: application/json'
                        ],
                        $this->getMappedHTTPHeaders($request)
                    ),
                    'content' => json_encode($request->getBody())
                ],
                'ssl' => [
                    'local_cert' => $this->sslCert,
                    'local_pk' => $this->sslKey
                ]
            ],
            [
                'notification' => function ($notification_code, $severity, $message) {
                    if ($severity === STREAM_NOTIFY_SEVERITY_ERR) {
                        throw new HTTPClientException('Stream error: '.$message);
                    }
                }
            ]
        );

        $response = @file_get_contents($request->getURL(), false, $context);

        if ($response === false) {
            throw new HTTPClientException('Failed to get response with file_get_contents()');
        }

        return $response;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getMappedHTTPHeaders(Request $request)
    {
        return array_map(
            function ($header, $value) {
                return $header.': '.$value;
            },
            array_keys($request->getHeaders()),
            $request->getHeaders()
        );
    }
}
