<?php
    //Запускаем сессию
    session_start();
    require_once("dbconnect.php");
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Название нашего сайта</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./css/style2.css">
        <link rel="stylesheet" type="text/css" href="./css/reset.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/reset.css"> -->
        <script src="https://kit.fontawesome.com/6aaabd05e2.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                "use strict";
                //================ Проверка email ==================
         
                //регулярное выражение для проверки email
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=email]');
                 
                mail.blur(function(){
                    if(mail.val() != ''){
         
                        // Проверяем, если введенный email соответствует регулярному выражению
                        if(mail.val().search(pattern) == 0){
                            // Убираем сообщение об ошибке
                            $('#valid_email_message').text('');
         
                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                            //Выводим сообщение об ошибке
                            $('#valid_email_message').text('Не правильный Email');
         
                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                        $('#valid_email_message').text('Введите Ваш email');
                    }
                });
         
                //================ Проверка длины пароля ==================
                var password = $('input[name=password]');
                 
                password.blur(function(){
                    if(password.val() != ''){
         
                        //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                        if(password.val().length < 6){
                            //Выводим сообщение об ошибке
                            $('#valid_password_message').text('Минимальная длина пароля 6 символов');
         
                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                             
                        }else{
                            // Убираем сообщение об ошибке
                            $('#valid_password_message').text('');
         
                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                        $('#valid_password_message').text('Введите пароль');
                    }
                });
            });
        </script>
    </head>
    <body>
 
        <div id="header">
            <div class="header_main"></div>
            <a href="/index.php" class="header_logo"><p class="logo_text">ТвояАфиша</p></a>

            <a href="#" class="place_link">
                <i class="fa-solid fa-location-dot" style="color: #f4f5f5;"></i>
                <div class="header_place_text">Минск</div>
            </a>


            <div id="auth_block">
            <?php
                //Проверяем авторизован ли пользователь
                if(!isset($_SESSION['Email']) && !isset($_SESSION['Пароль'])){
                    // если нет, то выводим блок с ссылками на страницу регистрации и авторизации
            ?>
                    <div id="link_register">
                        <a href="/form_register.php">Регистрация</a>
                    </div>
             
                    <div id="link_auth">
                        <a href="/form_auth.php">Вход</a>
                    </div>
            <?php
                }else{
                    //Если пользователь авторизован, то выводим ссылку Выход
            ?> </div>
                        <a href="list_favourites.php" class="bookmark_link">
                <i class="fa-solid fa-bookmark" style="color: #f4f5f5;"></i>
                <div class="header_bookmark_text">Избранное</div>
            </a>
            <div id="auth_block">
                    <div id="link_logout">
                        <a href="/logout.php">Выход</a>
                    </div>
                    </div>
                </div>
                

            <?php
                }
            ?>
            </div>

             <div class="clear"></div>
             
        </div>
        <div id="content_wrapper">
                <!-- <img id="background" src="img/back1.jpg" alt=""> -->
                    <div class="text">  <div class="title_text">Афиша мероприятий минска</div>
                    <div class="text_m">Добро пожаловать на наш сайт, посвященный мероприятиям в Минске! Если вы ищете волнующее музыкальное выступление, захватывающий спортивный матч или уникальное культурное событие, вы попали по адресу. Мы предлагаем широкий выбор разнообразных мероприятий в Минске. </div></div>
                    <div class="images"></div>
            </div>