<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Http;

/**
 * Interface HttpClient
 * @package codenixsv\Bitfinex\Http
 */
interface HttpClient
{
    /**
     * @param $url
     * @param array $headers
     * @return mixed
     */
    public function get($url, array $headers = []);

    /**
     * @param $url
     * @param array $parameters
     * @param array $headers
     * @return mixed
     */
    public function post($url, array $parameters = [], array $headers = []);
}
