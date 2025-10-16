<? session_start();

require_once('connection.php');
if($_SESSION['status']==1 || !isset($_SESSION['status'])){
    header('Location:index.php');
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
    <link rel="stylesheet" href="CSS/admin.css">

    <script src="script/JS/jquery-3.7.1.js" defer></script>

    <script src="script/JS/gsap/gsap.min.js" defer></script>
    <script src="script/JS/gsap/ScrollTrigger.min.js" defer></script>
    <script src="script/JS/gsap/ScrollSmoother.min.js" defer></script>

    <script src="script/JS/popup.js" defer></script>
    <script src="script/JS/app.js" defer></script>
    <script src="script/JS/burger.js" defer></script>
    

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
       $i=1;
       $lore=mysqli_query($link, "SELECT * FROM ark");
       for ($data = []; $row = mysqli_fetch_assoc($lore); $data[] = $row);
       foreach ($data as $elem) {
        ?>
                <div class="block">
                <div class="admin__edit">
                        <div class="edit__text">РЕДАКТИРОВАТЬ
                            <svg class="edit__svg" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffff"/>
                            </svg>
                        </div>
                    </div>
                    <div class="titile-history">
                        <div class="titile-history__line left"> </div> 
                        <img src="<?=$elem['titlePhoto']?>" class="titile-history__image">
                         <div class="titile-history__line right"></div> 
                    </div>
                    <div class="information-block <?if($i % 2 == 0){echo 'reverse';}?>">
                        <div class="prologue">
                            <div class="information-block__text"><?=$elem['discription']?></div>
                            <a href="#" class="btn__history"><span>ПОДРОБНЕЕ</span>  <svg class="svg__history"  viewBox="0 0 24 24" fill="none" >
                                <path d="M16.3153 16.6681C15.9247 17.0587 15.9247 17.6918 16.3153 18.0824C16.7058 18.4729 17.339 18.4729 17.7295 18.0824L22.3951 13.4168C23.1761 12.6357 23.1761 11.3694 22.3951 10.5883L17.7266 5.9199C17.3361 5.52938 16.703 5.52938 16.3124 5.91991C15.9219 6.31043 15.9219 6.9436 16.3124 7.33412L19.9785 11.0002L2 11.0002C1.44772 11.0002 1 11.4479 1 12.0002C1 12.5524 1.44772 13.0002 2 13.0002L19.9832 13.0002L16.3153 16.6681Z" fill="#E7AB58"/>
                                </svg>
                            </a>
                        </div>
                        <div class="image__history"><img src="<?= $elem['photo']?>" alt="1"></div>
                    </div>
                </div>
        <?
        $i++;
       }
       ?>
        <!--add new ark-->

                <div class="added">
                    <form action="script/PHP/addInformationArk.php" class="added__form" method="post" enctype="multipart/form-data">
                        <label for="added__form"> добавить данные</label>
                        <div class="edit__input-cont">
                            <input class='popup__input' type='text' placeholder='nameArk' name='nameArkAdd' required>
                            <textarea class="popup__input inputeditsize area" type="text" placeholder="description" name="descriptionAdd" required></textarea>
                            <input class="popup__input inputeditsize" type="file"  name="titlePhotoAdd" required>
                            <input class="popup__input inputeditsize" type="file"  name="mainPhotoAdd" required>
                        </div>
                        <input class='popup__input popup__btn' type='submit' value='добавить' >
                    </form>
                </div>
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
                <input class='popup__input' type='text' placeholder='логин' name='login' required>
                <input class='popup__input' type='password' placeholder='пароль' name='password' required>
                <input class='popup__input' type='text' placeholder='имя пользователя' name='nickname'  required>
                <input class='popup__input popup__btn' type='submit' value='зарегестрироваться' >
            </form>
            <br>
            <div class='auth-text'>Если вы уже зарегестрированы, то <a href='' class='auth-link'>Войдите</a></div>
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
            </form>
        </div>
    </div>
    ";
}
?>
    <!--popup -edit -->  
    <div class="popup-bg-edit">
        <div class="popup-edit">
            <form action="script/PHP/updateArk.php" class="edit" method="post" enctype="multipart/form-data">
                <span class="popup__pd close-popup">
                    <span class="close-popup-x"></span>
                </span>
                <label for="edit-form">изменить данные</label>
                <div class="edit__input-cont">
                    <select name="nameArk" class="popup__input inputeditsize" placeholder="nameArk"id="nameArk">
            <?php
           
            $query = "SELECT nameArk FROM ark";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['nameArk'] . '">' . $row['nameArk'] . '</option>';
                
            }
            ?>
                    </select>
                    <textarea class="popup__input inputeditsize area" type="text" placeholder="description" name="description"></textarea>
                    <input class="popup__input inputeditsize" type="file"  name="titlePhoto">
                    <input class="popup__input inputeditsize" type="file"  name="mainPhoto" >
                </div>
                <input class="popup__input popup__btn" type="submit" value="отправить" >
            </form>
        </div>
    </div>


</body>
</html>
