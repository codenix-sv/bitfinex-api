<?php
declare(strict_types=1);

namespace codenixsv\Bitfinex\tests\unit;

use PHPUnit\Framework\TestCase;
use codenixsv\Bitfinex\Clients\BitfinexClient;
use codenixsv\Bitfinex\BitfinexManager;

/**
 * Class BitfinexManagerTest
 * @package codenixsv\Bitfinex\tests\unit
 */
final class BitfinexManagerTest extends TestCase
{
    public function testCreateClient()
    {
        $manager = new BitfinexManager();
        $client = $manager->createClient();
        $this->assertInstanceOf(BitfinexClient::class, $client);
    }
}
