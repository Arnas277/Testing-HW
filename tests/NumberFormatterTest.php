<?php

use App\NumberFormatter;
use PHPUnit\Framework\TestCase;
class NumberFormatterTest extends TestCase
{
    /**
     * @dataProvider numberProvider
     * @param $input
     * @param $expected
     */
    public function testFormat($input, $expected)
    {
        $numberf = new NumberFormatter();
        $this->assertSame($expected, $numberf->format($input));
    }
    /**
     * @return array
     */
    public function numberProvider(): array
    {
        return [
            [7545454, '7.55M'],
            [999999, '1.00M'],
            [111111, '111K'],
            [50000,'50 000'],
            [123,'123'],
            [542.56,'542.56'],
            [0,'0'],
            [-1234567,'-1.23M'],
            [-123456,'-123K'],
            [-12345,'-12 345'],
            [-123,'-123'],
            [-12.34,'-12.34']
        ];
    }
}