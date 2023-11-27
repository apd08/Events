<?php
    //Подключение шапки
    require_once("header.php");
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
 
<?php
    //Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    //иначе выводим сообщение о том, что он уже авторизован
    if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
?>
 
 <div class="clearing">
        <div id="form_auth">
            <h2>Вход в аккаунт</h2>
            <form action="auth.php" method="post" name="form_auth">
            <div class="form-box">
                    <label for="form_auth_email" class="form-label">Email: </label>
                        <div class="input-holder">
                            <input type="email" name="email" required="required" id="form_register_email"><br> <!--id = for in label-->
                            <span id="valid_email_message" class="mesage_error"></span>
                        </div>
                    </div>
              
                    <div class="form-box">
                    <label for="form_auth_password" class="form-label">Пароль: </label>
                        <div class="input-holder">
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required" id="form_register_password"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </div>
                    </div>

                    <div class="form-box">
                    <label for="form_auth_cap" class="form-label">Введите капчу: </label>
                        <div class="input-holder">
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br><br>
                                <input type="text" name="captcha" placeholder="Проверочный код" required="required" id="form_register_cap">
                            </p>
                        </div>
                    </div>
                    
                        <td colspan="2">
                        <input type="submit" name="btn_submit_auth" value="Войти">
                        </td>
                    </tr>
                
            </form>
        </div>
    </div>
<?php
    }else{
?>
 
    <div id="authorized">
        <h2>Вы уже авторизованы</h2>
    </div>
 
<?php
    }
?>
 
<?php
    //Подключение подвала
    require_once("footer.php");
?>