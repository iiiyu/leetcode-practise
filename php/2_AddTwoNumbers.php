<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class ListNode
{
    public $val = 0;
    public $next = null;
    
    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{
    
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $l3 = null;
        $lastItem3 = null;
        $carryFlag = false;
        $exitFlag = false;
        do {
            // 第一次进入
            if (is_null($lastItem3)) {
                $sum = $l1->val + $l2->val;
                $carryFlag = $sum > 9;
                $sum = $sum % 10;
                $l3 = new ListNode($sum);
                $l1 = $l1->next;
                $l2 = $l2->next;
                $lastItem3 = $l3;
                // 判断是否跳出
                $exitFlag = is_null($l1) && is_null($l2);
                if ($exitFlag) {
                    if ($carryFlag) {
                        $item = new ListNode(1);
                        $lastItem3->next = $item;
                        $carryFlag = false;
                    }
                    break;
                }
            } else {
                if ($carryFlag) {
                    $sum = 1;
                } else {
                    $sum = 0;
                }
                
                $carryFlag = false;
                
                if ($l1) {
                    $sum = $sum + $l1->val;
                    $l1 = $l1->next;
                }
                
                if ($l2) {
                    $sum = $sum + $l2->val;
                    $l2 = $l2->next;
                }
                
                $carryFlag = $sum > 9;
                $sum = $sum % 10;
                
                $item = new ListNode($sum);
                $lastItem3->next = $item;
                $lastItem3 = $item;
                
                if (is_null($l1) && is_null($l2)) {
                    if ($carryFlag) {
                        $item = new ListNode(1);
                        $lastItem3->next = $item;
                        $carryFlag = false;
                    }
                    break;
                }
            }
        } while (true);
        return $l3;
    }
}


$array1 = [1, 8, 3];
$array2 = [0];

$l1 = null;
$l2 = null;
$lastItem1 = null;
foreach ($array1 as $key => $value) {
    if ($l1) {
        $item = new ListNode($value);
        $lastItem1->next = $item;
        $lastItem1 = $item;
    } else {
        $l1 = new ListNode($value);
        $lastItem1 = $l1;
    }
}

$lastItem2 = null;
foreach ($array2 as $key => $value) {
    if ($l2) {
        $item = new ListNode($value);
        $lastItem2->next = $item;
        $lastItem2 = $item;
    } else {
        $l2 = new ListNode($value);
        $lastItem2 = $l2;
    }
}


$solution = new Solution();

$result = $solution->addTwoNumbers($l1, $l2);
echo var_dump($result);

?>
