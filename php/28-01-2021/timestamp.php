<?php

$time=time();
$actual_time=date('d M Y @ H:i:s',$time);
$modify_time=date('d M Y @ H:i:s',strtotime('-1 week 2 hours 30 seconds'));
$modify_time2=date('d M Y @ H:i:s',$time-(2+15));

echo "the current time $actual_time <br> modify time $modify_time <br> other modifytime $modify_time2 ";
?>