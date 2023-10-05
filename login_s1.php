<?php



$connn=require_once "config.php";

$student_id=$_POST["student_id"];
$student_pass=$_POST["student_pass"];


//$username=$_POST["username"];
//增加hash可以提高安全性
//$password_hash=password_hash($student_pass,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $sql = "SELECT * FROM student WHERE student_id ='".$student_id."'";
    echo "$student_id";
    echo "$student_pass";
    $result=mysqli_query($connn,$sql);
    if(mysqli_num_rows($result)==1 && $student_pass==mysqli_fetch_assoc($result)["student_pass"])
    {
   
    
    session_start();

    $_SESSION["loggedin"] = true;
    $_SESSION["student_id"] = $student_id;
    $_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
    header("location:index_s.php");
        
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
    window.location.href='login_s.php';
     </script>"; 
    return false;
} 




?>