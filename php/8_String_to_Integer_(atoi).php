<?php

class Solution
{
    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str)
    {
        $result = 0;
        $i = 0;
        $minusFlag = false;
        $isFirstChart = false;
        $haveSign = false;
        $isNum = false;
        while ($i < strlen($str)) {
            if ($str[$i] === ' ') {
                if ($isNum || $haveSign) {
                    break;
                }
                $i++;
                continue;
            }
            
            if ($str[$i] === '-') {
                if ($haveSign || $isNum) {
                    break;
                }
                $minusFlag = true;
                $haveSign = true;
                $i++;
                continue;
            }
            
            if ($str[$i] === '+') {
                if ($haveSign || $isNum) {
                   break;
                }
                $haveSign = true;
                $i++;
                continue;
            }
            
            if (!$isFirstChart && ($str[$i] >= '0' && $str[$i] <= '9')) {
                if (!$isNum) {
                    $isNum = true;
                }
                $result = $result * 10 + intval($str[$i]);
                $i++;
                continue;
            } else {
                $isFirstChart = true;
                $i++;
                continue;
            }
        }
        
        if ($minusFlag) {
            $result = 0 - $result;
        }
        
        if ($result > 2147483647) {
            return 2147483647;
        }
        
        if ($result < -2147483648) {
            return -2147483648;
        }
        
        return $result;
    }
}


$solution = new Solution();
$str = '    -88827   5655  U';
$result = $solution->myAtoi($str);
echo var_dump($result);
?>
