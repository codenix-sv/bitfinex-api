<?php
declare(strict_types=1);

namespace codenixsv\Bitfinex\tests\unit\Helpers;

use codenixsv\Bitfinex\Helpers\CommonHelper;
use PHPUnit\Framework\TestCase;

/**
 * Class CommonHelperTest
 * @package codenixsv\Bitfinex\tests\unit\Helpers
 */
final class CommonHelperTest extends TestCase
{
    /**
     * test
     */
    public function testIsArrayAssociative()
    {
        $input = ['a' => 'foo', 'b' => 'bar', 'c' => 'ced'];

        $this->assertTrue(CommonHelper::isArrayAssociative($input));
    }

    /**
     * test
     */
    public function testIsArrayAssociativeWrong()
    {
        $input = [0, 2, 5, 8];

        $this->assertFalse(CommonHelper::isArrayAssociative($input));
    }

    /**
     * test
     */
    public function testArrayToHttpHeaders()
    {
        $input = ['a' => 'foo', 'b' => 'bar', 'c' => 'ced'];

        $output = CommonHelper::arrayToHttpHeaders($input);

        $expected = ['a: foo', 'b: bar', 'c: ced'];

        $this->assertEquals($expected, $output);
    }

    /**
     * test
     */
    public function testArrayToHttpHeadersException()
    {
        $input = [0, 2, 5, 8];

        $this->expectException(\InvalidArgumentException::class);

        CommonHelper::arrayToHttpHeaders($input);
    }
}
