<?php

class Solution
{
    
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $s = '' . $x;
        if ($s[0] === '-') {
            $s = substr($s, 1, strlen($s) - 1);
            $s = strrev($s);
            $result = 0 - intval($s);
        } else {
            $s = strrev($s);
            
            $result = intval($s);
        }
        
        if ($result > 2147483647 || $result < -2147483648) {
            return 0;
        } else {
            return $result;
        }
    }
}


$solution = new Solution();
$num = 1534236469;
$result = $solution->reverse($num);
echo var_dump($result);
?>
