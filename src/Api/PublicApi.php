<?php

declare(strict_types=1);

namespace Codenixsv\BitfinexApi\Api;

use Exception;

/**
 * Class PublicApi
 * @package Codenixsv\BitfinexApi\Api
 */
class PublicApi extends Api
{
    /**
     * @return array
     * @throws Exception
     */
    public function getPlatformStatus(): array
    {
        return $this->get('/platform/status');
    }

    /**
     * @param string $symbols
     * @return array
     * @throws Exception
     */
    public function getTickers(string $symbols): array
    {
        $params = ['symbols' => $symbols];

        return $this->get('/tickers', $params);
    }

    /**
     * @param string $symbol
     * @return array
     * @throws Exception
     */
    public function getTicker(string $symbol): array
    {
        return $this->get('/ticker/' . $symbol);
    }

    /**
     * @param string $symbol
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getTrades(string $symbol, array $params = []): array
    {
        return $this->get('/trades/' . $symbol . '/hist', $params);
    }

    /**
     * @param string $symbol
     * @param string $precision
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getBook(string $symbol, $precision = 'P0', array $params = []): array
    {
        return $this->get('/book/' . $symbol . '/' . $precision, $params);
    }

    /**
     * @param string $key
     * @param string $size
     * @param string $symbol
     * @param string $section
     * @param string|null $side
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getStats(
        string $key,
        string $size,
        string $symbol,
        string $section,
        ?string $side = null,
        array $params = []
    ): array {
        return $this->get('/stats1/' . $key . ':' . $size . ':' . $symbol . (is_null($side) ? '' : ':' . $side)
            . '/' . $section, $params);
    }

    /**
     * @param string $timeFrame
     * @param string $symbol
     * @param string $section
     * @param string|null $period
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getCandles(
        string $timeFrame,
        string $symbol,
        string $section,
        ?string $period = null,
        array $params = []
    ): array {
        return $this->get('/candles/trade:' . $timeFrame . ':' . $symbol . (is_null($period) ? '' : ':' . $period)
            . '/' . $section, $params);
    }

    /**
     * @param string $action
     * @param string $object
     * @param string|null $detail
     * @return array
     * @throws Exception
     */
    public function getConfigs(string $action, string $object, ?string $detail = null): array
    {
        return $this->get('/conf/pub:' . $action . ':' . $object . (is_null($detail) ? '' : ':' . $detail));
    }

    /**
     * @param string $type
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getStatus(string $type, array $params = []): array
    {
        return $this->get('/status/' . $type, $params);
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getLiquidationFeed(array $params = []): array
    {
        return $this->get('/liquidations/hist', $params);
    }

    /**
     * @param string $key
     * @param string $timeFrame
     * @param string $symbol
     * @param string $section
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getLeaderboards(
        string $key,
        string $timeFrame,
        string $symbol,
        string $section,
        array $params = []
    ): array {
        return $this->get('/rankings/' . $key . ':' . $timeFrame . ':' . $symbol . '/' . $section, $params);
    }
}
