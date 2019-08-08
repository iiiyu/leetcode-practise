<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        if ($numRows === 1) {
            return $s;
        }
        
        $i = 0;
        $A = [];
        for ($j = 0; $j < $numRows; $j++) {
            $A[$j] = '';
        }
        
        $flag = true;
        $j = 0;
        while ($i < strlen($s)) {
            $A[$j] = $A[$j] . $s[$i];
            $i = $i + 1;
            if ($j === $numRows - 1) {
                $flag = false;
            } else if ($j === 0) {
                $flag = true;
            }
            
            if ($flag) {
                $j++;
            } else {
                $j--;
            }
        }
        return implode('', $A);
    }
}


$solution = new Solution();

$s = 'AB';
$result = $solution->convert($s, 1);
echo var_dump($result);
?>
