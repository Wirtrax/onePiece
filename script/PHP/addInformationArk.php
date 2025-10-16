<?php
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
$nameArkAdd=$_POST['nameArkAdd'];
$discriptionAdd=$_POST['descriptionAdd'];
$titlePhotoAdd = $_FILES['titlePhotoAdd'];
$mainPhotoAdd = $_FILES['mainPhotoAdd'];

if (!empty($nameArkAdd) || !empty($discriptionAdd) || !empty($titlePhotoAdd) || !empty($mainPhotoAdd)) {
//title_photoAdd_path
    $current_title_photoAdd_path = $titlePhotoAdd['tmp_name'];
    $filename_titlePhotoAdd = $titlePhotoAdd['name'];

    $ext_titlePhotoAdd = pathinfo($filename_titlePhotoAdd, PATHINFO_EXTENSION);
    $filename_titlePhotoAdd = uniqid();
    $ft = md5($filename_titlePhotoAdd);

    $new_title_photo_path = '../../entities/upload/' . $ft . '.' . $ext_titlePhotoAdd;
    move_uploaded_file($current_title_photoAdd_path, __DIR__ . '/' . $new_title_photo_path);


//main_photoAdd_path

    $current_main_photoAdd_path = $mainPhotoAdd['tmp_name'];
    $filename_mainPhotoAdd = $mainPhotoAdd['name'];

    $ext_mainPhotoAdd = pathinfo($filename_mainPhotoAdd, PATHINFO_EXTENSION);
    $filename_mainPhotoAdd = uniqid();
    $fm = md5($filename_mainPhotoAdd);

    $new_main_photo_path = '../../entities/upload/' . $fm . '.' . $ext_mainPhotoAdd ;
    move_uploaded_file($current_main_photoAdd_path, __DIR__ . '/' . $new_main_photo_path);

    $query = "INSERT INTO `ark` (`id`, `nameArk`, `discription`, `titlePhoto`, `Photo`) VALUES (NULL, '$nameArkAdd', '$discriptionAdd', '$new_title_photo_path', '$new_main_photo_path')";
    $result = mysqli_query($link, $query);
}
?>