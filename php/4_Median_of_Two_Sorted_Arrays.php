<?php

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        // 保证少元素的数组在第一个
        if (count($nums1) > count($nums2)) {
            $tmp = $nums1;
            $nums1 = $nums2;
            $nums2 = $tmp;
        }
        
        $max = function ($num1, $num2) {
            return $num1 > $num2 ? $num1 : $num2;
        };
        
        $min = function ($num1, $num2) {
            return $num1 < $num2 ? $num1 : $num2;
        };
        
        $m = count($nums1);
        $n = count($nums2);
        $half_len = intval(($m + $n + 1) / 2);
        $i_min = 0;
        $i_max = $m;
        
        while ($i_min <= $i_max) {
            $i = intval(($i_min + $i_max) / 2);
            $j = $half_len - $i;
            if ($i < $i_max && $nums2[$j - 1] > $nums1[$i]) {
                $i_min = $i + 1;
            } else if ($i > $i_min && $nums1[$i - 1] > $nums2[$j]) {
                $i_max = $i - 1;
            } else {
                
                if ($i === 0) {
                    $max_left = $nums2[$j - 1];
                } else if ($j === 0) {
                    $max_left = $nums1[$i - 1];
                } else {
                    $max_left = $max($nums1[$i - 1], $nums2[$j - 1]);
                }
                
                //        判断奇偶
                $odd_flag = ($m + $n) & 1;
                
                if ($odd_flag) {
                    return $max_left;
                }
                
                if ($i === $m) {
                    $min_right = $nums2[$j];
                } else if ($j === $n) {
                    $min_right = $nums1[$i];
                } else {
                    $min_right = $min($nums1[$i], $nums2[$j]);
                }
                
                return ($max_left + $min_right) / 2;
            }
        }
    }
}


$solution = new Solution();
$nums1 = [1, 2];
$nums2 = [1, 2, 3];
$result = $solution->findMedianSortedArrays($nums1, $nums2);
echo var_dump($result);
?>
