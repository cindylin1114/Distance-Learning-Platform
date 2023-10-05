<meta charset="utf-8">
<form action="login.php" method="get">
<h1>t1</h1>
id：<input type="text" name="student_id">
pass：<input type="text" name="student_pass">
<input type="submit" value="登入">
</form>


<?php
// 開啟 SESSION
//session_start();


// 設定資料庫連結
error_reporting(0);
$DBNAME = "test";
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
        


// 主程式
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $student_id = $_POST['student_id'];
  $student_pass = $_POST['student_pass'];
  if ($errors = validate_form($student_id, $student_pass)) {
    show_form($errors);
  } else {
    process_form($student_id);
  }
}  else {
  show_form();
}


// 顯示表單
function show_form($errors='') {
  if ($errors) {
    echo "<ul><li>";
    echo implode('</li><li>', $errors);
    echo "</li></ul>";
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $default = $_POST;
  } else {
    $default = ['$student_id'=>'',
                '$student_pass'=>''];
  }
 
}


// 檢驗帳號密碼正確性
function validate_form($student_id, $student_pass) {
  $errors = array();
  $pass_ok = false;
  $sql = "SELECT * FROM student WHERE student_id = '$student_id'";
  if ($result = mysql_query($sql)) {
    while ($row = mysql_fetch_array($result)) {
      if ($student_pass === $row['student_pass']) {
        $student_pass_ok = true;
      }
    }
  }
  if (!$student_pass_ok) {
    $errors[] = "<font color='red'>密碼錯誤，請再試一次</font>";
  }
  return $errors;
}


// 加入帳號到 SESSION 中
function process_form($student_id) {
  $_SESSION['student_id'] = $student_id;
  header('location:學生_首頁.php');
}

?>
