<?php
$servername="localhost";
$username="root";
$password="";
$database="idicuss";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("We failed to connect the database because of this error-->".mysqli_connect_error());
    
}
// else{
//     echo"We connect succcessfully database";
// }

?>