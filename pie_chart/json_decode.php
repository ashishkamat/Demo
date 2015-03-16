<?php
session_start();

$var=$_SESSION['json'];
//echo $var;
include "get_data.php"
$string =json_decode($var);
echo $string;
?>