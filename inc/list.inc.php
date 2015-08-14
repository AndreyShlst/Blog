<?php
//Зачитываем необходимые данные из файла конфигов.
$config = parse_ini_file("config.inc.ini");
//Соединяемся с БД
$db = new PDO($config["db.conn"],$config["db.user"],$config["db.password"]);
//Формируем необходимый запрос
$query = "SELECT  *
          FROM news";
//Выполняем его
$result = $db->query($query) or die ("Ошибка выполнения sql - запроса!");
//Закрываем соединение с БД
$db = null;

//Вывод данных
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo <<<"OUT"
        <article>
            <header>
                <aside>
                    <p>Дата: $row[dt]</p>
                </aside>
                <h1>$row[title]</h1>
            </header>
                <p>$row[body]</p>
            <a class="links" href="http://localhost/news/index.php?action=edit&id=$row[id]">Редагувати</a>
            <a class="links" href="#delete-$row[id]">Видалити </a>

            <!--Модальное окно-->

            <a href="#x-$row[id]" class="overlay" id="delete-$row[id]"></a>
            <div class="popup">
              <div id = "deleteMessage">
                Ви,справді хочете видалити цей запис?
                <div id = title_delete_note>
                    "$row[title]"
                </div>
              </div>
              <a class="close"title="Закрыть" href="http://localhost/news/"></a>
              <a href="http://localhost/news/index.php?action=delete&id=$row[id]" id="deleteButton">Так, я впевнений у своїх діях</a>
            </div>
        </article>
OUT;
}