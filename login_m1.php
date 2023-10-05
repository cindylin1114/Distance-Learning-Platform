<?php



$connn=require_once "config.php";

$manager_id=$_POST["manager_id"];
$manager_pass=$_POST["manager_pass"];


//$username=$_POST["username"];
//增加hash可以提高安全性
//$password_hash=password_hash($student_pass,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $sql = "SELECT * FROM manager WHERE manager_id ='".$manager_id."'";
    echo "$manager_id";
    echo "$manager_pass";
    $result=mysqli_query($connn,$sql);
    if(mysqli_num_rows($result)==1 && $manager_pass==mysqli_fetch_assoc($result)["manager_pass"])
    {
   
    
    session_start();

    $_SESSION["loggedin"] = true;
    $_SESSION["manager_id"] = $manager_id;
    $_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
    header("location:memberlist.php");
        
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
    window.location.href='login_m.php';
     </script>"; 
    return false;
} 




?>