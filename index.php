<? session_start();

require_once('connection.php');

if($_SESSION['status']==2){
    header('Location:admin.php');
}
else{
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="entities/img/home/icon/logo1.ico">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/header.css">

    <script src="script/JS/jquery-3.7.1.js" defer></script>

    <script src="script/JS/gsap/gsap.min.js" defer></script>
    <script src="script/JS/gsap/ScrollTrigger.min.js" defer></script>
    <script src="script/JS/gsap/ScrollSmoother.min.js" defer></script>

    <script src="script/JS/app.js" defer></script>
    <script src="script/JS/burger.js" defer></script>
    <script src="script/JS/popup.js" defer></script>

    <title>Piece of ship</title>
</head>
<body>
<!-- jsPlugin -->   
    <div class="wrapper">
        <div class="content">

<!-- navigation  -->  
<?  
    require_once('pages/header.php');
?>
<!-- mainScreen -->        
            <header class="main-header"> 
                <div class="layers">
      <!--          <div class="layer__header">
                    <div class="layers__caption">123e123</div>
                </div>
        -->
                <div class="layer layer__base"  style="background-image: url(entities/img/page1-lore/main/dase.png);"></div>
                <div class="layer layer__front" style="background-image: url(entities/img/page1-lore/main/front4.png);"></div>
                </div>
            </header>


            <div class="bgcolor">



<!-- a block with little information about arches --> 
       <?
       $lore=mysqli_query($link, "SELECT * FROM ark");
       for ($data = []; $row = mysqli_fetch_assoc($lore); $data[] = $row);
       foreach ($data as $elem) {
        ?>
                <div class="block">
                    <div class="titile-history">
                        <div class="titile-history__line left"> </div> 
                        <img src="<?=$elem['titlePhoto']?>" class="titile-history__image">
                         <div class="titile-history__line right"></div> 
                    </div>
                    <div class="information-block">
                        <div class="prologue">
                            <div class="information-block__text"><<?=$elem['discription']?></div>
                            <a href="#" class="btn__history"><span>ПОДРОБНЕЕ</span>  <svg class="svg__history"  viewBox="0 0 24 24" fill="none" >
<path d="M16.3153 16.6681C15.9247 17.0587 15.9247 17.6918 16.3153 18.0824C16.7058 18.4729 17.339 18.4729 17.7295 18.0824L22.3951 13.4168C23.1761 12.6357 23.1761 11.3694 22.3951 10.5883L17.7266 5.9199C17.3361 5.52938 16.703 5.52938 16.3124 5.91991C15.9219 6.31043 15.9219 6.9436 16.3124 7.33412L19.9785 11.0002L2 11.0002C1.44772 11.0002 1 11.4479 1 12.0002C1 12.5524 1.44772 13.0002 2 13.0002L19.9832 13.0002L16.3153 16.6681Z" fill="#E7AB58"/>
</svg></a>
                        </div>
                        <div class="image__history"><img src="<?=$elem['photo']?>" alt="1"></div>
                    </div>
                </div>
        <?
       }
       ?>
            </div>
<!--footer -->     
            <footer class="footer">
                <p class="footer__p"></p>
            </footer>
        </div>
    </div>
    
<!--popup -reg -->  

<? 


if(isset($_SESSION['auth'])){
    echo"
    <div class='popup-bg'>
        <div class='popup'>
            <form action='script/PHP/logout.php' class='registration' method='post'>
                <span class='popup__pd close-popup'>
                    <span class='close-popup-x'></span>
                </span>
                <label for='registration'>{$_SESSION['nickname']}</label>
                <input class='popup__input popup__btn' type='submit' value='выйти' >
            </form>
            <br>
        </div>
    </div>

";
}

 else{
        echo"
    <div class='popup-bg'>
        <div class='popup'>
            <form action='script/PHP/registration.php' class='registration' method='post'>
                <span class='popup__pd close-popup'>
                    <span class='close-popup-x'></span>
                </span>
                <label for='registration'>Регистрация</label>
                <input class='popup__input' type='text' placeholder='логин' id='registration' name='login' required>
                <input class='popup__input' type='password' placeholder='пароль' name='password' required>
                <input class='popup__input' type='text' placeholder='имя пользователя' name='nickname' required>
                <input class='popup__input popup__btn' type='submit' value='зарегистрироваться'>
            </form>
            <br>
            <div class='auth-text'>Если вы уже зарегистрированы, то <a href='' class='auth-link'>Войдите</a></div>
        </div>
    </div>

    <div class='popup-bg-auth'>
        <div class='popup'>
            <form action='script/PHP/auth.php' class='auth' method='post'>
                <span class='popup__pd close-popup'>
                    <span class='close-popup-x'></span>
                </span>
                <label for='auth'>Авторизация</label>
                <input class='popup__input' type='text' placeholder='логин' name='login' required>
                <input class='popup__input' type='password' placeholder='пароль' name='password' required>
                <input class='popup__input popup__btn' type='submit' value='войти' >
                <div>{$_SESSION['messageerror']}</div>
            </form>
        </div>
    </div>
    ";
}


?>

</body>
</html>
