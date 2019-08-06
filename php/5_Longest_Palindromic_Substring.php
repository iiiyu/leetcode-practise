<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $len = strlen($s);
        $maxString = '';
        for ($i = 0; $i < $len; $i++) {
            $substrLen = $len - $i;
            $maxStringLen = strlen($maxString);
            if ($substrLen < $maxStringLen) {
                break;
            }
            for ($j = $substrLen; $j > 0; $j--) {
                $tmpString = substr($s, $i, $j);
                $tmpStringLen = strlen($tmpString);
                if (strncmp($tmpString, strrev($tmpString), intval(($tmpStringLen + 1) / 2)) === 0 && $tmpStringLen > $maxStringLen) {
                    $maxString = $tmpString;
                    break;
                }
            }
        }
        return $maxString;
    }
    
}


$solution = new Solution();

$s = 'abadd';
$result = $solution->longestPalindrome($s);
echo var_dump($result);
?>
