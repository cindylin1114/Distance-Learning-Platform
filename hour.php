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
        
        <header class="masthead text-white text-center"  style="background-color:#FFF8D7; height:850px;" >
            <div class="container d-flex align-items-center flex-column">
                
            
                 <center>
            <h2><font size = 6 color ="black">學生觀看時數總攬</font></h2></center><br>
        <table width="120%" style="border:3px #FFD306 solid;" cellpadding="8" border='1'>
            
    <tr bgcolor="white">
        <td width="25%" align="left" style="background-color:#FFF0AC;"><font color="black">學生代碼</font></td>
        <td width="25%" align="left" style="background-color:#FFF0AC;"><font color="black">學生姓名</font></td>
        <td width="25%" align="left" style="background-color:#FFF0AC;"><font color="black">觀看時數</font></td>
        <td width="25%" align="left" style="background-color:#FFF0AC;"><font color="black">觀看次數</font></td>
        
     </tr>
<?php
$class = $_GET['id1'];//web
$video = $_GET['id2'];//課程一
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

$sql = "SELECT student_id , student_name FROM student";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
     {
        echo "<tr bgcolor='white'>";
        echo "<td width='25%' align='left' style='background-color:#FFFAF2;'>
        <font color='black'>",$row["student_id"],"</font></td>";
        echo "<td width='25%' align='left' style='background-color:#FFFAF2;'>
        <font color='black'>",$row["student_name"],"</font></td>";
        session_start();    
        $_SESSION["student_id"] = $row["student_id"];
    
        $sql1 = "SELECT video_check,video_viewtime FROM time WHERE student_id = '{$_SESSION['student_id']}' and video_subject='{$_GET['id1']}' and video_name='{$_GET['id2']}'";
        $result1 = mysqli_query($conn,$sql1);
        while($row1 = mysqli_fetch_array($result1,MYSQLI_BOTH))
            {
                $count = 0;
                if ($row1["video_check"] == 1){
                    $count+=1;
                }
                date_default_timezone_set('Asia/Taipei'); 
                $dur = 0; 
                if(isset($_SESSION['enterTime']) ) 
                { 
                    $dur = time() - $_SESSION['enterTime']; 
                    $dur += mktime(0,0,0);
                } 
            
                echo "<td width='25%' align='left' style='background-color:#FFFAF2;'>
                <font color='black'>",date("H 時 i 分 s 秒",$dur),"</font></td>";
                echo "<td width='25%' align='left' style='background-color:#FFFAF2;'>
                <font color='black'>",$row1["video_check"],"</font></td>";
                echo "</tr>";
        }
    }
session_start();            

?>  
    
    
                </table>                   
            </div>
        </header>
    </body>
</html>

 



