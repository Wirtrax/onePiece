<?
$host = '127.0.0.1'; //имя хоста, на лок. компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = 'root'; //пароль, по умолчанию пустой
$db_name = 'onepiece'; //имя базы данных
$link = mysqli_connect($host, $user, $password, $db_name);
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}


?>