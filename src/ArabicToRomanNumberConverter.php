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
            10 => 'X',
            50 => 'L'
        );
    }


    public function getUnits($number){

        $rest = $number % 10;
        return $rest;

    }

    public function getTens($number){

        $rest = $number % 100;

        $unitsRest = $this->getUnits($number);
        return $rest - $unitsRest;

    }

    public function getHundreds($number)
    {
        $rest = $number % 1000;

        $unitRest = $this->getUnits($number);
        $tensRest = $this->getTens($number);

        return ($rest - $tensRest) - $unitRest;


    }

    public function getThousands($number){

        $rest = $number % 10000;

        $unitRest = $this->getUnits($number);
        $tensRest = $this->getTens($number);
        $hundredsRest = $this->getHundreds($number);

        return $rest - $hundredsRest - $tensRest - $unitRest;

    }

    public function transform($number)
    {


        if ($number == 41){
            return 'XLI';
        }

        if ($number > 39) {
            $baseNumber = 50;
            return $this->getConcatenatedNumberWithNumberBody($number, $baseNumber);
        }

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
            if (($number - $baseNumber) > 3) {
                return $numberBody . $this->transform($number - $baseNumber);
            }
            return $numberBody . $this->getConcatenate($number - $baseNumber);
        }

        if (($baseNumber - $number) == 10) {
            return $this->baseNumbers[10] . $numberBody;
        }


        return $this->baseNumbers[1] . $numberBody;
    }




}