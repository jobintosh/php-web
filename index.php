<?php

date_default_timezone_set("Asia/Bangkok"); 
$ddate = date("H");

if (($ddate >= 0) && ($ddate <= 5)) {    
        echo "ช่วงเช้ามืด";
    } elseif (($ddate >= 6) && ($ddate <= 12)) {
        echo "ช่วงเวลาเช้า";
    } elseif (($ddate >= 13) && ($ddate <=15)) {
        echo "ช่วงเวลาบ่าย";
    } elseif (($ddate >= 16) && ($ddate <=18)) {
        echo "ช่วงเวลาเย็น";
    } elseif (($ddate >= 19) && ($ddate <=23)) {
        echo "ช่วงเวลากลางคืน";
    }

?>