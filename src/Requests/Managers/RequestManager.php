<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Requests\Managers;

use codenixsv\Bitfinex\Requests\Request;

/**
 * Interface RequestManager
 * @package codenixsv\Bitfinex\Requests\Managers
 */
interface RequestManager
{
    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Request
     */
    public function createGetRequest(string $path, array $parameters = [], array $headers = []): Request;

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return Request
     */
    public function createPostRequest(string $path, array $parameters = [], array $headers = []): Request;
}
