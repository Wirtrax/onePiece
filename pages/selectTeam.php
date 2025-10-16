<? session_start();
require_once('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../entities/img/home/icon/logo1.ico">
    <link rel="stylesheet" href="../CSS/selectTeamStyle.css">
    <title>Piece of ship</title>
    <script src="script/JS/gsap/gsap.min.js" defer></script>
    <script src="script/JS/gsap/ScrollTrigger.min.js" defer></script>
    <script src="script/JS/gsap/ScrollSmoother.min.js" defer></script>

    <script src="../script/JS/selectTeam.js" defer></script>
</head>
<body>

     <!-- navigation -->   

     <?require_once('header.php');?>
    <!-- hero section -->  
    <header class="hero-section">
        <img src="../entities/img/page3-selectTeam/main-photo.png" alt="" class="hero">
        <div class="container">
            <div class="main-headr">
                <h2 class="main-title">КОМАНДЫ</h2>
            </div>
        </div>
    </header>
    <!-- select Team block -->  
    <div class="container-main">
        <div class="main-gallery">
            <div class="gallery__left">
                    <h1 class="gallery__left-h1">ПИРАТЫ</h1>
                <div>
                    <h2 class="gallery__left-h2">СОЛОМЕННОЙ ШЛЯПЫ</h2>
                    <div class="gallery__border">
                        <a href="#" class="gallery__left-a">УЗНАЙТЕ БОЛЬШЕ О ЛЮБИМОЙ КОМАНДЕ</a>
                    </div>
                </div>
            </div>
            <div class="gallery__right">
                <img src="../entities/img/page3-selectTeam/team/mugivari.png" alt="" class="gallery__right-photo">
            </div>
        </div>
    </div>
</body>
</html>