<?php
/**
 * 数组 转 对象
 *
 * @param array $arr 数组
 * @return object
 */
class convert {
  

public function time_to_timer($time) {
    $time=strtotime($time);                             //如果系统接收的时间变量是字符串类型，必须转换为时间戳
    $rtime = date("m-d H:i:s",$time);                   //时间在今年的显示格式
    $htime = date("H:i:s",$time);                       //时间在今天的显示格式
    $ltime = date("Y-m-d H:i:s",$time);                 //时间不在今年的显示格式
    $times = time() - $time;                            //计算当前时间与给定时间的差值
    $year=date("Y",time())-date("Y",$time);             //计算是不是今年
    if ($times < 60) {
        $str = '刚刚';
    }
    elseif ($times < 60 * 60) {
        $min = floor($times/60);
        $str = $min.'分钟前';
    }
    elseif ($times < 60 * 60 * 24) {
        $h = floor($times/(60*60));
        $str = $h.'小时前 ';
    }
    elseif ($times < 60 * 60 * 24 * 3) {
        $d = floor($times/(60*60*24));
        if($d==1)
           $str = '昨天 '.$htime;
        else
           $str = '前天 '.$htime;
    }elseif($times >60 * 60 * 24 * 3&&$year < 1){   //时间差大于三天且时间是今年
        $str = $rtime;
    }else{
         $str = $ltime;                             //时间不是今年
    }
    return $str;
}
 
/**
 * 对象 转 数组
 *
 * @param object $obj 对象
 * @return array
 */
public function object_to_array($obj) {
    $obj = (array)$obj;
    foreach ($obj as $k => $v) {
        if (gettype($v) == 'resource') {
            return;
        }
        if (gettype($v) == 'object' || gettype($v) == 'array') {
            $obj[$k] = (array)object_to_array($v);
        }
    }
 
    return $obj;
    }
}