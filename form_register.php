    <?php
    //Подключение шапки
    require_once("header.php");
?>
<!-- Блок для вывода сообщений -->
<div class="block_for_messages">
    <?php
        //Если в сессии существуют сообщения об ошибках, то выводим их
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["error_messages"]);
        }
 
        //Если в сессии существуют радостные сообщения, то выводим их
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Уничтожаем чтобы не выводились заново при обновлении страницы
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Проверяем, если пользователь не авторизован, то выводим форму регистрации, 
    //иначе выводим сообщение о том, что он уже зарегистрирован
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
 <div class="clearing">
        <div id="form_register">
            <h2>Регистрация</h2> <!--Ф
            орма регистрации-->
 
            <form action="register.php" method="post" name="form_register">
                <div class="form-box">
                        <label for="form_register_name" class="form-label"> Имя: </label>
                        <div class="input-holder">
                            <input type="text" name="first_name" required="required" id="form_register_name">
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_register_last_name" class="form-label">Фамилия:</label>
                        <div class="input-holder">
                            <input type="text" name="last_name" required="required" id="form_register_last_name">
                        </div>
                    </div>
            
                    <div class="form-box">
                    <label for="form_register_email" class="form-label">Email: </label>
                        <div class="input-holder">
                            <input type="email" name="email" required="required" id="form_register_email"><br> <!--id = for in label-->
                            <span id="valid_email_message" class="mesage_error"></span>
                        </div>
                    </div>
              
                    <div class="form-box">
                    <label for="form_register_password" class="form-label">Пароль: </label>
                        <div class="input-holder">
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required" id="form_register_password"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_register_cap" class="form-label">Введите капчу: </label>
                        <div class="input-holder">
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br><br>
                                <input type="text" name="captcha" placeholder="Проверочный код" required="required" id="form_register_cap">
                            </p>
                        </div>
                    </div>
                    
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                        </td>
                    </tr>
                
            </form>
        </div>
    </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зарегистрированы</h2>
        </div>
<?php
    }
     
    //Подключение подвала
    require_once("footer.php");
?>