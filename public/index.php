<?php
/**
 * 是否开启DEBUG
 */
if(CONFIG['app']['debug'] == true)
{
    $rp = E_ALL;
    $e2 = 'On';
}
else
{
    $rp = 0;
    $e2 = 'Off';
}

error_reporting($rp);
ini_set('display_errors',$e2);

require_once '../boot/bootstrap.php';