<?php
declare(strict_types=1);
/**
 * @link https://github.com/codenix-sv/bitfinex-api
 * @copyright Copyright (c) 2018 codenix-sv
 * @license https://github.com/codenix-sv/bitfinex-api/blob/master/LICENSE
 */

namespace codenixsv\Bitfinex\Helpers;

/**
 * Class CommonHelper
 * @package codenixsv\Bitfinex\Helpers
 */
class CommonHelper
{
    /**
     * @param array $headers
     * @return array
     */
    public static function arrayToHttpHeaders(array $headers)
    {
        if (empty($headers)) {
            return [];
        }

        $httpHeaders = [];
        if (!self::isArrayAssociative($headers)) {
            throw new \InvalidArgumentException('Array must be associative');
        }

        foreach ($headers as $name => $value) {
            $httpHeaders[] =  $name . ': ' . $value;
        }

        return $httpHeaders;
    }

    /**
     * @param $array
     * @return bool
     */
    public static function isArrayAssociative($array)
    {
        $array = array_keys($array);
        return ($array !== array_keys($array));
    }
}
