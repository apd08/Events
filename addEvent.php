<?php
    //Запускаем сессию
    session_start();

    //Добавляем файл подключения к БД
    require_once("dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

    //функция для проверки даты
    function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, значит пользователь зашёл на эту страницу напрямую. В этом случае выводим ему сообщение об ошибке.
    */
    if(isset($_POST["btn_submit_event"]) && !empty($_POST["btn_submit_event"])){
        if(isset($_POST["name"])){
                
            //Обрезаем пробелы с начала и с конца строки
            $name = trim($_POST["name"]);

            //Проверяем переменную на пустоту
            if(!empty($name)){
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $name = htmlspecialchars($name, ENT_QUOTES);
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите название мероприятия</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");

                //Останавливаем скрипт
                exit();
            }

            
        }else{
            // Сохраняем в сессию сообщение об ошибке. 
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с названием</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_event.php");

            //Останавливаем скрипт
            exit();
        }

        //
        if(isset($_POST["first_date"])){
                
            //Обрезаем пробелы с начала и с конца строки
            $first_date = trim($_POST["first_date"]);

            //Проверяем переменную на пустоту
            if(!empty($first_date)){
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $first_date = htmlspecialchars($first_date, ENT_QUOTES);
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите дату начала мероприятия</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");

                //Останавливаем скрипт
                exit();
            }

            
        }else{
            // Сохраняем в сессию сообщение об ошибке. 
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с датой начала</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_event.php");

            //Останавливаем скрипт
            exit();
        }

        //
        if(isset($_POST["last_date"])){
            
            //var_dump(validateDate('2012-02-03', 'Y-m-d'));
                
            //Обрезаем пробелы с начала и с конца строки
            $last_date = trim($_POST["last_date"]);

            //Проверяем переменную на пустоту
            if(!empty($last_date)){
                // Для безопасности, преобразуем специальные символы в HTML-сущности
                $last_date = htmlspecialchars($last_date, ENT_QUOTES);
            if(!validateDate($last_date, 'Y-m-d')){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Неверный формат даты</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");

                //Останавливаем скрипт
                exit();
            }
            }
            else{
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите дату окончания мероприятия</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
        }

        }else{
            // Сохраняем в сессию сообщение об ошибке. 
            $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с датой окончания</p>";

            //Возвращаем пользователя на страницу регистрации
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$address_site."/form_event.php");

            //Останавливаем скрипт
            exit();
        }


        //Контактная информация
            if(isset($_POST["information"])){
                    
                //Обрезаем пробелы с начала и с конца строки
                $information = trim($_POST["information"]);
    
                //Проверяем переменную на пустоту
                if(!empty($information)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $information = htmlspecialchars($information, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите контактную информацию</p>";
    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_event.php");
    
                    //Останавливаем скрипт
                    exit();
                }
    
                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с контактной информацией</p>";
    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
    
                //Останавливаем скрипт
                exit();
            }


            //Описание
            if(isset($_POST["description"])){
                    
                //Обрезаем пробелы с начала и с конца строки
                $description = trim($_POST["description"]);
    
                //Проверяем переменную на пустоту
                if(!empty($description)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $description = htmlspecialchars($description, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите описание мероприятия</p>";
    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_event.php");
    
                    //Останавливаем скрипт
                    exit();
                }
    
                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с описанием</p>";
    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
    
                //Останавливаем скрипт
                exit();
            }


            //Место проведения
            if(isset($_POST["place"])){
                    
                //Обрезаем пробелы с начала и с конца строки
                $place = trim($_POST["place"]);
    
                //Проверяем переменную на пустоту
                if(!empty($place)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $place = htmlspecialchars($place, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите место проведения мероприятия</p>";
    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_event.php");
    
                    //Останавливаем скрипт
                    exit();
                }
    
                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с местом проведения</p>";
    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
    
                //Останавливаем скрипт
                exit();
            }


            //Тип мероприятия
            if(isset($_POST["type"])){
                    
                //Обрезаем пробелы с начала и с конца строки
                $type = trim($_POST["type"]);
    
                //Проверяем переменную на пустоту
                if(!empty($type)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $type = htmlspecialchars($type, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите тип мероприятия</p>";
    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_event.php");
    
                    //Останавливаем скрипт
                    exit();
                }
    
                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с типом мероприятия</p>";
    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
    
                //Останавливаем скрипт
                exit();
            }


            //Организатор. Контактная информация
            if(isset($_POST["organizer"])){
                    
                //Обрезаем пробелы с начала и с конца строки
                $organizer = trim($_POST["organizer"]);
    
                //Проверяем переменную на пустоту
                if(!empty($organizer)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $organizer = htmlspecialchars($organizer, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите организатора мероприятия</p>";
    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_event.php");
    
                    //Останавливаем скрипт
                    exit();
                }
    
                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с информацией об организаторе мероприятия</p>";
    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
    
                //Останавливаем скрипт
                exit();
            }

            //Организатор. Название организации
            if(isset($_POST["organizerName"])){
                    
                //Обрезаем пробелы с начала и с конца строки
                $organizerName = trim($_POST["organizerName"]);
    
                //Проверяем переменную на пустоту
                if(!empty($organizerName)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $organizer = htmlspecialchars($organizerName, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите организатора мероприятия</p>";
    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_event.php");
    
                    //Останавливаем скрипт
                    exit();
                }
    
                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с информацией об организаторе мероприятия</p>";
    
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");
    
                //Останавливаем скрипт
                exit();
            }

            /*вот тут до закрытия скобки начинается развлечение с добавлением в бд*/
            //(4) добавление мероприятия в БД
            $name=$_POST["name"];
            $first_date=$_POST["first_date"];
            $last_date=$_POST["last_date"];
            $information=$_POST["information"];
            $description=$_POST["description"];
            $place=$_POST["place"];//из др таблиц
            $type=$_POST["type"];
            $cost=$_POST["cost"];
            $organizer=$_POST["organizer"];
            $organizerName = $_POST["organazerName"];

            //на вставку в таблицу Место_проведения
            $result_place_query= $mysqli -> query("INSERT INTO `Место_проведения` (Адрес) VALUES ('".$place."')");
            $place_id = $mysqli->insert_id;

            //на вставку в таблицу Тип_мероприятия
            $result_type_query= $mysqli -> query("INSERT INTO `Типы_мероприятий` (Тип_мероприятия) VALUES ('".$type."')");
            $type_id = $mysqli->insert_id;

            //на вставку в таблицу Организатор
            $result_organaizer_query= $mysqli -> query("INSERT INTO `Организатор` (Контакты, Название_организации) VALUES ('".$organizer."' , '".$organizerName."')");
            $org_id = $mysqli->insert_id;

            $result_event_insert = $mysqli->query("INSERT INTO `Мероприятие` (Название, Дата_начала, Дата_окончания, Контактная_информация, Описание, Место_проведения_FK, Типы_мероприятий_FK, Организатор_FK) VALUES ('".$name."', '".$first_date."', '".$last_date."', '".$information."', '".$description."' , '".$place_id."' , '".$type_id."' , '".$org_id."')"); //
            $event_id=$mysqli->insert_id;

            $insert_category = $mysqli->query("INSERT INTO `Категория_посетителя` (Категория) VALUES ('Стандартный')");
            $category_id=$mysqli->insert_id;

            $result_cost_insert = $mysqli->query("INSERT INTO `Вид_билета` (Категория_посетителя_FK, Мероприятие_FK, Стоимость) VALUES ('".$category_id."' , '".$event_id."' , '".$cost."')");


            if(!$result_event_insert){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления мероприятия в БД</p>";
                // echo "Ошибка: " . $mysqli->error; //это если надо выводит конкретную ошибку почему не проходит запрос на добавление
             //   exit();
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_event.php");

                //Останавливаем  скрипт
                exit();
            }else{

                $_SESSION["success_messages"] = "<p class='success_message'>Мероприятие добавлено! <br />Теперь Вы можете просмотреть его на главной странице.</p>";

                //Отправляем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/index_admin.php");
            }

            /* Завершение запроса */
            $result_event_insert->close();

            //Закрываем подключение к БД
            $mysqli->close();
            
        }
        else{

            exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
        }
    ?>