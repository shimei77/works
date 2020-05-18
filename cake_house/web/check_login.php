<?php
session_start();
require_once('../connection/connection.php'); 

if(!isset($_SESSION['member']) && $_SESSION['member'] == null ){
    header('Location: ../web/register.php?Msg=LoginFirst');
}
?>