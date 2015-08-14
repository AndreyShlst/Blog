<?php


//Получаем id редактируемой записи
$edit_note_id = (int)$_GET["id"];


//Зачитываем необходимые данные из файла конфигов.
$config = parse_ini_file("config.inc.ini");
//Соединяемся с БД
$db = new PDO($config["db.conn"],$config["db.user"],$config["db.password"]);
//Формируем запрос на получение данных этой записи
$query_get_data = "SELECT *
                   FROM news
                   WHERE id = :id";
//Подготавливаем его
$stmt_get = $db->prepare($query_get_data);
//Привязываем параметры к плейсхолдерам
$stmt_get->bindParam(':id', $edit_note_id);
//Исполняем
$stmt_get->execute();
//Записываем результат в переменную
$row = $stmt_get->fetch(PDO::FETCH_ASSOC);


//Далее работаем уже с новыми данными.Проверяем отправлена форма или нет
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //Фильтруем полученные данные
    $title = strip_tags(trim($_POST["title"]));
    $body = strip_tags(trim($_POST["body"]));
    $dt = strip_tags(trim($_POST["calendar"]));

    //Формируем запрос для апдейта записи
    $query_update_data = "UPDATE news
                          SET title = :title,
                              body = :body,
                              dt = :dt
                          WHERE id = :id";
    //Подготавливаем его
    $stmt_update = $db->prepare($query_update_data);
    //Привязываем параметры к плейсхолдерам
    $stmt_update->bindParam(':title', $title);
    $stmt_update->bindParam(':dt', $dt);
    $stmt_update->bindParam(':body', $body);
    $stmt_update->bindParam(':id', $edit_note_id);
    //Исполняем
    $stmt_update->execute();
    //Закрываем соединение с БД
    $db = null;

    //Перенаправляем форму (чтобы при нажатии F5 повторно не записывалась информация)
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
//HTML Форма
require_once("record.inc.php");
