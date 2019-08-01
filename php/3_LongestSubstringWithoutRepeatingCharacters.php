<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        if (strlen($s) === 0) {
            return 0;
        }
        $begin = 0;
        $compare = 1;
        $maxString = '';
        $maxLenght = 1;
        $currentLenght = 1;
        
        while ($compare < strlen($s)) {
            $maxString = substr($s, $begin, $currentLenght);
            $pos = strpos($maxString, $s[$compare]);
            if ($pos === false) {
                $compare++;
                $currentLenght++;
                if (strlen($maxString) > $maxLenght) {
                    $maxLenght = strlen($maxString);
                }
            } else {
                // 出现重复，记录最大值
                if (strlen($maxString) > $maxLenght) {
                    $maxLenght = strlen($maxString);
                }
                // 起始位置从重复的下一位开始
                $begin = $begin + $pos + 1;
                $currentLenght = $compare - $begin;
                // 如果起始位置跟比较位置挨着
                if ($begin === $compare) {
                    $compare++;
                    $currentLenght = 1;
                }
            }
        }
        if ($currentLenght > $maxLenght) {
            $maxLenght = $currentLenght;
        }
        return $maxLenght;
    }
}


$solution = new Solution();

$string = ' ';

//echo var_dump(substr($string, 2, 3));
echo var_dump(strlen(" "));

$result = $solution->lengthOfLongestSubstring($string);
echo var_dump($result);
?>
