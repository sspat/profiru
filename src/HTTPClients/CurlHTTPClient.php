<?php
namespace sspat\ProfiRu\HTTPClients;

use sspat\ProfiRu\Contracts\HTTPClient;
use sspat\ProfiRu\Contracts\Request;
use sspat\ProfiRu\Exceptions\HTTPClientException;

final class CurlHTTPClient implements HTTPClient
{
    /** @var string */
    private $sslKey;

    /** @var string */
    private $sslCert;

    /**
     * CurlHTTPClient constructor.
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
        $curlHandle = curl_init();

        if ($curlHandle === false) {
            throw new HTTPClientException('Error initializing cURL handle');
        }

        curl_setopt($curlHandle, CURLOPT_URL, $request->getURL());
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSLCERT, $this->sslCert);
        curl_setopt($curlHandle, CURLOPT_SSLKEY, $this->sslKey);
        curl_setopt($curlHandle, CURLOPT_POST, true);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, json_encode($request->getBody()));
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $this->getMappedHTTPHeaders($request));

        $response = curl_exec($curlHandle);

        if ($response === false) {
            throw new HTTPClientException(curl_error($curlHandle), curl_errno($curlHandle));
        }

        curl_close($curlHandle);

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
