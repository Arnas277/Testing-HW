<?php

namespace App;

class MoneyFormatter
{
    private $numberFormatter;
    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur(float $number): string
    {
        return $this->numberFormatter->format($number).' €';
    }

    public function formatUsd(float $number): string
    {
        return '$'.$this->numberFormatter->format($number);
    }
}