<? session_start();

require_once('../connection.php');
$hero_id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../entities/img/home/icon/logo1.ico">
    <link rel="stylesheet" href="../CSS/hero.css">
    <title>Piece of ship</title>
    <link rel="stylesheet" href="../CSS/header.css">
    <script src="../script/JS/burger.js" defer></script>
</head>
<body style="background-image: url(../entities/img/page4-hero/bgHero.png); width: 100%;">
     <!-- navigation -->   
    <?require_once('header.php')?>
 <!--heroInfo main -->   
    <div class="containerHeroInfo">
        <div class="heroInfo">
            <div class="heroInfo__text">
            <?
       $hero="SELECT hero.devilFruitId, fruit.name as fruit_name, hero.name, hero.discription, hero.skill, hero.reward, hero.mainPhoto, hero.homeLandId, homeland.kingdom as homeland_kingdom,
            hero.postId, post.post as post_post, hero.raceId, race.raceName as race_name, hero.teamId, pirateteam.teamName as pirateteam_Name from hero 
            join fruit on hero.devilFruitId=fruit.id
            join homeland on hero.homeLandId=homeland.id
            join post on hero.postId=post.id
            join race on hero.raceId=race.id
            join pirateteam on hero.teamId=pirateteam.id
            where hero.id=$hero_id";
        $result=mysqli_query($link,$hero);
            
        if($result){
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
        
        ?>
                <h1 class="heroInfo__title"><?echo "{$row['name']}"?></h1>
                <h2 class="heroInfo__subTitle"><?echo "{$row['nickname']}"?></h2>
                <div class="heroInfo__discription"><?echo "{$row['discription']}"?></div>
                <hr class="heroInfo__hr">
                <ul class="heroInfo__list">
                    <li class="heroInfo__listItem">ФРУКТ: <span><?echo "{$row['fruit_name']}"?></span></li>
                    <li class="heroInfo__listItem">ДОМ:<span><?echo "{$row['homeland_kingdom']}"?></span> </li>
                    <li class="heroInfo__listItem">РАСА: <span><?echo "{$row['race_name']}"?></span></li>
                    <li class="heroInfo__listItem">НАВЫКИ: <span><?echo "{$row['skill']}"?></span></li>
                    <li class="heroInfo__listItem">КОМАНДА: <span><?echo "{$row['pirateteam_Name']}"?></span></li>
                    <li class="heroInfo__listItem">ПОСТ: <span><?echo "{$row['post_post']}"?></span></li>
                    <li class="heroInfo__listItem">НАГРАДА ЗА ГОЛОВУ: <span><?echo "{$row['reward']}"?></span> <img src="../entities/img/page4-hero/BeliSymbol.webp" alt="" class="heroInfo__beli"></li>
                </ul>
            </div>
            <div class="heroInfo__img"><img src="<?echo "{$row['mainPhoto']}"?>" alt="brook"></div>
            <?}}}?>
        </div>
    </div>
</body>
</html>