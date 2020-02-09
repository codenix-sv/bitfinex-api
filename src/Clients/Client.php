<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Clients;

use codenixsv\Bitfinex\Http\HttpClient;
use codenixsv\Bitfinex\Requests\Request;

/**
 * Class Client
 * @package codenixsv\Bitfinex\Clients
 */
class Client
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * Client constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        $response = $this->httpClient->get($request->getUrl(), $request->getHeaders());

        return $response;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function post(Request $request)
    {
        $response = $this->httpClient->post($request->getUrl(), $request->getParameters(), $request->getHeaders());

        return $response;
    }
}
