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
         
    
    $sql2="UPDATE `student` SET `student_pass` = '{$student_pass}', `student_email` = '{$student_email}' WHERE `student`.`student_id` = '{$student_id}'";
    
    $result2 = mysqli_query($conn,$sql2);
    function_alert("修改成功!");
    }
        

$sql = "SELECT * FROM student WHERE student_id = '{$_GET['id']}' ";

$result = mysqli_query($conn,$sql);
        
   
     while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
     {
         
         $id1=$row[0];
         $id2=$row[2];
         $id3=$row[1];
         $id4=$row[3];
        
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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">首頁</a></li>
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="member_s.php">學生名單</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">登出</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
 <header class="masthead text-white text-center"  style="background-color:#FFF8D7; height:850px;" >
            <div class="container d-flex align-items-center flex-column">
                
<h2><font size = 8 color ="black">修改學生資料</font></h2><br> 
<body>
    
 <form method="post" action="modify_s.php">
    <center>
    <div style = 'width:750px'> 
    <h3 align="center"><font color="black">
        <?php echo "欲修改的學生學號 ： ",$id1;?></font></h3><br>
    </div>
    <table width="120%" align="center">
    <tr>
    <td width="50%">
     <div style = 'width:350px; height:100px; float:left; display:inline '  >
     <p align=left><font size = 4 color ="black">學生學號:</font>
     <input type="text" id=""  name="student_id" value='<?php echo $id1;?>'>
     </div>
    </td>
    <td>
     <div style = 'width:350px; height:100px;'>
     <p align=left><font size = 4 color ="black">密碼:</font>
     <input type="text" id=""  name="student_pass" value='<?php echo $id2;?>'>
     </div>
    </td>
    </tr>
    <tr>
    <td>
    <div style = 'width:350px; height:100px;float:left; display:inline'>
    <p align=left><font size = 4 color ="black">學生姓名:</font>
    <input type="text" id=""  name="student_name" value='<?php echo $id3;?>'>
    </div>
     </td> 
    <td>
    <div style = 'width:350px; height:100px;'>
    <p align=left><font size = 4 color ="black">email:</font>
    <input type="text" id=""  name="student_email" value='<?php echo $id4;?>'>
    </div>
    </td>
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
