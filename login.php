<?PHP
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


$student_id = $_POST['student_id'];//post獲得使用者名稱錶單值
$student_pass = $POST['student_pass'];//post獲得使用者密碼單值

$sql="select * from student where student_id='$student_id' and student_pass='$student_pass'";
$rs=mysqli_query($conn,$sql);

if ($record=mysqli_fetch_row($rs))
{
// session_start();
//    $_SESSION["student"]=$record[1];
    //$_SESSION["student"]=$record[1];
//    unset($_SESSION['student']);
    header("location=學生_首頁.php?method=message&message=登入成功");//如果成功跳轉至welcome.html頁面
   exit;   
}
else
{
    header("location=學生_首頁.php?method=message&message=登入失敗");
}

?>