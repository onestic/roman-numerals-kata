<?php

namespace Kata;

class ArabicToRomanNumberConverter
{
    protected $baseNumbers;

    public function __construct()
    {
        $this->baseNumbers = array(
            1  => 'I',
            5  => 'V',
            10 => 'X'
        );
    }

    public function transform($number)
    {
        if ($number > 8) {
            $baseNumber = 10;
            return $this->getConcatenatedNumberWithNumberBody($number, $baseNumber);
        }

        if ($number > 3) {
            $baseNumber = 5;
            return $this->getConcatenatedNumberWithNumberBody($number, $baseNumber);
        }

        $result = $this->getConcatenate($number);

        return $result;
    }

    /**
     * @param $number
     * @param $result
     * @return string
     */
    public function getConcatenate($number)
    {
        $result = "";

        for ($i = 0; $i < $number; $i++) {
            $result .= $this->baseNumbers[1];
        }

        return $result;
    }

    /**
     * @param $number
     * @param $baseNumber
     * @return mixed|string
     */
    public function getConcatenatedNumberWithNumberBody($number, $baseNumber)
    {
        $numberBody = $this->baseNumbers[$baseNumber];

        if ($number == $baseNumber) {
            return $numberBody;
        } else if ($number > $baseNumber) {
            return $numberBody . $this->getConcatenate($number - $baseNumber);
        }

        return $this->baseNumbers[1] . $numberBody;
    }
}