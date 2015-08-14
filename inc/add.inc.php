<?php
//Проверяем отправлена форма или нет
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Фильтруем полученные данные
    $title = strip_tags(trim($_POST["title"]));
    $body = strip_tags(trim($_POST["body"]));
    $dt = strip_tags(trim($_POST["calendar"]));


    //Зачитываем необходимые данные из файла конфигов.
    $config = parse_ini_file("config.inc.ini");
    //Соединяемся с БД
    $db = new PDO($config["db.conn"],$config["db.user"],$config["db.password"]);
    //Формируем необходимый запрос
    $query = "INSERT INTO news (title,
                                dt,
                                body)
              VALUES (:title,
                      :dt,
                      :body)";
    //Подготавливаем его
    $stmt = $db->prepare($query);
    //Привязываем параметры к плейсхолдерам
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':dt', $dt);
    $stmt->bindParam(':body', $body);
    //Исполняем
    $stmt->execute();
    //Закрываем соединение с БД
    $db = null;


    //Перенаправляем форму (чтобы при нажатии F5 повторно не записывалась информация)
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
$row["title"] = "";
$row["body"] = "";
$row["dt"] = "";
//HTML Форма
require_once("record.inc.php");