<?php
//$conn=require_once "config.php";
date_default_timezone_set('Asia/Taipei'); 
 
  echo 'current Unix timestamp: '.time().'<br>'; //當前的 Unix 時間戳
 
  $WeekSeconds=time()+(24*60*60*7); //24小時x60分x60秒x7天  
  //date_default_timezone_set(‘Asia/Taipei’);
  echo '現在是: '.date('Y-m-d H:i:s"').'<br>';

	            
 
?>