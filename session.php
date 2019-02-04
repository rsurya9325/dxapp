 
<?php
if(!empty($_SESSION['uid']))
{
$session_uid= $_SESSION['uid'];
include('classes/resourcesClass.php');
$userClass = new resourceClass();
}
if(empty($session_uid))
{
$url=BASE_URL.'index.php';
header("Location: $url");
}
?>
