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

 
$sql = "DELETE FROM `student` WHERE `student`.`student_id` = '{$_GET['id']}'";
function_alert("刪除成功!");
mysqli_query($conn,$sql)or die ("無法刪除".mysql_error());

//mysql_query($sql);
mysql_close($conn);





function function_alert($message) 
{ 
      
    // Display the alert box  
    echo "<script>alert('$message');
    window.location.href='member_s.php';
     </script>"; 
    //return false;
} 
?>