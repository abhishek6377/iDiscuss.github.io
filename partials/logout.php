<?php
session_start();
// echo " You are logout ";
session_destroy();
header("Location:/php codes/php project/idiscuss/index.php");

?>