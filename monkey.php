<?php
/**
 * @param int $n 总数
 * @param int $m 出局编号
 * @return array
 */
function monkey($n, $m) {
    if ($n <= 1) {
        return '数量必须大于1';
    }
    $arr = range(1,$n);
    $i = 0; //设置数组指针
    while(count($arr) > 1) {
        if (($i + 1) % $m == 0) {
            unset($arr[$i]);
        } else {
            array_push($arr, $arr[$i]); //如果没数到m或m的倍数,则把该猴放回尾部.
            unset($arr[$i]);
        }
        $i++;
    }
    return $arr;
}
$king = monkey(5,2);
var_dump($king);

/**
 * @param int $n 总数
 * @param int $m 出局编号
 * @return array
 */
function monkey2($n, $m) {
    if ($n <= 1) {
        return '数量必须大于1';
    }
    $arr = range(1, $n);
    $i = 0;
    while (count($arr) > 1) {
        $i++;
        $head = array_shift($arr);
        if ($i % $m != 0) {
            array_push($arr, $head);
        }
    }
    return $arr;
}
$king2 = monkey2(5, 2);
var_dump($king2);
