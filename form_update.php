<?php
    //Подключение header
    require_once("header_admin.php");
    //Добавляем файл подключения к БД
    require_once("dbconnect.php");
    //Подключение footer
    // require_once("footer.php"); // footer вот так можно подключить, но он меня сильно выбесил пока налазил на таблицу

    $events_id=$_GET['id'];
    $event=mysqli_query($mysqli, "SELECT * FROM `Мероприятие` WHERE `Мероприятие_id` = '$events_id'");
    $event=mysqli_fetch_assoc($event);
    // print_r($event);

    //из таблицы "Место_проведения"
    $places_id=$_GET['id'];
    $place=mysqli_query($mysqli, "SELECT * FROM `Место_проведения` WHERE `Место_проведения_id` = '$places_id'");
    $placeData=mysqli_fetch_assoc($place);
    // print_r($placeData);   
    
    //из таблицы "Вид_билета"
    // $cost_id=$_GET['id'];
    // $cost= mysqli_query($mysqli, "SELECT * FROM `Вид_билета` WHERE `Вид_билета_id` = '$cost_id'");
    // $cost=mysqli_fetch_assoc($cost);
    // print_r($cost);   //вот это будет работать, когда буду совпадать id в таблицах
?>

<!-- Блок для вывода сообщений -->

    <?php
 
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не появилось заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не появилось заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
<div class="clearing_admin">
<div class="block_for_messages">
    <div id="from_update">
        <h3>Обновить информацию о мероприятии</h3>

        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?=$event['Мероприятие_id']?>"><!-- спрятанный инпут для извлечения id -->
        <div class="form-box">
            <label for="form_event_name" class="form-label"> Название мероприятия: </label><!---->
                <div class="input-holder">
                    <input type="text" value="<?=$event['Название']?>" name="name" required="required" id="form_event_name">
                </div>
        </div>

        <div class="form-box">
            <label for="form_event_first_date" class="form-label">Дата начала:</label>
            <div class="input-holder">
                <input type="date" value="<?=$event['Дата_начала']?>" name="first_date"  required="required" id="form_event_first_date">
            </div>
        </div>
                
        <div class="form-box">
            <label for="form_event_last_date" class="form-label">Дата окончания: </label>
            <div class="input-holder">
                <input type="date" value="<?=$event['Дата_окончания']?>" name="last_date" required="required" id="form_event_last_date"><br> <!--id = for in label-->
                <span  class="mesage_error"></span><!--id="valid_email_message"-->
            </div>
        </div>
                
        <div class="form-box">
            <label for="form_event_information" class="form-label">Контактная информация: </label>
            <div class="input-holder">
                <input type="text" value="<?=$event['Контактная_информация']?>" name="information" required="required" id="form_event_information"><br>
                <span  class="mesage_error"></span> <!--id="valid_password_message"-->
            </div>
        </div>

        <div class="form-box">
            <label for="form_event_description" class="form-label">Описание: </label>
            <div class="input-holder">
                <input type="text" value="<?=$event['Описание']?>" name="description" required="required" id="form_event_description">
            </div>
        </div>                    

                        <!-- из других таблиц -->
        <div class="form-box"> <!--Место проведения-->
            <label for="form_event_place" class="form-label">Адрес: </label>
            <div class="input-holder">
                <input type="text" value="<?=$placeData['Адрес']?>" name="place" required="required" id="form_event_place">
            </div>
            
        </div>
        <input type="submit" id="upd_btn" name="btn_update_event" value="Обноваить информацию">

    </div>
</div>
</div>
