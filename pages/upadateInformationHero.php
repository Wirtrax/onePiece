<? session_start();

require_once('../connection.php');
$hero_id=$_GET['id'];
$_SESSION['hero_id']=$hero_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../entities/img/home/icon/logo1.ico">
    
    <link rel="stylesheet" href="../CSS/selectHeroAdmin.css">
    <style>
        *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;

        }
        @font-face {
            font-family: lexend exa_zz;
            src: url(../entities/fonts/lexa/LexendExa-VariableFont_wght.ttf);
   
        }
        body{
            background-color:rgba(32, 32, 32, 1);
            color: white;
            font-family: lexend exa_zz, sans-serif;
        }
        :root{
            --index:calc(1vh+1vw);
        }
        .added__form{
            color: white;
            font-size: calc(var(--index)*1.5);
        }
    </style>
</head>
<body>
    

<div class='popup-bg' style="display:block;">
        <div class="added">
            <form action="../script/PHP/updateHero.php" class="added__form" method="post" enctype="multipart/form-data">
                <a href="selectHeroAdmin.php"><span class='popup__pd close-popup'>
                    <span class='close-popup-x'></span>
                </span></a>
                <label for="added__form">Редактировать данные </label>
                <div class="add__input-cont">
                    <?
                        $checkSelect="SELECT * FROM hero WHERE id = $hero_id";
                        $checkResult = mysqli_query($link, $checkSelect);
                        $checkData = mysqli_fetch_assoc($checkResult);
                            
                        $checkname = $checkData['name'];
                        $checknickname = $checkData['nickname'];
                        $checkskill = $checkData['skill'];
                        $checkreward = $checkData['reward'];
                        $checkdiscription = $checkData['discription'];

                    ?>
                    <input class='popup__input' type='text' placeholder='name' name='nameHeroUpdt' value="<?echo $checkname ;?>" >
                    <input class='popup__input' type='text' placeholder='nickname' name='nicknameHeroUpdt' value="<?echo $checknickname ;?>" >
                    <input class='popup__input' type='text' placeholder='skill' name='skillHeroUpdt' value="<?echo $checkskill ;?>" >
                    <input class='popup__input' type='text' placeholder='reward' name='rewardHeroUpdt' value="<?echo $checkreward ;?>" >
                    <textarea class="popup__input inputeditsize area" type="text" placeholder="description" name="descriptionHeroUpdt" ><?echo $checkdiscription ;?></textarea>
                    <input class="popup__input inputeditsize" type="file"  name="photoOnCardHeroUpdt" title="фото на карточке" >
                    <input class="popup__input inputeditsize" type="file"  name="mainPhotoHeroUpdt" title="основное фото" >
                    <select name="fruitSelectHeroUpdt" class="popup__input inputeditsize"  id="fruit">
                        <?php
                        
                        $checkfruit = $checkData['devilFruitId'];
                        $checkhomeLand = $checkData['homeLandId'];
                        $checkpost = $checkData['postId'];
                        $checkrace = $checkData['raceId'];
                        $checkteam = $checkData['teamId'];


                        $query = "SELECT name, id FROM fruit";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['id'] == $checkfruit) ? 'selected' : '';
                            echo "<option value='{$row['name']}' {$selected}>";
                            echo "{$row['name']}</option>";
                        }
                        ?> 
                    </select>
                     <select name="homelandSelectHeroUpdt" class="popup__input inputeditsize"  id="homeland">
                        <?php
                        
                        $query = "SELECT kingdom, id FROM homeland";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row['id'] == $checkhomeLand ) ? 'selected' : '';
                            echo "<option value='{$row['kingdom']}' {$selected}>";
                            echo "{$row['kingdom']}</option>";                     }
                        ?>
                    </select>

                    <select name="postSelectHeroUpdt" class="popup__input inputeditsize"  id="post">
                    
                    <?php
                    
                    $query = "SELECT post, id FROM post";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $checkpost) ? 'selected' : '';
                            echo "<option value='{$row['post']}' {$selected}>";
                            echo "{$row['post']}</option>";           }
                    ?>
                </select>

                <select name="raceSelectHeroUpdt" class="popup__input inputeditsize"  id="race">
                
                    
                    <?php
                    
                    $query = "SELECT raceName, id FROM race";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $checkrace) ? 'selected' : '';
                            echo "<option value='{$row['raceName']}' {$selected}>";
                            echo "{$row['raceName']}</option>";                   }
                    ?>
                </select>
                
                <select name="pirateteamSelectHeroUpdt" class="popup__input inputeditsize"  id="pirateteam">
                    <?php
                    
                    $query = "SELECT teamName, id FROM pirateteam";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id'] == $checkteam) ? 'selected' : '';
                            echo "<option value='{$row['teamName']}' {$selected}>";
                            echo "{$row['teamName']}</option>";                   }
                    ?>
                </select>


                </div>
                <input class='popup__input popup__btn' type='submit' value='добавить' >
            </form>
        </div>
    </div>
</body>
</html>