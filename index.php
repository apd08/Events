<?php
    //Подключение шапки
    require_once("header.php");
    
?>

 <?php
    $pushEvents= mysqli_query($mysqli, "SELECT * FROM `Мероприятие`");
    $pushEvents= mysqli_fetch_all($pushEvents);
    foreach($pushEvents as  $event){
?>
<div class="ticket_line"></div>
<div class="event_wrapper">
<div class="form_event">
<?php
                //Проверяем авторизован ли пользователь
                if(!isset($_SESSION['Email']) && !isset($_SESSION['Пароль'])){
                    // если нет, то выводим блок с ссылками на страницу регистрации и авторизации
?>

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
</div>
 <?php
        }
    }
}
    }


                }else {
                    //Если пользователь авторизован, то выводим ссылку Выход
            ?>
                <!-- добавление в избранное -->
    <div class="link_favourites">
        <a href="favourites.php?id=<?=$event[0]?>"><i class="fa-solid fa-bookmark" style="color: #333D52;"></i></a>
    </div>
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
</div>
</div>

<?php
        }
    }
}
    }
}
    }
?>
<?php
                
   //Подключение подвала
    require_once("footer.php");
?>