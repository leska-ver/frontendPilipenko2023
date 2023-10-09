<?

// 2. Подключение "Базы данных", тот же код. ПРОФИ КОД. Скопировали из файла api.php 53:13 
$dbname = 'ci54422_db';/*Из сайта имя "Базы данных MySQL"*/
$dbuser = 'ci54422_db';/*Из сайта имя "Базы данных MySQL"*/
$dbpass = '1GmHsZV';/*Пароль из сайта "Базы данных"*/
$pdo = new PDO("mysql:host=localhost;dbname=$dbname", $dbuser, $dbpass);
//54:28 Пишем наш SQL запрос SELECT. Позволит вывести заявки таблицы "Базы даных" в обратном порядке убывания числа.   
$stmt = $pdo->query('SELECT * FROM orders ORDER BY id DESC');

//54:11 Создаём запрос "Базы данных". В поисковике в браузере пишим php pdo select mysql -> заходим на сайт https://www.php.net/manual/en/pdo.query.php -> В разделе "Example #1 SQL with no placeholders can be executed using PDO::query()" берём код foreach (); и вставляем в таблицу. Для красоты.
?>
<!--55:38 Выведим в красивой таблице. 58:26 удалил
<table>
  <tr>
    <th>ID</th>
    <th>Имя</th>
    <th>Телефон</th>
    <th>E-mail</th>
  </tr> --
    !-- <--?//Цикл, он будет перебирать записи которые выведены при помощи вот этого запроса к "Базе данных". То есть он будет выводить сначала последнее предпоследнюю и так далее. 
    foreach ($stmt as $row) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['phone'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '</tr>';
    }
  ?-->
<!-- </table>   -->
<!-- Пишим таблицу через html код 58:26 Она выходит по акуратнее -->
<!DOCTYPE html>
<html>
<!--Результат таблицы http://warehouse2022.tmweb.ru/list.php -->
<head>
  <title>Список заявок</title>
  <style>
    table {
      border: 1px solid darkgray;
      border-collapse: collapse;
    }

    th {
      background-color: lightblue;
    }

    th,
    td {
      border: 1px solid darkgray;
      padding: 5px;
    }
  </style>
</head>

<body>
  <table>
    <tr>
      <th>ID</th>
      <th>Имя</th>
      <th>Телефон</th>
      <th>E-mail</th>
    </tr>
    <?
    foreach ($stmt as $row) {
      echo '<tr>';
      echo '<td>' . $row['id'] . '</td>';
      echo '<td>' . $row['name'] . '</td>';
      echo '<td>' . $row['phone'] . '</td>';
      echo '<td>' . $row['email'] . '</td>';
      echo '</tr>';
    }
    ?>
  </table>
</body>

</html>