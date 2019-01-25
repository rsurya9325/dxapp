<?php 

require_once 'config/config.php';

if(isset($_GET['logout'])){

    $reg -> logout();
    $reg -> redirect('index.php');
}



?>