<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $l3 = null;
        $lastItem1 = null;
        $lastItem2 = null;
        $lastItem3 = null;
        $flag = false;
        $whileFlag = false;
        do {
            // 第一次进入
            if (is_null($lastItem1)){
                $lastItem1 = $l1;
                $lastItem2 = $l2;
               
                $sum = $lastItem1->val + $lastItem2->val;
                $flag = $sum > 9;
                $sum = $sum % 10;
                $l3 = new ListNode($sum);
                if (isset($lastItem1->next)){
                    $lastItem1 = $lastItem1->next;
                }
                
                if (isset($lastItem2->next)){
                    $lastItem2 = $lastItem2->next;
                }

                $lastItem3 = $l3;
                // 判断是否跳出
                $whileFlag = (is_null($lastItem1->next) && is_null($lastItem2->next));
                if ($whileFlag) {
                    if ($flag) {
                        $item = new ListNode(1);
                        $lastItem3->next = $item;
                        $flag = false;
                    }
                    break;
                }
                continue;
               
            }
            

            $whileFlag = is_null($lastItem1->next) && is_null($lastItem2->next);


            if ((is_null($lastItem1->next) && isset($lastItem2->next)) || $whileFlag) {

            // 只用l2
                if ($flag) {
                    $sum = $lastItem2->val + 1;
                    $flag = $sum > 9;
                    $sum = $sum % 10;
                } else {
                    $sum = $lastItem2->val;
                }
                $item = new ListNode($sum);
                $lastItem3->next = $item;
                $lastItem3 = $item;
                if (isset($lastItem2->next)){
                    $lastItem2 = $lastItem2->next;
                }
                continue;

            } 
            
            if ((is_null($lastItem2->next) && isset($lastItem1->next)) || $whileFlag) {

            // 只用l1
                if ($flag) {
                    $sum = $lastItem1->val + 1;
                    $flag = $sum > 9;
                    $sum = $sum % 10;
                } else {
                    $sum = $lastItem1->val;
                }
                $item = new ListNode($sum);
                $lastItem3->next = $item;
                $lastItem3 = $item;
                if (isset($lastItem1->next)){
                    $lastItem1 = $lastItem1->next;
                }
                continue;
            } 
            
            if (isset($lastItem1->next) && isset($lastItem2->next) || $whileFlag) {

                // ls1、ls2都用
                if ($flag) {
                    $sum = $lastItem1->val + $lastItem2->val + 1;
                    $flag = $sum > 9;
                    $sum = $sum % 10;
                } else {
                    $sum = $lastItem1->val + $lastItem2->val;
                    $flag = $sum > 9;
                    $sum = $sum % 10;
                }
                $item = new ListNode($sum);
                $lastItem3->next = $item;
                $lastItem3 = $item;

                if ($lastItem1->next){
                    $lastItem1 = $lastItem1->next;
                }

                if ($lastItem2->next){
                    $lastItem2 = $lastItem2->next;
                }
                continue;
            }
        } while (!$whileFlag);

        if ($flag) {
            $item = new ListNode(1);
            $lastItem3->next = $item;
            $flag = false;
        }

        return $l3;
    }
}



$array1 = [1,8];
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

// echo var_dump($l1);
// echo var_dump($l2);


$solution = new Solution();

$result = $solution->addTwoNumbers($l1, $l2);
echo var_dump($result);

?>
