<?php
error_reporting(0);

$DBNAME = "movie";
$DBUSER = "root";
$DBPASSWD = "";
$DBHOST = "localhost";
$conn = mysqli_connect( $DBHOST, $DBUSER, $DBPASSWD);
if (empty($conn))
{
    print mysqli_error($conn);
    die ("無法連結資料庫");
    exit;
}
if( !mysqli_select_db($conn, $DBNAME)) 
{
    die ("無法選擇資料庫");
}
mysqli_query( $conn, "SET NAMES 'utf8'");
     
 
// 輸出類似：somefile.txt was last changed: December 29 2002 22:16:23.
date_default_timezone_set("Asia/Taipei");
$filename = 'movie.mp4';
$a=null;
if (file_exists($filename)) 
{
session_start(); 
$_SESSION['startTime'] = fileatime($filename) ; 
$now=date("H:i:s",time());
echo "現在時間:",$now;//now time
echo "    ";
$end=date("H:i:s",$_SESSION['startTime']); 
echo "開始時間:",$end;
echo "    ";
$time=(strtotime($now)-strtotime($end))/(60);
$time1=strtotime($now)-strtotime($end);
echo "觀看時間:",$time;  
echo "觀看時間:",$time1;  
echo "    ";
}
     

$arr = file($filename);
$count = (int)$arr[0];
echo "瀏覽次數：".$count;//次數
$fp = fopen($filename,"w");
fputs($fp,++$count);
fclose($fp);


            
            
//if($_POST["time_id"])    
//    {
//         $time = $_POST["time"];
//    
//    $sql = "INSERT INTO `time` (`time`) VALUES ('$time');";
//$result = mysqli_query($conn,$sql);
//        
//    
//    }







?>