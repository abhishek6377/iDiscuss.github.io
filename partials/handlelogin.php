<?php
// $signupsuccess="false";
$showError="false";

if($_SERVER['REQUEST_METHOD']='POST'){;
include "dbconnect.php";
$user_name=$_POST['loginemail'];
 $pass=$_POST['loginpass'];
 $sql="SELECT * FROM `users` WHERE user_email='$user_name'";
  $result=mysqli_query($conn,$sql);
  $numRows=mysqli_num_rows($result);
  if($numRows==1){
  $row=mysqli_fetch_assoc($result);
  if(password_verify($pass,$row['user_pass'])){
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['useremail']=$user_name;
      $_SESSION['sno']=$row['sno'];
      echo"logged in".$user_name;
      
    }
    header("location:/php codes/php project/idiscuss/index.php");
    
  }
  header("location:/php codes/php project/idiscuss/index.php");
  } 

?>