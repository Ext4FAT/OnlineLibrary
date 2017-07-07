<?php

if($HTTP_X_FORWARDED_FOR!="")

$REMOTE_ADDR=$HTTP_X_FORWARDED_FOR;

$tmp_ip=explode(",",$REMOTE_ADDR);

$REMOTE_ADDR=$tmp_ip[0];

function getRealIp(){

    $ip=false;

    if(!empty($_SERVER["HTTP_CLIENT_IP"])){

        $ip = $_SERVER["HTTP_CLIENT_IP"];

}

if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);

        if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }

        for ($i = 0; $i < count($ips); $i++) {

            if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {

                $ip = $ips[$i];

                break;

            }

        }

    }

    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);

}

$real_ip=getRealIp();

echo "IP为：".$real_ip;

?>
