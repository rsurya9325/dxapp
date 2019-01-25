
<?php 
require_once 'config/config.php';
if(!$reg ->is_login())
{
    $reg->redirect('index.php');
}

$sess_user = $_SESSION['logged_user'];
$stmt = $DB_con -> prepare ("SELECT * FROM registration WHERE id = :userid");
$stmt -> execute(array(":userid" => $sess_user));
$user_det = $stmt -> fetch(PDO::FETCH_ASSOC);




?>