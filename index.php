<?php
ob_start();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Рівень 1.</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Alegreya+Sans:500|Droid+Sans:400,700,400italic,700italic|Alegreya:700|Crimson+Text:400italic'>
    <link rel="stylesheet" href="css/style.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </head>
  <body>
    <header>
      <h1>The Blog</h1>
      <h2>of Hungry Junior</h2><hr />
    </header>
    <div id="buttons">
      <a href="http://localhost/news/index.php?action=add" id="addButton">Додати запис</a>

      <a href="http://localhost/news/" id="cancelButton">Відмова</a>
      <input type="submit" form="addNews" value="Зберегти" id="publishButton" />
    </div>
    <main>
      <!--Выводимый контент у нас зависит от того какой экшн(GET-параметр в ссылке)
      был передан(Всего 4: добавить/удалить/редактировать новость,список всех новостей) -->
      <? require_once "inc/routing.inc.php";?>
    </main>

  </body>
</html>