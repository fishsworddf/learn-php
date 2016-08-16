<?php
$arr = [6,1,3,2,4,5,3];
// 冒泡排序
function maopao($arr) {
    if(!empty($arr) && is_array($arr)) {
        for($i=0; $i<count($arr); $i++) {
            for($j=$i;$j<count($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $temp;
                }
            }
        }
        return $arr;
    }
}
$maopao = maopao($arr);
print_r($maopao);
echo "<br/>";

// 快速排序
function quick_sort($arr) {
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }
    $base = $arr[0];
    $left_arr = $right_arr = array();
    for ($i=1; $i<$len; $i++) {
        if ($base > $arr[$i]) {
            $left_arr[] = $arr[$i];
        } else {
            $right_arr[] = $arr[$i];
        }
    }
    $left_arr = quick_sort($left_arr);
    $right_arr = quick_sort($right_arr);

    return array_merge($left_arr, array($base), $right_arr);

}
$quick_sort = quick_sort($arr);
print_r($quick_sort);
echo "<br/>";
// 选择排序
function select_sort($arr) {
   $len = count($arr);
   if ($len <= 1) {
       return $arr;
   }
   for ($i=0; $i<$len-1; $i++) {
       $p = $i;
       for ($j=$i+1; $j<$len; $j++) {
            if ($arr[$p] > $arr[$j]) {
                $p = $j;
            }
       }
       if ($p != $i) {
         $tmp = $arr[$p];
         $arr[$p] = $arr[$i];
         $arr[$i] = $tmp;
       }
   }
   return $arr;
}
$select_sort = select_sort($arr);
print_r($select_sort);
echo "<br/>";

function insert_sort($arr) {
    //区分 哪部分是已经排序好的
    //哪部分是没有排序的
    //找到其中一个需要排序的元素
    //这个元素 就是从第二个元素开始，到最后一个元素都是这个需要排序的元素
    //利用循环就可以标志出来
    //i循环控制 每次需要插入的元素，一旦需要插入的元素控制好了，
    //间接已经将数组分成了2部分，下标小于当前的（左边的），是排序好的序列
    for($i=1, $len=count($arr); $i<$len; $i++) {
        //获得当前需要比较的元素值。
        $tmp = $arr[$i];
        //内层循环控制 比较 并 插入
        for($j=$i-1;$j>=0;$j--) {
   //$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素
            if($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置
                //将后边的元素与前面的元素互换
                $arr[$j+1] = $arr[$j];
                //将前面的数设置为 当前需要交换的数
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素
           //由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    //将这个元素 插入到已经排序好的序列内。
    //返回
    return $arr;
}

$insert_sort = insert_sort($arr);
print_r($insert_sort);
