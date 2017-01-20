<?php

// $partner = "";//fill with the partnerID which we already offered you (required fields) 
// $security_code = "";//fill with the security key which we already offered you (required fields)
$_input_charset = "utf-8"; 
$sign_type = "MD5"; 
$transport= "http";
$notify_url = "http://www.ravissanics.com/index.php?route=payment/alipay_cross_border/notify";//first you should change this url. if you want to know the function of the notify_url, you should read the alipay overseas order receiving interface file which we already offered you
$return_url = "http://www.ravissanics.com/index.php?route=payment/alipay_cross_border/return_url"; //first you should change this url. if you want to know the function of the notify_url, you should read the alipay overseas order receiving interface file which we already offered you
?>
