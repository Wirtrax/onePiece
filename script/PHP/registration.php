<?
session_start();
require_once('../../connection.php');
if(!empty($_POST['login']) and !empty($_POST['password'])){
	$login=$_POST['login'];
	$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nickname=$_POST['nickname'];
/*при регистрации прежде, чем добавлять данные, а БД необходимо проверить login на занятость*/
	$query="SELECT * FROM user WHERE login='$login'";
	$result=mysqli_query($link,$query);
	$user=mysqli_fetch_assoc($result);
/*при проверке правильного введенного пароля пароль сравнивают с его подтверждением при условии уникальности логина*/
	if(empty($user)){
		$query="INSERT INTO user SET login='$login', password='$password', nickname='$nickname'";
		mysqli_query($link, $query);
		$_SESSION['auth']=true;
		$id=mysqli_insert_id($link);
		$query = "SELECT * FROM user WHERE id='$id'";
		$result=mysqli_query($link, $query);
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		foreach ($data as $elem) {
		$_SESSION['nickname']=$elem['nickname'];
		$_SESSION['status']=$elem['status'];
		$_SESSION['id']=$elem['id'];
        $_SESSION['login']=$elem['login'];
		unset($_SESSION['messageerror']);
}

        header('Location:../../index.php');

}
	else{
		echo 'error';
    }

}
?>