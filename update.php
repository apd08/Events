<?php

//Запускаем сессию
session_start();

//require_once("form_update.php");

require_once("dbconnect.php");

//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
$_SESSION["error_messages"] = '';

//Объявляем ячейку для добавления успешных сообщений
$_SESSION["success_messages"] = '';

if(isset($_POST["btn_update_event"]) && !empty($_POST["btn_update_event"])){

$id=$_POST["id"];
$name=$_POST["name"];
$first_date=$_POST["first_date"];
$last_date=$_POST["last_date"];
$information=$_POST["information"];
$description=$_POST["description"];
$place=$_POST["place"];//из др таблиц
$cost=$_POST["cost"];
// $type=$_POST["type"];
// $organizer=$_POST["organizer"];
// $organizerName = $_POST["organazerName"];

$result_update = $mysqli->query("UPDATE Мероприятие SET `Название` = '$name', `Дата_начала` = '$first_date', `Дата_окончания` = '$last_date', `Контактная_информация` = '$information', `Описание` = '$description' WHERE `Мероприятие`.`Мероприятие_id` = '$id';");


if(!$result_update){
    // Сохраняем в сессию сообщение об ошибке. 
    $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на обновление информации</p>";
     echo "Ошибка: " . $mysqli->error; //это если надо выводит конкретную ошибку почему не проходит запрос на добавление    

    //Останавливаем  скрипт
    exit();
}else{

    $_SESSION["success_messages"] = "<p class='success_message'>Информация обновлена!</p>";    
    //header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$address_site."/index_admin.php");
    exit();


}
}

/* Завершение запроса */
$result_update->close();

//Закрываем подключение к БД
$mysqli->close();

?>