<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Requests;

/**
 * Interface Request
 * @package codenixsv\Bitfinex\Requests
 */
interface Request
{
    /**
     * Request constructor.
     * @param string $url
     * @param array $headers
     * @param array $parameters
     */
    public function __construct(string $url, array $headers = [], array $parameters = []);

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return array
     */
    public function getParameters(): array;
}
