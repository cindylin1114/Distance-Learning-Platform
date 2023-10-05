<?php



$connn=require_once "config.php";

$teacher_id=$_POST["teacher_id"];
$teacher_pass=$_POST["teacher_pass"];


//$username=$_POST["username"];
//增加hash可以提高安全性
//$password_hash=password_hash($student_pass,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $sql = "SELECT * FROM teacher WHERE teacher_id ='".$teacher_id."'";
    echo "$teacher_id";
    echo "$teacher_pass";
    $result=mysqli_query($connn,$sql);
    if(mysqli_num_rows($result)==1 && $teacher_pass==mysqli_fetch_assoc($result)["teacher_pass"])
    {
   
    
    session_start();

    $_SESSION["loggedin"] = true;
    $_SESSION["teacher_id"] = $teacher_id;
    $_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
    header("location:index_t.php");
        
    }
    else
    {
          function_alert("帳號或密碼錯誤"); 
    }
}
else
{
        function_alert("Something wrong"); 
}

    // Close connection
    mysqli_close($link);

function function_alert($message) 
{ 
      
    // Display the alert box  
    echo "<script>alert('$message');
    window.location.href='login_t.php';
     </script>"; 
    return false;
} 




?>