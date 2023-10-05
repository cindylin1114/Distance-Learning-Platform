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

if($_POST["student_id"])    
    {
         $student_id = $_POST["student_id"];
         $student_name = $_POST["student_name"];
         $student_pass = $_POST["student_pass"];
         $student_email = $_POST["student_email"];
    
    $sql = "INSERT INTO `student` (`student_id`, `student_name`, `student_pass`, `student_email`) VALUES ('$student_id', '$student_name', '$student_pass', '$student_email');";
    $result = mysqli_query($conn,$sql);
    function_alert("新增成功!");    
    
    }

function function_alert($message) 
{ 
      
    // Display the alert box  
    echo "<script>alert('$message');
    window.location.href='member_s.php';
     </script>"; 
    //return false;
} 






?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>遠距教學影片管理系統</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" >
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">遠距教學影片管理系統</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">
                       <?php 
                        session_start();
                        echo "登入名稱 : ",$_SESSION["manager_id"];
                        ?></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="memberlist.php">首頁</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="member_t.php">教授名單</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="member_s.php">學生名單</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">登出</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
 <header class="masthead text-white text-center"  style="background-color:#FFF8D7; width:1578x; height:950px;" >
            <div class="container d-flex align-items-center flex-column">
                
<h2><font size = 8 color ="black">新增學生名單</font></h2><br> 
<body>
    
 <form method="post" action="insert_s.php">
    <center>

    <table width="100%" align="center">
    
    
    <tr>
    
    <div style = 'width:350px; height:100px;'>
    <p align=left><font size = 4 color ="black">學生學號:</font>
    <input type="text"  id="" placeholder="請輸入學號" name="student_id" required="required"><br>
        
    </div>
      
    </tr>
        
        <tr>
    
    <div style = 'width:350px; height:100px;'>
    <p align=left><font size = 4 color ="black">學生姓名:</font>
    <input type="text"  id="" placeholder="請輸入姓名" name="student_name" required="required"><br>
        
    </div>
      
    </tr>
        <tr>
    

      
    </tr>
        <tr>
    
    <div style = 'width:350px; height:100px;'>
    <p align=left><font size = 4 color ="black">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼:</font>
    <input type="text"  id="" placeholder="請輸入密碼" name="student_pass" required="required"><br>
        
    </div>
      
    </tr>
        
       <tr>
    
    <div style = 'width:350px; height:100px;'>
    <p align=left><font size = 4 color ="black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail:</font>
    <input type="text"  id="" placeholder="請輸入E-mail" name="student_email" required="required"><br>
        
    </div>
      
    </tr>
        
        
        <tr>
    
    
    <button  style="width:120px;height:50px; background-color:#FFFAF2;"><font size="4">新增</font></button>
        
    
      
    </tr>
        
        </table>
      
        
        
        
        
      
     </center>
    </form>
    </body>
     </div>
    </header>
        
    
    </body>
</html>
