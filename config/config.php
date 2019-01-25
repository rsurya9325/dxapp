<?php 
session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "phpbasic";

try
{
     $DB_con = new PDO('mysql:host=localhost;dbname=phpbasic',$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo "<span style='color:#ff9900;'>".$e->getMessage()."</span>";
}
include_once 'log_reg.php';
$reg = new Registration($DB_con); 
?>