<?php

declare(strict_types=1);

namespace Codenixsv\BitfinexApi\Tests\Api;

use Codenixsv\BitfinexApi\Api\PublicApi;

class PublicApiTest extends ApiTestCase
{
    public function testGetPlatformStatus()
    {
        $this->createApi()->getPlatformStatus();
        $request = $this->getLastRequest();

        $this->assertEquals('/v2/platform/status', $request->getUri()->__toString());
    }

    public function testGetTickers()
    {
        $this->createApi()->getTickers('tBTCUSD,tLTCUSD,fUSD');
        $request = $this->getLastRequest();

        $this->assertEquals('/v2/tickers?symbols=tBTCUSD%2CtLTCUSD%2CfUSD', $request->getUri()->__toString());
    }

    public function testGetTicker()
    {
        $this->createApi()->getTicker('tBTCUSD');
        $request = $this->getLastRequest();
        $this->assertEquals('/v2/ticker/tBTCUSD', $request->getUri()->__toString());
    }

    public function testGetTrades()
    {
        $this->createApi()->getTrades('tBTCUSD', ['limit' => 100]);

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/trades/tBTCUSD/hist?limit=100', $request->getUri()->__toString());
    }

    public function testGetBook()
    {
        $this->createApi()->getBook('tBTCUSD', 'P0');

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/book/tBTCUSD/P0', $request->getUri()->__toString());
    }

    public function testGetStats()
    {
        $this->createApi()->getStats('pos.size', '1m', 'tBTCUSD', 'hist', 'long');

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/stats1/pos.size:1m:tBTCUSD:long/hist', $request->getUri()->__toString());
    }

    public function testGetCandles()
    {
        $this->createApi()->getCandles('1m', 'tBTCUSD', 'hist');

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/candles/trade:1m:tBTCUSD/hist', $request->getUri()->__toString());
    }

    public function testGetConfigs()
    {
        $this->createApi()->getConfigs('list', 'pair', 'exchange');

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/conf/pub:list:pair:exchange', $request->getUri()->__toString());
    }

    public function testGetStatus()
    {
        $this->createApi()->getStatus('deriv', ['keys' => 'tBTCF0:USTF0']);

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/status/deriv?keys=tBTCF0%3AUSTF0', $request->getUri()->__toString());
    }

    public function testGetLiquidationFeed()
    {
        $this->createApi()->getLiquidationFeed();

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/liquidations/hist', $request->getUri()->__toString());
    }

    public function testGetLeaderboards()
    {
        $this->createApi()->getLeaderboards('vol', '3h', 'tBTCUSD', 'hist');

        $request = $this->getLastRequest();
        $this->assertEquals('/v2/rankings/vol:3h:tBTCUSD/hist', $request->getUri()->__toString());
    }

    private function createApi(): PublicApi
    {
        return new PublicApi($this->getMockClient());
    }
}
