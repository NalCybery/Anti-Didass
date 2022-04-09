<?php

// Coded By @SirMusk - My Telegram Channel @NullCyberi //

//<--------------------------- SirMusk ------------------------------>//
//مقدار $reqSIRMUSK رکوئست های یک آی پی و متغیر $timeSIRMUSK زمان بر حسب ثانیه است.
$reqSIRMUSK=3; //مقدار رکوئست های یک آی پی
$timeSIRMUSK=10; // زمان بر حسب ثانیه
//<--------------------------- SIR MUSK ------------------------------>//
session_start();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
} $ips=file('SIRMUSK.txt');
foreach($ips as $ipbad)
{
  if(trim($ipbad) == $ip){
  header('HTTP/1.0 403 Forbidden');
  exit();
   }
} if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeSIRMUSK)) {
    session_unset();
    session_destroy();
    $_SESSION['rec']   = 1;
} if(!isset($_SESSION['rec']) || $_SESSION['rec']==0){
$_SESSION['rec']   = 1;
$_SESSION['LAST_ACTIVITY'] = time();
} else {
$_SESSION['rec']++;
}
if($_SESSION['rec']>=$reqSIRMUSK){
$file = 'SIRMUSK.txt';
$current = file_get_contents($file);
$current .= $ip."\n";
file_put_contents($file, $current);
}
//<--------------------------- SIR MUSK ------------------------------>//

// Coded By @SiRMusk - My Telegram Channel @NullCyberi //

?>