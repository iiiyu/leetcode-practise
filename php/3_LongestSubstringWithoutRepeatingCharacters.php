<?php

class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $begin = 0;
        $compare = 1;
        $maxString = '';
        $maxLenght = 1;
        $currentLenght = 1;

        while ($compare < strlen($s)) {
            $maxString = substr($s, $begin, $compare);
//            echo var_dump($maxString);
            echo var_dump($compare);
            $pos = strpos($maxString, $s[$compare]);
            if ($pos === false) {
                // 没有重复
                if (strlen($maxString) > $maxLenght) {
                    $maxLenght = strlen($maxString);
                }
            } else {
                // 重复
                $begin = $begin + $pos + 1;
                if ($begin + 1 === $compare) {
                    $begin += 1;
                    $compare = $begin + 1;
                } else {
                    $compare = $compare - 1;
                }
//                echo var_dump($compare);
                if ($compare === strlen($s)) {
                    if (strlen($maxString) > $maxLenght) {
                        $maxLenght = strlen($maxString);
                    }
                }
            }
        $compare++;

//        for ($compare = 1; $compare < strlen($s); $compare++) {
//            $maxString = substr($s, $begin, $compare);
////            echo var_dump($maxString);
//            echo var_dump($compare);
//            $pos = strpos($maxString, $s[$compare]);
//            if ($pos === false) {
//                // 没有重复
//                if (strlen($maxString) > $maxLenght) {
//                    $maxLenght = strlen($maxString);
//                }
//            } else {
//                // 重复
//                $begin = $begin + $pos + 1;
//                if ($begin + 1 === $compare) {
//                    $begin += 1;
//                    $compare = $begin + 1;
//                } else {
//                    $compare = $compare - 1;
//                }
////                echo var_dump($compare);
//                if ($compare === strlen($s)) {
//                    if (strlen($maxString) > $maxLenght) {
//                        $maxLenght = strlen($maxString);
//                    }
//                }
//
//            }
        }

        return $maxLenght;
    }
}


$solution = new Solution();

$string = 'pwwkew';

//echo var_dump(substr($string, 0, 1));
//echo var_dump(strlen($string));

$result =  $solution->lengthOfLongestSubstring($string);
echo var_dump($result);
?>
