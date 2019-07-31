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
        $listToInt = function (ListNode $list) {
            $i = 1;
            $result = 0;
            while(true){
                if (!$list->next) {
                    $result = $result + $list->val * $i;
                    $list = $list->next;
                    $i = $i * 10;
                    break;
                }
                $result = $result + $list->val * $i;
                $list = $list->next;
                $i = $i * 10;
            }
            return $result;
        };

        $intToList = function (Int $num) {
            $result = null;
            $lastItem = null;
            $i = 0;
            while (true) {
                $i = $num % 10;
                if (!($i) && $num < 10) {
                    break;
                }

                if (is_null($result)) {
                    echo var_dump($i);
                    $result = new ListNode($i);
                    $lastItem = $result;
                } else {
                    $item = new ListNode($i);
                    $lastItem->next = $item;
                    $lastItem = $item;
                }
                $num = intval($num / 10);
            }
            return $result;
        };
        return $intToList(($listToInt($l1) + $listToInt($l2)));
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
