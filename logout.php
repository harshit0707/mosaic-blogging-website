<?php
session_start();
session_destroy();
setcookie('email','xyz',time()-1);
echo header("location:index.php");
?>