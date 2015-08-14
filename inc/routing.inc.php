<?php
//Скрипт - маршрутизатор
//В каждой ссылке у нас есть специальный GET-параметр action,который отвечает за выполняемое действие и контент на странице.
$action = (strip_tags(trim($_GET['action'])));//Получаем action

switch($action){
    case 'add'://Добавить новость
        require "inc/add.inc.php";
        break;
    case 'edit'://Редактировать новость
        require "inc/edit.inc.php";
        break;
    case 'delete'://Удалить новость
        require "inc/delete.inc.php";
        break;
    default:require "inc/list.inc.php";//По-умолчанию отображаем список всех новостей
}