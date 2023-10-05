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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">登出</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class="masthead text-white text-center"  style="background-color:#FFF8D7; height:850px;" >
            <div class="container d-flex align-items-center flex-column">
                
            

                 <center>
            <h1><font size = 6 color ="black">學生名單</font></h1>
                </center>
                <left>
                <a href='insert_s.php'><button class='btn btn-warning btn-sm btn-block-left' style='width:160px;height:50px; background-color:#FFFAF2;' ><font size='4' color = 'black'>新增名單</font></button></a>
                </left>
                <br>
                
                
        <table width="120%" style="border:3px 	#FFD306 solid;" cellpadding="8" border='1'>
           
                
    <tr bgcolor="white">
        <td width="20%" align="center" style="background-color:#FFF0AC;"><font color="black">學號</font></td>
        <td width="20%" align="center" style="background-color:#FFF0AC;"><font color="black">學生姓名</font></td>
        <td width="20%" align="center" style="background-color:#FFF0AC;"><font color="black">密碼</font></td>
        <td width="20%" align="center" style="background-color:#FFF0AC;"><font color="black">E-mail</font></td>
        <td width="20%" align="center" style="background-color:#FFF0AC;"><font color="black"></font></td>
        
     </tr>
    
    <?php
 
$sql = "select * from `student`";
$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
{
    echo"<tr bgcolor='#FFFAF2'>";
    echo"<td><font color='black'>",$row["student_id"],"</font></td>";
    
    $id=$row["student_id"];  
    echo"<td><font color='black'>",$row["student_name"],"</font></td>";
    echo"<td><font color='black'>",$row["student_pass"],"</font></td>";
    echo"<td><font color='black'>",$row["student_email"],"</font></td>";
    echo"<td width='25%' align='center' style='background-color:#FFFAF2;'><a href='modify_s.php?id=$id'><button class='btn btn-warning btn-sm btn-block-center' style='width:80px;height:50px; background-color:#FFFAF2;' ><font size='4' color = 'black'>修改</font></button>
    <a href='delete_s.php?id=$id'><button class='btn btn-warning btn-sm btn-block-center' style='width:80px;height:50px; background-color:#FFFAF2;' ><font size='4' color = 'black'>刪除</font></button></a></td>";
    echo"</tr>";

} 
            

?>  
    
    
    
    
            
            
                </table>                   
            </div>
        </header>
    </body>
</html>
