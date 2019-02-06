<?php 

session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'dxapp');
define("BASE_URL", "http://localhost/dxapp/");


function getDB() {

$DB_server = DB_SERVER;
$DB_user = DB_USERNAME;
$DB_pass = DB_PASSWORD;
$DB_name = DB_DATABASE;
try
{
     $DB_con = new PDO("mysql:host=$DB_server;dbname=$DB_name",$DB_user,$DB_pass);
     $DB_con -> exec("set names utf8");
     $DB_con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $DB_con;
}
catch(PDOException $e)
{
     echo "<span style='color:#ff9900;'>".$e->getMessage()."</span>";
}
}

?>