<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Http;

use codenixsv\Bitfinex\Exceptions\CurlException;

/**
 * Class CurlHttpClient
 * @package codenixsv\Bitfinex\Http
 */
class CurlHttpClient implements HttpClient
{
    /**
     * @param $url
     * @param array $headers
     * @return mixed
     * @throws CurlException
     */
    public function get($url, array $headers = [])
    {
        $ch = curl_init($url);
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $this->checkExceptions($ch);

        return $response;
    }

    /**
     * @param $url
     * @param array $parameters
     * @param array $headers
     * @return mixed
     * @throws CurlException
     */
    public function post($url, array $parameters = [], array $headers = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if (!empty($parameters)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        }

        $response = curl_exec($ch);

        $this->checkExceptions($ch);

        curl_close($ch);

        return $response;
    }

    /**
     * @param $ch
     * @throws CurlException
     */
    private function checkExceptions($ch)
    {
        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            curl_close($ch);
            throw new CurlException($errorMessage);
        }
    }
}
