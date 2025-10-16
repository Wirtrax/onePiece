<?php
session_start();
require_once('../../connection.php');
header("location:../../pages/selectheroadmin.php");
$nameHeroAdd = $_POST['nameHeroAdd'];
$nicknameHeroAdd = $_POST['nicknameHeroAdd'];
$skillHeroAdd = $_POST['skillHeroAdd'];
$rewardHeroAdd = $_POST['rewardHeroAdd'];
$fruitSelectHeroAdd = $_POST['fruitSelectHeroAdd'];
$descriptionHeroAdd = $_POST['descriptionHeroAdd'];
$photoOnCardHeroAdd = $_FILES['photoOnCardHeroAdd'];
$mainPhotoHeroAdd = $_FILES['mainPhotoHeroAdd'];
$homelandSelectHeroAdd = $_POST['homelandSelectHeroAdd'];
$postSelectHeroAdd = $_POST['postSelectHeroAdd'];
$raceSelectHeroAdd = $_POST['raceSelectHeroAdd'];
$pirateteamSelectHeroAdd = $_POST['pirateteamSelectHeroAdd'];

if (!empty($nameHeroAdd) && !empty($nicknameHeroAdd) && !empty($skillHeroAdd) && !empty($rewardHeroAdd) && !empty($fruitSelectHeroAdd) && !empty($descriptionHeroAdd) && !empty($photoOnCardHeroAdd) && !empty($mainPhotoHeroAdd) && !empty($homelandSelectHeroAdd)) {
    $query = "SELECT id FROM homeland WHERE kingdom = '$homelandSelectHeroAdd'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $homelandId = $row['id'];

    $query = "SELECT id FROM fruit WHERE name = '$fruitSelectHeroAdd'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $fruitId = $row['id'];

    $query = "SELECT id FROM post WHERE post = '$postSelectHeroAdd'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $postId = $row['id'];

    $query = "SELECT id FROM race WHERE raceName = '$raceSelectHeroAdd'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $raceId = $row['id'];

    $query = "SELECT id FROM pirateteam WHERE teamName = '$pirateteamSelectHeroAdd'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $pirateteamId = $row['id'];

    //card_photoAdd_path
    $current_card_photoAdd_path = $photoOnCardHeroAdd['tmp_name'];
    $filename_cardPhotoAdd = $photoOnCardHeroAdd['name'];

    $ext_cardPhotoAdd = pathinfo($filename_cardPhotoAdd, PATHINFO_EXTENSION);
    $filename_cardPhotoAdd = uniqid();
    $ft = md5($filename_cardPhotoAdd);

    $new_card_photo_path = '../../entities/upload/' . $ft . '.' . $ext_cardPhotoAdd;
    move_uploaded_file($current_card_photoAdd_path, __DIR__ . '/' . $new_card_photo_path);

    //main_photoAdd_path
    $current_main_photoAdd_path = $mainPhotoHeroAdd['tmp_name'];
    $filename_mainPhotoAdd = $mainPhotoHeroAdd['name'];

    $ext_mainPhotoAdd = pathinfo($filename_mainPhotoAdd, PATHINFO_EXTENSION);
    $filename_mainPhotoAdd = uniqid();
    $fm = md5($filename_mainPhotoAdd);

    $new_main_photo_path = '../../entities/upload/' . $fm . '.' . $ext_mainPhotoAdd ;
    move_uploaded_file($current_main_photoAdd_path, __DIR__ . '/' . $new_main_photo_path);

    $query = "SELECT devilFruitId FROM hero WHERE devilFruitId='$fruitId'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $chekFruit = $row['id'];
    
    $query = "INSERT INTO hero (id, devilFruitId, name, discription, skill, nickname, reward, homelandId, postId, raceId, teamId, photoOnCard, mainPhoto) VALUES (NULL, '$fruitId', '$nameHeroAdd', '$descriptionHeroAdd', '$skillHeroAdd', '$nicknameHeroAdd', '$rewardHeroAdd', '$homelandId', '$postId', '$raceId', '$pirateteamId', '$new_card_photo_path', '$new_main_photo_path')";
    $result = mysqli_query($link, $query);
    

}

?>