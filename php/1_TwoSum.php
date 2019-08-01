<?php

class Solution
{
    
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        foreach ($nums as $key => $value) {
            $value2 = $target - $value;
            if (in_array($value2, $nums) && $key != array_search($value2, $nums)) {
                $result = [$key, array_search($value2, $nums)];
                sort($result);
                return $result;
            }
        }
    }
}


$solution = new Solution();

$result = $solution->twoSum([3, 3], 6);
echo var_dump($result);
?>
