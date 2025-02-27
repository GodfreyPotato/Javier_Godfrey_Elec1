<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NumberFormatter;

class NumberController extends Controller
{
    //

    public function breakdown($money)
    {
        $rawMoney = $money;
        $num = $money;

        //money breakdown
        $thousand = (int)($money / 1000);
        $money %= 1000;

        $fiveHundred = (int)($money / 500);
        $money %= 500;

        $twoHundred = (int)($money / 200);
        $money %= 200;

        $oneHundred = (int)($money / 100);
        $money %= 100;

        $fifty = (int)($money / 50);
        $money %= 50;

        $twenty = (int)($money / 20);
        $money %= 20;

        $five = (int)($money / 5);
        $money %= 5;

        $one = (int)($money / 1);

        //convert number to word
        $premade = [
            0 => "",
            1 => "one",
            2 => "two",
            3 => "three",
            4 => "four",
            5 => "five",
            6 => "six",
            7 => "seven",
            8 => "eight",
            9 => "nine",
            10 => "ten",
            11 => "eleven",
            12 => "twelve",
            13 => "thirteen",
            14 => "fourteen",
            15 => "fifteen",
            16 => "sixteen",
            17 => "seventeen",
            18 => "eighteen",
            19 => "nineteen",
            20 => "twenty",
            30 => "thirty",
            40 => "forty",
            50 => "fifty",
            60 => "sixty",
            70 => "seventy",
            80 => "eighty",
            90 => "ninety"
        ];

        $scales = [
            1 => "thousand",
            2 => "million",
            3 => "billion",
            4 => "trillion",
            5 => "quadrillion",
            6 => "quintillion",
        ];


        $word = "";
        $scaleIndex = 0;
        if ($num == 0) {
            $word = "zero";
        } else {
            while ($num > 0) {
                $chunk = $num % 1000;
                if ($chunk > 0) {
                    $chunkWord = "";
                    if ($chunk >= 100) {
                        $chunkWord .= $premade[(int)($chunk / 100)] . " hundred ";
                        $chunk %= 100;
                    }
                    if ($chunk > 19) {
                        $chunkWord .= $premade[(int)($chunk / 10) * 10] . " " . $premade[$chunk % 10];
                    } else {
                        $chunkWord .= $premade[$chunk];
                    }

                    $chunkWord = trim($chunkWord);
                    if ($scaleIndex > 0) {
                        $chunkWord .= " " . $scales[$scaleIndex];
                    }
                    $word = trim($chunkWord . " " . $word);
                }
                $num = (int)($num / 1000);
                $scaleIndex++;
            }
        }
        $word = trim($word);

        //check if even or odd
        $color = $money % 2 == 0 ? 'red' : 'green';
        return view('number', compact('rawMoney', 'word', 'color', 'thousand', 'fiveHundred', 'twoHundred', 'oneHundred', 'fifty', 'twenty', 'five', 'one'));
    }
}
