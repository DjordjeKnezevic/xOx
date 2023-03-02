<?php
session_start();
$_SESSION['test'] = 'TEST';
$_SESSION['Rick'] = "";
header("Location: http://localhost:8080/test2.php");
// header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");

?>