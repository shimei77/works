<?php
    require_once('../../connection/connection.php');
    $sql= "DELETE FROM products WHERE productID=".$_GET['productID'];
    $sth = $db ->prepare($sql);
    $sth ->execute();  
   header('Location: list.php');

?>