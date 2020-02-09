<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Requests\Managers;

use codenixsv\Bitfinex\Requests\Request;
use codenixsv\Bitfinex\Helpers\CommonHelper;

/**
 * Class BitfinexRequestManager
 * @package codenixsv\Bitfinex\Requests\Managers
 */
abstract class BitfinexRequestManager implements RequestManager
{
    const API_URL = 'https://api.bitfinex.com/';
    const API_VERSION = 'v1';

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Request
     */
    abstract public function createGetRequest(string $path, array $parameters = [], array $headers = []): Request;

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Request
     */
    abstract public function createPostRequest(string $path, array $parameters = [], array $headers = []): Request;

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return static::API_URL . static::API_VERSION;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return static::API_VERSION;
    }

    /**
     * @param array $headers
     * @return array
     */
    protected function generateHttpHeaders(array $headers): array
    {
        return CommonHelper::arrayToHttpHeaders($headers);
    }
}
