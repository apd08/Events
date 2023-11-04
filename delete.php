<?php
    require_once("dbconnect.php");

    $id=$_GET['id'];
    mysqli_query($mysqli, "DELETE FROM Мероприятие WHERE `Мероприятие`.`Мероприятие_id` = '$id'");
    header("Location: ".$address_site."/index_admin.php");
?>