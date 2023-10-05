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

if($_POST["video_id"])    
    {
         $video_id = $_POST["video_id"];
         $video_name = $_POST["video_name"];
         $video_subject = $_POST["video_subject"];
         $video_name1 = $_POST["video_name1"];
         $video_start = $_POST["video_start"];
         $video_end = $_POST["video_end"];
    
    $sql = "INSERT INTO `video` (`video_id`, `video_subject`, `video_name`, `video_name1`, `video_start`, `video_end`) VALUES ('$video_id', '$video_subject', '$video_name', '$video_name1', '$video_start', '$video_end');";
    
    
    $result = mysqli_query($conn,$sql);
    function_alert("新增成功!");    
    
    }

// # 檢查檔案是否上傳成功
// if ($_FILES['my_file']['error'] === UPLOAD_ERR_OK)
// {
//   echo '檔案名稱: ' . $_FILES['my_file']['name'] . '<br/>';
//   echo '檔案類型: ' . $_FILES['my_file']['type'] . '<br/>';
//   echo '檔案大小: ' . ($_FILES['my_file']['size'] / 1024) . ' KB<br/>';
//   echo '暫存名稱: ' . $_FILES['my_file']['tmp_name'] . '<br/>';

//   # 檢查檔案是否已經存在
//   if (file_exists('file/' . $_FILES['my_file']['name'])){
//     echo '檔案已存在。<br/>';
//   } else {
//     $file = $_FILES['my_file']['tmp_name'];
//     $dest = 'file/' . $_FILES['my_file']['name'];

//     # 將檔案移至指定位置
//     move_uploaded_file($file, $dest);
//   }
// } else {
//   echo '錯誤代碼：' . $_FILES['my_file']['error'] . '<br/>';
// }

function function_alert($message) 
{ 
      
    // Display the alert box  
    echo "<script>alert('$message');
    window.location.href='教師_首頁.php';
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
                                echo "登入名稱 :  ",$_SESSION["name"];?>
                            </a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="insertvideo.php">新增影片</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="教師_首頁.php">首頁</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="teachermodify.php">修改會員</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">登出</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
 <header class="masthead text-white text-center"  style="background-color:#FFF8D7; width:1578x; height:1300px;" >
            <div class="container d-flex align-items-center flex-column">
                
<h2><font size = 8 color ="black">新增影片</font></h2><br> 
<body>
    
 <form method="post" action="insertvideo.php" enctype="multipart/form-data">
    <center>

    <table width="100%" align="center">
    <tr align="center">
    <div style = 'width:350px; height:100px; '  >
     <p align=left><font size = 4 color ="black">科目編號:</font>
     <input type="text"  id="" placeholder="請輸入編號" name="video_id" required="required"><br>
     </div>
     <div style = 'width:350px; height:100px; '  >
     <p align=left><font size = 4 color ="black">科目名稱:</font>
     <input type="text"  id="" placeholder="請輸入科目" name="video_subject" required="required"><br>
     </div>
        </tr>
    <tr align="center">
    
     <div style = 'width:350px; height:100px; '  >
     <p align=left><font size = 4 color ="black">課程名稱:</font>
     <input type="text"  id="" placeholder="請輸入課程" name="video_name" required="required"><br>
     </div>
        </tr>
        
        <tr align="center">
    
     <div style = 'width:350px; height:100px; '  >
     <p align=left><font size = 4 color ="black">檔案名稱:</font>
     <input type="text"  id="" placeholder="請輸入檔案名稱" name="video_name1" required="required"><br>
     </div>
        </tr>
        <tr align="center">
    
     <div style = 'width:350px; height:100px; '  >
     <p align=left><font size = 4 color ="black">開放時間:</font>
     <input type="date"  id="" placeholder="請輸入檔案名稱" name="video_start" required="required"><br>
     </div>
        </tr>
        <tr align="center">
    
     <div style = 'width:350px; height:100px; '  >
     <p align=left><font size = 4 color ="black">結束時間:</font>
     <input type="date"  id="" placeholder="請輸入檔案名稱" name="video_end" required="required"><br>
     </div>
        </tr>
    
        <tr>
    <div style = 'width:350px; height:100px;' >
       <p align=left> <font size = 4 color ="black">上傳檔案:</font>
         <font size = 2 color="blue">
            <input type="file"
        name="my_file"
       ></font>
           
           
           
           
           
           
            
    </div>
    
             </tr>
        </table>
      
        <button  style="width:120px;height:50px; background-color:#FFFAF2;"><font size="4">儲存</font></button>
        
        
        
        
      
     </center>
    </form>
    </body>
     </div>
    </header>
        
    
    </body>
</html>
