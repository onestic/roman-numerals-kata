<?php

namespace Kata;

use Kata\ArabicToRomanNumberConverter;

class ArabicToRomanNumberConverterTest extends \PHPUnit_Framework_TestCase
{

    protected $numberConverter;

    public function setUp(){
        $this->numberConverter = new ArabicToRomanNumberConverter();
    }

    /**
     * @test
     * @dataProvider validNumbersProvider
     */
    public function convertNumber($arabicNumber, $romanNumber)
    {
        $result = $this->numberConverter->transform($arabicNumber);
        $this->assertEquals($romanNumber, $result);
    }

    public function validNumbersProvider()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [11, 'XI'],
            [12, 'XII'],
            [13, 'XIII'],
            [14, 'XIV'],
            [15, 'XV'],
            [16, 'XVI'],
            [17, 'XVII'],
            [18, 'XVIII'],
            [19, 'XIX'],
            [20, 'XX'],
            [30, 'XXX'],
            [31, 'XXXI'],
            [32, 'XXXII'],
            [33, 'XXXIII'],
            [34, 'XXXIV'],
            [35, 'XXXV'],
            [39, 'XXXIX'],
            [40, 'XL'],
            [41, 'XLI'],


        ];
    }
}