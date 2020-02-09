<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex;

use codenixsv\Bitfinex\Clients\BitfinexClient;
use codenixsv\Bitfinex\Http\CurlHttpClient;
use codenixsv\Bitfinex\Requests\Managers\PublicBitfinexRequestManager;

/**
 * Class BitfinexManager
 * @package codenixsv\Bitfinex
 */
class BitfinexManager
{
    /**
     * @return BitfinexClient
     */
    public function createClient(): BitfinexClient
    {
        $httpClient = new CurlHttpClient();
        $publicRequestManager = new PublicBitfinexRequestManager();

        return new BitfinexClient($httpClient, $publicRequestManager);
    }
}
