<?php
//Получаем id удаляемой записи
$delete_note_id = (int)$_GET["id"];

//Зачитываем необходимые данные из файла конфигов.
$config = parse_ini_file("config.inc.ini");
//Соединяемся с БД
$db = new PDO($config["db.conn"],$config["db.user"],$config["db.password"]);
//Формируем запрос на получение данных этой записи
$query_delete_data = "DELETE FROM news
                      WHERE id = :id";
//Подготавливаем его
$stmt_delete = $db->prepare($query_delete_data);
//Привязываем параметры к плейсхолдерам
$stmt_delete->bindParam(':id', $delete_note_id);
//Исполняем
$stmt_delete->execute();
//Закрываем соединение
$db = null;

header("Location: ".$_SERVER['PHP_SELF']);