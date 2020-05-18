<?php
    require_once('../../connection/connection.php');
    $sql= "DELETE FROM members WHERE memberID=".$_GET['memberID'];
    $sth = $db ->prepare($sql);
    $sth ->execute();  
   header('Location: list.php');

?>