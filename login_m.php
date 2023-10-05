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
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href='index.php'>選擇身份</a></li>
                        
                        
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead text-white text-center"  style="background-color:#FFF8D7; height:850px;" >
 
        <center>
     <h2 ><font size = 8 color ="black">管理者登入</font></h2><br>
      <form  action = 'login_m1.php' method="post">
          
    <div class="form-group " style = 'opacity ; width:400px;'>
        <p align=left>
      <label for="acc" align = left><font size = 4 color ="black">帳號:</font></label>
        </p>
      <input type="text" class="form-control" placeholder="請輸入帳號" name="manager_id" >
    </div>
    <div class="form-group" style = 'opacity ; width:400px;'>
        
        <br>
        
        <p align=left>
        <label for="pwd" align = left><font size = 4 color ="black">密碼:</font></label>
        </p>
      <input type="password" class="form-control"  placeholder="請輸入密碼" name="manager_pass">
    </div>
    <div class="form-group form-check">
      <label align = left class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> <font size = 3 color="black">Remember me</font>
      </label>
          
     
    </div>
         

              
     <input class="btn btn-warning btn-sm btn-block"  style="background-color:#ffffff; width: 100px" type="submit" value="登&nbsp;入" class="btn btn-primary"/>    
   
 </form>
            </center>
        
        
        
        
        </header>
    </body>
</html>
