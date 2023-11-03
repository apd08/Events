<?php
    //Подключение шапки
    require_once("header_admin.php");
?>
 
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
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

<div id="form_register">
            <h2>Добавление мероприятия</h2> <!--Форма добавления мероприятия-->
 
            <form action="addEvent.php" method="post" name="form_event">
                <div class="form-box">
                        <label for="form_event_name" class="form-label"> Название мероприятия: </label>
                        <div class="input-holder">
                            <input type="text" name="name" required="required" id="form_event_name">
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_event_first_date" class="form-label">Дата начала:</label>
                        <div class="input-holder">
                            <input type="date" name="first_date" required="required" id="form_event_first_date">
                        </div>
                    </div>
              
                    <div class="form-box">
                    <label for="form_event_last_date" class="form-label">Дата окончания: </label>
                        <div class="input-holder">
                            <input type="date" name="last_date" required="required" id="form_event_last_date"><br> <!--id = for in label-->
                            <span  class="mesage_error"></span><!--id="valid_email_message"-->
                        </div>
                    </div>
              
                    <div class="form-box">
                    <label for="form_event_information" class="form-label">Контактная информация: </label>
                        <div class="input-holder">
                            <input type="text" name="information" required="required" id="form_event_information"><br>
                            <span  class="mesage_error"></span> <!--id="valid_password_message"-->
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_event_description" class="form-label">Описание: </label>
                        <div class="input-holder">
                                <input type="text" name="description" required="required" id="form_event_description">
                        </div>
                    </div>

                    <!-- <div class="form-box">
                    <label for="form_event_information" class="form-label">Контактная информация: </label>
                        <div class="input-holder">
                                <input type="text" name="information" required="required" id="form_event_information">
                        </div>
                    </div> -->

                    

                    <!-- из других таблиц -->
                    <div class="form-box"> <!--Место проведения-->
                    <label for="form_event_place" class="form-label">Адрес: </label>
                        <div class="input-holder">
                                <input type="text" name="place" required="required" id="form_event_place">
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_event_type" class="form-label">Тип мероприятия: </label>
                        <div class="input-holder">
                            <select name="type" id="">
                                <option value="Концерт">Концерт</option>
                                <option value="Спорт">Спорт</option>
                                <option value="Фестиваль">Фестиваль</option>
                                <option value="Выставка">Выставка</option>
                                <option value="Кино">Кино</option>
                                <option value="Театр">Театр</option>
                                <option value="Другое">Другое</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_event_cost" class="form-label">Стоимость: </label>
                        <div class="input-holder">
                                <input type="text" name="cost" required="required" id="form_event_cost">
                        </div>
                    </div>

                    <h3>Организатор</h3>
                    <div class="form-box">
                    <label for="form_event_organizer" class="form-label">Контакты: </label>
                        <div class="input-holder">
                                <input type="text" name="organizer" required="required" id="form_event_organizer">
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_event_organizerName" class="form-label">Название организации: </label>
                        <div class="input-holder">
                                <input type="text" name="organizerName" required="required" id="form_event_organizer">
                        </div>
                    </div>

                    <td colspan="2">
                            <input type="submit" name="btn_submit_event" value="Добавить мероприятие">
                        </td>
                    </tr>
                
            </form>
        </div>