<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function compute($oprt1, $val1, $val2, $oprt2, $val3, $val4) //gumamit ng 6 na parameter para i catch ung mga input ng user sa link
    {
        return "    
         <h3>Godfrey Javier 3A</h3>
        " . $this->generateOutput($oprt1, $val1, $val2) . " " . $this->generateOutput($oprt2, $val3, $val4) . "
        "; //tatawagin ang generate output para gumawa ng display or output, si generate output ay nangangailangan ng 3 parameter, ($operation, $num1,$num2). Itong return na ito na nasa compute ay ang magpapakita sa web
    }
    public function generateOutput($operator, $num1, $num2)//function para mag generate ng output
    {
        $result = $this->calculate($operator, $num1, $num2); // ito ang kukuha ng calculated result sa calculate function

        if (is_numeric($num1) && is_numeric($num2)) { //ichcheck nito kung ang input ba ng user na number ay hindi number, kung number papasok siya sa nested if
            if (is_numeric($result)) {  //i checheck nito kung numeric ba ang result, at kung oo ibabalik nya ang nasa code block ng if
                return " Value 1: <span style='color: " . ($num1 % 2 == 0 ? "orange" : "blue") . " ;'>$num1 </span> <br><br> 
            Value 2: <span style='color: " . ($num2 % 2 == 0 ? "orange" : "blue") . " ;'>$num2 </span> <br><br>
            Operator: <span class=''>$operator</span><br><br>
            <div style='color: " . ($result % 2 == 0 ? "green" : "blue") . " ;'>Result (Displayed in " . ($result % 2 == 0 ? "Green" : "Blue") . "): 
             <span style='color:white; background-color:" . ($result % 2 == 0 ? "green" : "blue") . "; padding: 10px 50px;'>$result</span></div><br><br>
          "; //gumamit ako ng ternary operator para mapalitan ang color at background color ng output, ichecheck nito kung even ba or odd ung input ng user
            } else {    //pupunta dto ang code kung hindi numeric ang $result at dto nya i didisplay ang error na manggagaling sa calculate
                return " Value 1: <span style='color: " . ($num1 % 2 == 0 ? "orange" : "blue") . " ;'>$num1 </span> <br><br>
            Value 2: <span style='color: " . ($num2 % 2 == 0 ? "orange" : "blue") . " ;'>$num2 </span> <br><br>
            Operator: <span class=''>$operator</span><br><br>
            <div style='color: red ;'>Result:  <span style='color:white; background-color:red ; padding: 10px 20px; font-size: 12px;'>$result</span></div><br><br>
          "; //gumamit din ako ng ternary dto para makuha ang color, mag bebase ito kung even or odd ba ang sagot
            }
        } else { //kung hindi number ang input ng user, pupunta siya dto, merong nested ternary dto para i check kung number ang input blue or orange siya, pero kung hindi number, kulay red
            return " Value 1: <span style='color: " . (is_numeric($num1) ? ($num1 % 2 == 0 ? "orange" : "blue") : "red") . " ;'>$num1 </span> <br><br>
        Value 2: <span style='color: " . (is_numeric($num2) ? ($num2 % 2 == 0 ? "orange" : "blue") : "red") . " ;'>$num2 </span> <br><br>
        Operator: <span class=''>$operator</span><br><br>
        <div style='color: red ;'>Result:  <span style='color:white; background-color:red ; padding: 10px 20px; font-size: 12px;'>$result</span></div><br><br>
      ";
        }
    }
    public function calculate($operator, $num1, $num2)
    {
        if (is_numeric($num1) && is_numeric($num2)) { //dto ichcheck kung number ba ang input ng user para kung hindi, d na siya mag proproceed sa loob ng next na if
            if ($operator == 'add') { //ichcheck kung add ba ang operator
                return $num1 + $num2;
            } elseif ($operator == 'subtract') { //ichcheck kung subtract ba ang operator
                return $num1 - $num2;
            } elseif ($operator == 'multiply') { //ichcheck kung multiply ba ang operator
                return $num1 * $num2;
            } elseif ($operator == 'divide') { //ichcheck kung divide ba ang operator
                return $num2 == 0 ? "You cannot divide a number to 0" : $num1 / $num2; //ichcheck kung 0 ba ang num2 kasi kung oo mag kaka roon ng error at mag papasa ito ng messsage na you cannot divide a number to 0
            } else { //kung mali nmn ang operator, ibabalik nya ang invalid operator
                return "Invalid Operator";
            }
        } else { //ibabalik nya nag error message na input should be number
            return "Input should be number!";
        }
    }
}
