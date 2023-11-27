<!-- для различий после авторизации -->

<?php
    //Подключение шапки
    require_once("header_admin.php");
?>
 
<?php
    $pushEvents= mysqli_query($mysqli, "SELECT * FROM `Мероприятие`");
    $pushEvents= mysqli_fetch_all($pushEvents);
    foreach($pushEvents as  $event){
?>
<!-- form_event контейнер для каждой формочки (я для наглядности добавила ему границы в css) -->
<!-- <div class="ticket_line"></div> -->
<div class="clearing_admin">

<div class="form_event">
  
    <div class="information">
        <p>Название Мероприятия:</p>
        <p><?=$event[1]?></p>
    </div>
    <div class="information">
        <p>Дата начала:</p>
        <p><?=$event[2]?></p>
    </div>
    <div class="information">
        <p>Дата окончания:</p>
        <p><?=$event[3]?></p>
    </div>
    <div class="information">
        <p>Контактная информация:</p>
        <p><?=$event[4]?></p>
    </div>
    <div class="information">
        <p>Описание:</p>
        <p><?=$event[5]?></p>
    </div>
    
    <?php
     $pushAdress= mysqli_query($mysqli, "SELECT * FROM `Место_проведения`");
     $pushAdress= mysqli_fetch_all($pushAdress);
     foreach($pushAdress as  $adress){
        if($event[6]==$adress[0]){
    ?>
    <div class="information">
        <p>Адрес:</p>
        <p><?=$adress[1]?></p>
    </div>
<?php
     $pushCost= mysqli_query($mysqli, "SELECT * FROM `Вид_билета`");
     $pushCost= mysqli_fetch_all($pushCost);
     foreach($pushCost as  $cost){
        if($event[0]==$cost[2]){
    ?>
    <div class="information">
        <p>Стоимость:</p>
        <p><?=$cost[3]?></p>
    </div>
    <div class="event_ad_btn">
    <div class="link_delete"> <!---закрыла в конце вместе с form_event-->
        <a href="delete.php?id=<?=$event[0]?>">Удалить</a>
    
        
    </div>
    <div class="link_update">
            <a href="form_update.php?id=<?=$event[0]?>">Изменить</a>
        </div>
    </div>
   
</div>
</div>
<div class="ticket_line"></div
<?php
        }
    }
}
    }
}
?>

<!-- <?php
    //Подключение подвала
    require_once("footer.php");
?> -->