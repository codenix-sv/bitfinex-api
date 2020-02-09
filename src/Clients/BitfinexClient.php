<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Clients;

use codenixsv\Bitfinex\Http\HttpClient;
use codenixsv\Bitfinex\Requests\Managers\RequestManager;

/**
 * Class BitfinexClient
 * @package codenixsv\Bitfinex\Clients
 */
class BitfinexClient extends Client
{
    /**
     * @var RequestManager
     */
    private $publicRequestManager;

    /**
     * BitfinexClient constructor.
     * @param HttpClient $httpClient
     * @param RequestManager $publicRequestManager
     */
    public function __construct(
        HttpClient $httpClient,
        RequestManager $publicRequestManager
    ) {
        parent::__construct($httpClient);

        $this->publicRequestManager = $publicRequestManager;
    }

    /*
     ***************************  Public API  **************************
     */

    /**
     * @param string $symbol
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-ticker
     */
    public function getTicker(string $symbol)
    {
        $request = $this->publicRequestManager->createGetRequest('/pubticker/' . $symbol);

        return $this->get($request);
    }

    /**
     * Various statistics about the requested pair.
     * @param string $symbol
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-stats
     */
    public function getStats(string $symbol)
    {
        $request = $this->publicRequestManager->createGetRequest('/stats/' . $symbol);

        return $this->get($request);
    }

    /**
     * Get the full margin funding book
     * @param string $currency
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-fundingbook
     */
    public function getFundingBook(string $currency)
    {
        $request = $this->publicRequestManager->createGetRequest('/lendbook/' . $currency);

        return $this->get($request);
    }

    /**
     * Get the full order book
     * @param string $symbol
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-orderbook
     */
    public function getOrderBook(string $symbol)
    {
        $request = $this->publicRequestManager->createGetRequest('/book/' . $symbol);

        return $this->get($request);
    }

    /**
     * Get a list of the most recent trades for the given symbol.
     * @param string $symbol
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-trades
     */
    public function getTrades(string $symbol)
    {
        $request = $this->publicRequestManager->createGetRequest('/trades/' . $symbol);

        return $this->get($request);
    }

    /**
     * Get a list of the most recent funding data for the given currency: total amount provided and
     * Flash Return Rate (in % by 365 days) over time.
     * @param string $currency
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-lends
     */
    public function getLends(string $currency)
    {
        $request = $this->publicRequestManager->createGetRequest('/lends/' . $currency);

        return $this->get($request);
    }

    /**
     * A list of symbol names.
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-symbols
     */
    public function getSymbols()
    {
        $request = $this->publicRequestManager->createGetRequest('/symbols');

        return $this->get($request);
    }

    /**
     * Get a list of valid symbol IDs and the pair details.
     * @return mixed
     * @see https://bitfinex.readme.io/v1/reference#rest-public-symbol-details
     */
    public function getSymbolsDetails()
    {
        $request = $this->publicRequestManager->createGetRequest('/symbols_details');

        return $this->get($request);
    }
}
