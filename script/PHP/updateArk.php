<?
session_start();
if($_SESSION['status']==2){
    header('Location:../../admin.php');
}
else{
    header('Location:../../index.php');
}
require_once('../../connection.php');

if (!is_dir('../../entities/upload')) {
    mkdir('../../entities/upload', 0777, true);
}

$nameArk = $_POST['nameArk'];

if (!empty($_FILES['titlePhoto'])) {
    $titlePhoto = $_FILES['titlePhoto'];
    $current_path = $titlePhoto['tmp_name'];
    $filename = $titlePhoto['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = uniqid();
    $ft = md5($filename);
    $new_title_photo_path = '../../entities/upload/' . $ft . '.' . $ext;
    move_uploaded_file($current_path, __DIR__ . '/' . $new_title_photo_path);
    $query = "UPDATE ark SET titlePhoto = '$new_title_photo_path' WHERE nameArk = '$nameArk'";
    $result = mysqli_query($link, $query);
}

if (!empty($_FILES['mainPhoto'])) {
    $mainPhoto = $_FILES['mainPhoto'];
    $current_path = $mainPhoto['tmp_name'];
    $filename = $mainPhoto['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = uniqid();
    $fm = md5($filename);
    $new_main_photo_path = '../../entities/upload/' . $fm . '.' . $ext;
    move_uploaded_file($current_path, __DIR__ . '/' . $new_main_photo_path);
    $query = "UPDATE ark SET Photo = '$new_main_photo_path' WHERE nameArk = '$nameArk'";
    $result = mysqli_query($link, $query);
}

if (!empty($_POST['description'])) {
    $description = $_POST['description'];
    $query = "UPDATE ark SET discription = '$description' WHERE nameArk = '$nameArk'";
    $result = mysqli_query($link, $query);
}

?>