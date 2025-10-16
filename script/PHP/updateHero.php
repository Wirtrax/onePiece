<?php
session_start();

if($_SESSION['status']==2){
    header('Location:../../pages/selectHeroAdmin.php');
}
else{
    header('Location:../../index.php');
}

require_once('../../connection.php');

if (!is_dir('../../entities/upload')) {
    mkdir('../../entities/upload', 0777, true);
}

$hero_id=$_SESSION['hero_id'];

$nameHeroUpdt = $_POST['nameHeroUpdt'];
$nicknameHeroUpdt = $_POST['nicknameHeroUpdt'];
$skillHeroUpdt = $_POST['skillHeroUpdt'];
$rewardHeroUpdt = $_POST['rewardHeroUpdt'];
$fruitSelectHeroUpdt = $_POST['fruitSelectHeroUpdt'];
$descriptionHeroUpdt = $_POST['descriptionHeroUpdt'];
$homelandSelectHeroUpdt = $_POST['homelandSelectHeroUpdt'];
$postSelectHeroUpdt = $_POST['postSelectHeroUpdt'];
$raceSelectHeroUpdt = $_POST['raceSelectHeroUpdt'];
$pirateteamSelectHeroUpdt = $_POST['pirateteamSelectHeroUpdt'];


if (!empty($descriptionHeroUpdt)) {
    $query = "UPDATE hero SET discription = '$descriptionHeroUpdt' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
if (!empty($nameHeroUpdt)) {
    $query = "UPDATE hero SET name = '$nameHeroUpdt' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
if (!empty($skillHeroUpdt )) {
    $query = "UPDATE hero SET skill= '$skillHeroUpdt' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
if (!empty($rewardHeroUpdt)) {
    $query = "UPDATE hero SET reward = '$rewardHeroUpdt' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
if (!empty($nicknameHeroUpdt)) {
    $query = "UPDATE hero SET nickname = '$nicknameHeroUpdt' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
if (!empty($_FILES['photoOnCardHeroUpdt']) && $_FILES['photoOnCardHeroUpdt']['error'] === UPLOAD_ERR_OK) {
    $photoOnCardHeroUpdt = $_FILES['photoOnCardHeroUpdt'];

    $current_card_photoUpdt_path = $photoOnCardHeroUpdt['tmp_name'];
    $filename_cardPhotoUpdt = $photoOnCardHeroUpdt['name'];

    $ext_cardPhotoUpdt = pathinfo($filename_cardPhotoUpdt, PATHINFO_EXTENSION);
    $filename_cardPhotoUpdt = uniqid();
    $ft = md5($filename_cardPhotoUpdt);

    $new_card_photo_path = '../../entities/upload/' . $ft . '.' . $ext_cardPhotoUpdt;
    move_uploaded_file($current_card_photoUpdt_path, __DIR__ . '/' . $new_card_photo_path);

    $query = "UPDATE hero SET photoOnCard = '$new_card_photo_path' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}

if (!empty($_FILES['mainPhotoHeroUpdt']) && $_FILES['photoOnCardHeroUpdt']['error'] === UPLOAD_ERR_OK) {

    $mainPhotoHeroUpdt = $_FILES['mainPhotoHeroUpdt'];

    $current_main_photoUpdt_path = $mainPhotoHeroUpdt['tmp_name'];
    $filename_mainPhotoUpdt = $mainPhotoHeroUpdt['name'];

    $ext_mainPhotoUpdt = pathinfo($filename_mainPhotoUpdt, PATHINFO_EXTENSION);
    $filename_mainPhotoUpdt = uniqid();
    $fm = md5($filename_mainPhotoUpdt);

    $new_main_photo_path = '../../entities/upload/' . $fm . '.' . $ext_mainPhotoUpdt ;
    move_uploaded_file($current_main_photoUpdt_path, __DIR__ . '/' . $new_main_photo_path);

    $query = "UPDATE hero SET mainPhoto = '$new_main_photo_path' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}

if (!empty($fruitSelectHeroUpdt)) {
    $query = "SELECT id FROM fruit WHERE name = '$fruitSelectHeroUpdt'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $fruitId = $row['id'];
    $query = "UPDATE hero SET devilFruitId = '$fruitId' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}

if (!empty($homelandSelectHeroUpdt)) {
    $query = "SELECT id FROM homeland WHERE kingdom = '$homelandSelectHeroUpdt'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $homelandId = $row['id'];
    $query = "UPDATE hero SET homeLandId = '$homelandId' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}

if (!empty($postSelectHeroUpdt )) {
    $query = "SELECT id FROM post WHERE post = '$postSelectHeroUpdt'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $postId = $row['id'];
    $query = "UPDATE hero SET postId = '$postId' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}

if (!empty($raceSelectHeroUpdt)) {
    $query = "SELECT id FROM race WHERE raceName = '$raceSelectHeroUpdt'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $raceId = $row['id'];
    $query = "UPDATE hero SET raceId = '$raceId' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
if (!empty($pirateteamSelectHeroUpdt)) {
    $query = "SELECT id FROM pirateteam WHERE teamName = '$pirateteamSelectHeroUpdt'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result); 
    $pirateteamId = $row['id'];
    $query = "UPDATE hero SET teamId = '$pirateteamId' WHERE id='$hero_id'";
    $result = mysqli_query($link, $query);
}
?>