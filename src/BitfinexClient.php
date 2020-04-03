<?php

declare(strict_types=1);

namespace Codenixsv\BitfinexApi;

use Codenixsv\BitfinexApi\Api\PublicApi;
use GuzzleHttp\Client;

class BitfinexClient
{
    private const BASE_URI = 'https://api-pub.bitfinex.com';

    /** @var Client */
    private $publicClient;

    /**
     * @return PublicApi
     */
    public function public(): PublicApi
    {
        return new PublicApi($this->getPublicClient());
    }

    /**
     * @return Client
     */
    private function createPublicClient(): Client
    {
        return new Client(['base_uri' => self::BASE_URI]);
    }

    /**
     * @return Client
     */
    private function getPublicClient(): Client
    {
        return $this->publicClient ?: $this->createPublicClient();
    }
}
