<?php

    //Зачитываем необходимые данные из файла конфигов.
    $config = parse_ini_file("config.inc.ini");
    //Соединяемся с БД
    $db = new PDO($config["db.conn"],$config["db.user"],$config["db.password"]);
    //Формируем sql-запрос в котором проверяем наличие таблицы news в БД.Если такой таблицы нет - создаем,есть - удаляем.
    $query = "DROP TABLE IF EXISTS `news` ;
              CREATE TABLE IF NOT EXISTS `news` (
                                                `id` int(11) NOT NULL AUTO_INCREMENT,
                                                `title` varchar(255) NOT NULL,
                                                `dt` date NOT NULL,
                                                `body` text NOT NULL,
                                                PRIMARY KEY (`id`))";
    //Выполняем его
    $result = $db->query($query) or die ("Ошибка выполнения sql - запроса!");
    //Закрываем соединение с БД
    $db = null;