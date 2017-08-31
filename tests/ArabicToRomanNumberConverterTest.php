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
     * @dataProvider numberUnitsProvider
     */
    public function returnUnitsFromNumber($number, $units){

        $result = $this->numberConverter->getUnits($number);
        $this->assertEquals($result, $units);

    }


    /**
     * @test
     * @dataProvider numberTensProvider
     */
    public function returnTensFromNumber($number, $units){

        $result = $this->numberConverter->getTens($number);
        $this->assertEquals($result, $units);

    }


    /**
     * @test
     * @dataProvider numberHundredProvider
     */
    public function returnHundredFromNumber($number, $units)
    {
        $result = $this->numberConverter->getHundreds($number);
        $this->assertEquals($result, $units);
    }



    /**
     * @test
     * @dataProvider numberThousandProvider
     */
    public function returnThousandFromNumber($number, $units)
    {
        $result = $this->numberConverter->getThousands($number);
        $this->assertEquals($result, $units);
    }

    public function numberUnitsProvider()
    {
        return [
            [10, 0],
            [1, 1],
            [11, 1],
            [23, 3],
            [104, 4],
            [1026, 6],
        ];

    }

    public function numberTensProvider()
    {
        return [
            [10, 10],
            [435, 30],
            [11, 10],
            [1123, 20]
        ];
    }

    public function numberHundredProvider()
    {
        return [
            [234, 200],
            [435, 400],
            [11, 0],
            [1123, 100],
            [100, 100],
            [0,0]
        ];
    }

    public function numberThousandProvider()
    {
        return [
            [1234, 1000],
            [435, 0],
            [11, 0],
            [2123, 2000],
            [100, 0],
            [1000,1000]
        ];
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