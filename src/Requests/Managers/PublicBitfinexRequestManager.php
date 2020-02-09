<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Requests\Managers;

use codenixsv\Bitfinex\Requests\Request;
use codenixsv\Bitfinex\Requests\BitfinexRequest;

/**
 * Class PublicBitfinexRequestManager
 * @package codenixsv\Bitfinex\Requests\Managers
 */
class PublicBitfinexRequestManager extends BitfinexRequestManager
{
    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Request
     */
    public function createGetRequest(string $path, array $parameters = [], array $headers = []): Request
    {
        $url = $this->generateUrlForGetRequest($path, $parameters);

        $httpHeaders = $this->generateHttpHeaders($headers);

        return new BitfinexRequest($url, $httpHeaders, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Request
     */
    public function createPostRequest(string $path, array $parameters = [], array $headers = []): Request
    {
        $url = $this->generateUrlForPostRequest($path);

        $httpHeaders = $this->generateHttpHeaders($headers);

        return new BitfinexRequest($url, $httpHeaders, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return string
     */
    private function generateUrlForGetRequest(string $path, array $parameters = []): string
    {
        return $this->getBaseUrl() . $path . '?' . http_build_query($parameters);
    }

    /**
     * @param string $path
     * @return string
     */
    private function generateUrlForPostRequest(string $path): string
    {
        return $this->getBaseUrl() . $path;
    }
}
