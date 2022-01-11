<?php
$signupsuccess="false";

$_SERVER['REQUEST_METHOD']='POST';
include 'dbconnect.php';
 $user_name=$_POST['signup'];
 $pass=$_POST['password'];
 $cpass=$_POST['cpassword'];
  $exitsql="SELECT * FROM `users` WHERE user_email='$user_name'";
  
  $result=mysqli_query($conn,$exitsql);
  $num=mysqli_num_rows($result);
  if($num>0){
      $showerror="Email already in use";
      
    }
    else{
        if($pass=$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$user_name', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if($result){
                $showalert=true;
                header("location:/php codes/php project/idiscuss/index.php?signupsuccess=true");
                // header means give location redirect
                exit();
            }
            
        }
        else{
            $showerror="password  do not match!";
        }
    }
    header("location:/php codes/php project/idiscuss/index.php?signupsuccess=false&error='$showerror'");
    

?>