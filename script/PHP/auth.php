<?php
session_start();
header('Location:../../index.php');
require_once('../../connection.php');
$_SESSION['status']=0;
if(!empty($_POST['password']) and !empty($_POST['login'])){
$login=$_POST['login'];
$password=$_POST['password'];
$query="SELECT * FROM user WHERE login='$login'";
$result=mysqli_query($link, $query);
$user=mysqli_fetch_assoc($result);
if(!empty($user)){
	$_SESSION['id'] = $user['id']; // записываем id пользователя, полученный 
	$_SESSION['status']=$user['status'];
	$_SESSION['nickname']=$user['nickname'];
	$hash=$user['password'];
	if(password_verify($_POST['password'],$hash)==true){
    $_SESSION['auth'] = true; // делаем пометку об авторизации
	if($_SESSION['status']==2){
		header('Location:../../admin.php');
		unset($_SESSION['messageerror']);
	}
	else{
		
	}
	
	}
	else{
		
		$_SESSION['messageerror']='данные введены не коректно';
	}
}
else{
	
	$_SESSION['messageerror']='данные введены не коректно';
    
}
}
?>