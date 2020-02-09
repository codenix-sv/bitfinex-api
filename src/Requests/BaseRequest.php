<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Requests;

/**
 * Class BaseRequest
 * @package codenixsv\Bitfinex\Requests
 */
abstract class BaseRequest implements Request
{
    protected $url;

    protected $headers;

    protected $parameters;

    /**
     * BaseRequest constructor.
     * @param string $url
     * @param array $headers
     * @param array $parameters
     */
    public function __construct(string $url, array $headers = [], array $parameters = [])
    {
        $this->url = $url;
        $this->headers = $headers;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    abstract public function getUrl(): string;

    /**
     * @return array
     */
    abstract public function getHeaders(): array;

    /**
     * @return array
     */
    abstract public function getParameters(): array;
}
