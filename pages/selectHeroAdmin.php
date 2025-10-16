<? session_start();

require_once('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../entities/img/home/icon/logo1.ico">
    <link rel="stylesheet" href="../CSS/selectHeroStyle.css">
    <link rel="stylesheet" href="../CSS/selectHeroAdmin.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <title>Piece of ship</title>

    <script src="../script/JS/jquery-3.7.1.js" defer></script>
    <script src="../script/JS/popupHerroAdd.js" defer></script>
    <script src="../script/JS/burger.js" defer></script>
    <script src="../script/JS/ajax.js" defer></script>
    
    <style>
        .kodticcck{
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <img src="../entities/img/page2-selectHero/selectHeroBgImage.png" alt="" class="bgimage">
    <!-- navigation -->   

    <?require_once('header.php');?>
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
    <span class="kostik" style="display: flex; justify-content: center;
            align-items: center; flex-wrap:wrap;">
    <div class="conteinerCards" id="cardsContainer">
        <?
       $hero=mysqli_query($link, "SELECT * FROM hero");
       for ($data = []; $row = mysqli_fetch_assoc($hero); $data[] = $row);
       foreach ($data as $elem) {
        ?>
        <div class="card" style="background-image:url(../entities/img/page2-selectHero/heroImage/bgLogoSelectHero.png);">
            <a href="<?echo "upadateInformationHero.php?id={$elem['id']}"?>">
                <span class="update" style="z-index: 10;">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" >
                        <path d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17V17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </a>
            <a href="<?echo "../script/php/re.php?id={$elem['id']}"?>">
                <span class="delete" style="z-index: 10;">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" >
                        <path d="M10 11V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 11V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 7H20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </a>
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
    <div class="conteinerCards" style="margin:0px; margin-top:10px;" >
        <div class="card" >
            <div class="add">
                <span class="circle"><span class="plus"></span></span>
            </div>
        </div>
    </div>
</span>
            <!--add new hero-->
    <?require_once('selectHeroAdd.php');?>
 

        </div>
        
</body> 
</html>