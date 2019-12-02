<?php


use App\MoneyFormatter;
use App\NumberFormatter;
use PHPUnit\Framework\TestCase;
class MoneyFormatterTest extends TestCase
{
    /**
     * @var MoneyFormatter
     */
    private $sut;
    private $mock;
    public function setUp(): void
    {
        $this->mock = $this->getNumberFormatterMock();
        $this->sut = new MoneyFormatter($this->mock);
    }
    public function getNumberFormatterMock()
    {
        $mock = $this->getMockBuilder(NumberFormatter::class)
            ->setMethods(['format'])
            ->getMock();
        return $mock;
    }
    public function testFormatEurMillions()
    {
        $this->mock
            ->method('format')
            ->with(1234567)
            ->willReturn('1.23M');
        $this->assertSame('1.23M €', $this->sut->formatEur(1234567));
    }
    public function testFormatEurHundreds()
    {
        $this->mock
            ->method('format')
            ->with(123.45)
            ->willReturn('123.45');
        $this->assertSame('123.45 €', $this->sut->formatEur(123.45));
    }
    public function testFormatEurZero()
    {
        $this->mock
            ->method('format')
            ->with(0)
            ->willReturn('0');
        $this->assertSame('0 €', $this->sut->formatEur(0));
    }
    public function testFormatNegativeUsdMillions()
    {
        $this->mock
            ->method('format')
            ->with(-1234567)
            ->willReturn('-1.23M');
        $this->assertSame('$-1.23M', $this->sut->formatUsd(-1234567));
    }
    public function testFormatUsdHundredsK()
    {
        $this->mock
            ->method('format')
            ->with(123456)
            ->willReturn('123K');
        $this->assertSame('$123K', $this->sut->formatUsd(123456));
    }
}