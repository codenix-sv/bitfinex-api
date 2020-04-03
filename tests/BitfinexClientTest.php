<?php

declare(strict_types=1);

namespace Codenixsv\BitfinexApi\Tests;

use Codenixsv\BitfinexApi\Api\PublicApi;
use Codenixsv\BitfinexApi\BitfinexClient;
use PHPUnit\Framework\TestCase;

class BitfinexClientTest extends TestCase
{
    public function testPublic()
    {
        $client = new BitfinexClient();

        $this->assertInstanceOf(PublicApi::class, $client->public());
    }
}
