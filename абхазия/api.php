<?

  // $count = 40;
  //13:00 _GET - это запрос данных. В браузере пишим для примера http://warehouse2022.tmweb.ru/api.php?value=50
  /*$count = $_GET['value'];

  if ($count == 50) {
    // echo 'Значение верно';
    //тоже самое
    echo '<h1>Value is valid</h1>';
  } else {
    echo '<h1>Value is invalid</h1>';
  }*/

  /*/14:47 Вывод двух значений. После вывода пишим в браузере http://warehouse2022.tmweb.ru/api.php?count=50&name=Василий
  $count = $_GET['count'];
  $name = $_GET['name'];

  echo '<h1>Количество: ' . $count . '</h1>';
  echo '<h1>Имя: ' . $name . '</h1>';*/

  /*/37:19 перенесли в $stmt->bindValue() 45:43
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  echo '<h1>Имя: ' . $name . '</h1>';
  echo '<h1>Телефон: ' . $phone . '</h1>';
  echo '<h1>Email: ' . $email . '</h1>';*/

  //Создаём Базу данных MySQL на хосте в резделе "Базы данных"
  //40:00 На сайте "Базы данных" - https://vh320.timeweb.ru/pma/?&db=ci54422_db создалим таблицу. -> Назовём её orders

  /*/48:20 Ставим вывод для браузера в девтульсе в разделе Preview. Удалил 53:07
  ini_set('display_errors', 1);
  error_reporting(E_ALL);*/

  //41:48 Подключение "Базы данных". В поисковике в браузере пишим php pdo mysql -> заходим на сайт https://www.php.net/manual/ru/ref.pdo-mysql.php -> В разделе "Пример #1 Установка небуферизованного режима MySQL" берём код $pdo = new PDO("mysql:host=localhost;dbname=world", 'my_user', 'my_password'); и вставляем суда.

  // $pdo = new PDO("mysql:host=localhost;dbname=world", 'my_user', 'my_password'); 
  /*/1.Исправляем код на своё ci54422_db 1GmHsZV 42:15
  $pdo = new PDO("mysql:host=localhost;dbname=ci54422_db", 'ci54422_db', '1GmHsZV');*/

  // 2. Подключение "Базы данных", тот же код. ПРОФИ КОД. Скопировали и закинули в файл list.php 53:13 
  $dbname = 'ci54422_db';/*Из сайта имя "Базы данных MySQL"*/
  $dbuser = 'ci54422_db';/*Из сайта имя "Базы данных MySQL"*/
  $dbpass = '1GmHsZV';/*Пароль из сайта "Базы данных"*/
  $pdo = new PDO("mysql:host=localhost;dbname=$dbname", $dbuser, $dbpass);
  //Делаем запрос. В том же сайте, в разделе "//initilise the statement" копируем $stmt = $dbh->prepare("удаляем внутри скобки содержимое"). Вместо $dbh пишим своё название переменной $pdo. В ставляем внутр скобок запрос INSERT INTO - хоста название базы orders и её содержимое - в конце пишим VALUES() и внутри через :пишим содержимое 
  $stmt = $pdo->prepare('INSERT INTO orders(name, phone, email) VALUES(:name, :phone, :email)');
  //В том же сайте, в разделе "//initilise the statement" копируем $stmt->bindValue(1, $id); и в скобках указываем свои переменные.
  $stmt->bindValue(':name', $_POST['name']);
  $stmt->bindValue(':phone', $_POST['phone']);
  $stmt->bindValue(':email', $_POST['email']);

  /*/Выполняем запрос
  $stmt->execute();*/

  // Проверим сохраняются у нас данные на сервере 46:36
  if ($stmt->execute()) {
    echo '1';
  } /*else {
    echo '0';
  };*/