<?php
session_start();
require_once("dbconnect.php");
// require_once("auth.php");

// получение пользователя и мероприятия
//для отображение надо будет выбирать данные из таблиц, где будут совпадать айди
$event_id=$_GET['id'];
$user_id=$_SESSION['Пользователи_id'];

$favourites_query=$mysqli->query("INSERT INTO Избранное (Мероприятие_FK, Пользователи_FK) VALUES ('".$event_id."', '".$user_id."')");
if (!$favourites_query) {
    echo "Ошибка в запросе: " . $mysqli->error;
    exit;
}
header("Location: ".$address_site."/index.php");
?>