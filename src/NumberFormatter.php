<?php

namespace App;
class NumberFormatter
{
    /**
     * @var string
     */
    public $result;
    /**
     * @param float $number
     * @return string
     */

    public function format($number): string
    {
        if (999500 <= $number || -999500 >= $number) {
            $this->result = number_format($number / 1000000, 2, '.', '').'M';
        } elseif (
            (99500 <= $number && 999500 > $number)
            || (-99500 >= $number && -999500 < $number)
        ) {
            $this->result = number_format($number / 1000, 0, '.', '').'K';
        } elseif (
            (1000 <= $number && 99950 > $number)
            || (-1000 >= $number && -99950 < $number)
        ) {
            $this->result = number_format($number, 0, '.', ' ');
        } elseif (
            (0 <= $number && 1000 > $number)
            || (0 > $number && -1000 < $number)
        ) {
            $this->result = number_format($number, 2, '.', '');
            if (explode('.', $this->result)[1] == '00') {
                $this->result = number_format($number, 0, ',', '');
                if (1000 == $this->result || -1000 == $this->result) {
                    $this->result = number_format($this->result, 0, '.', ' ');
                }
            }
        }
        return $this->result;
    }
}