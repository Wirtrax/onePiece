<? session_start();
require_once('../connection.php');
if($_SESSION['status']==2){
    header('Location:SelectHeroadmin.php');
}
else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../entities/img/home/icon/logo1.ico">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/selectHeroStyle.css">
    <link rel="stylesheet" href="../CSS/selectHeroAdmin.css">
    <title>Piece of ship</title>

    <script src="../script/JS/jquery-3.7.1.js" defer></script>
    <script src="../script/JS/popupHerroAdd.js" defer></script>
    <script src="../script/JS/burger.js" defer></script>
    <script src="../script/JS/ajax.js" defer></script>
</head>
<body>
    <img src="../entities/img/page2-selectHero/selectHeroBgImage.png" alt="" class="bgimage">
    <!-- navigation -->   
    <?require_once('header.php')?>

    <!--a block with data sorting-->
    <div class="select">
        <div class="selector">
            <div class="leftSelector">
                <img src="../entities/img/page2-selectHero/leftSelectorIcon.png" alt="" class="leftSelector__icon">
                <form action="#"  method="get" class="leftSelector__form">
                    <input type="text" placeholder="ИСКАТЬ ПЕРСОНАЖА" value="" name="cardSearch" id="cardSearch">
                </form>
            </div>
            <div class="rightSelector">
                <div class="rightSelector__icon"></div>
                <div class="rightSelector_input">СОРТИРОВАТЬ ПО:</div>
                <form action="#" method="get" class="rightSelector__form">
                    <select class="rightSelector__form-item">
                        <option value="1" selected>щт бэ-иэ до пи-яу</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <!--character cards-->
    <div class="conteinerCards" id="cardsContainer">
        <?
       $hero=mysqli_query($link, "SELECT * FROM hero");
       for ($data = []; $row = mysqli_fetch_assoc($hero); $data[] = $row);
       foreach ($data as $elem) {
        ?>
        <div class="card" style="background-image:url(../entities/img/page2-selectHero/heroImage/bgLogoSelectHero.png);">
            <img src="<?echo "{$elem['photoOnCard']}"?>" alt="" class="card-photoHero">
            <div class="card-hoverInformation">
                <!--<div class="card-hoverInformation__name">Bruk</div>-->
                <a href="<?echo "hero.php?id={$elem['id']}"?>" class="card-hoverInformation__link"><span><?echo "{$elem['name']}"?></span></a>
            </div>
        </div>
        <?
       }
       ?>
    </div>

    
</body>
</html>