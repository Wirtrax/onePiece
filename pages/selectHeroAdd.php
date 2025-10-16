<div class='popup-bg' style="z-index: 100;">
        <div class="added">
            <form action="../script/PHP/addHero.php" class="added__form" method="post" enctype="multipart/form-data">
                <span class='popup__pd close-popup'>
                    <span class='close-popup-x'></span>
                </span>
                <label for="added__form">Добавить нового персонажа</label>
                <div class="add__input-cont">
                    <input class='popup__input' type='text' placeholder='name' name='nameHeroAdd' required>
                    <input class='popup__input' type='text' placeholder='nickname' name='nicknameHeroAdd' required>
                    <input class='popup__input' type='text' placeholder='skill' name='skillHeroAdd' required>
                    <input class='popup__input' type='text' placeholder='reward' name='rewardHeroAdd' required>
                    <textarea class="popup__input inputeditsize area" type="text" placeholder="description" name="descriptionHeroAdd" required></textarea>
                    <input class="popup__input inputeditsize" type="file"  name="photoOnCardHeroAdd" title="фото на карточке" required>
                    <input class="popup__input inputeditsize" type="file"  name="mainPhotoHeroAdd" title="основное фото" required>
                    <select name="fruitSelectHeroAdd" class="popup__input inputeditsize"  id="fruit">
                        <?php
                        
                        $query = "SELECT name FROM fruit";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                        }
                        ?>
                    </select>
                     <select name="homelandSelectHeroAdd" class="popup__input inputeditsize"  id="homeland">
                        <?php
                        
                        $query = "SELECT kingdom FROM homeland";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['kingdom'] . '">' . $row['kingdom'] . '</option>';
                        }
                        ?>
                    </select>

                    <select name="postSelectHeroAdd" class="popup__input inputeditsize"  id="post">
                    
                    <?php
                    
                    $query = "SELECT post FROM post";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['post'] . '">' . $row['post'] . '</option>';
                    }
                    ?>
                </select>

                <select name="raceSelectHeroAdd" class="popup__input inputeditsize"  id="race">
                
                    
                    <?php
                    
                    $query = "SELECT raceName FROM race";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['raceName'] . '">' . $row['raceName'] . '</option>';
                    }
                    ?>
                </select>
                
                <select name="pirateteamSelectHeroAdd" class="popup__input inputeditsize"  id="pirateteam">
                    <?php
                    
                    $query = "SELECT teamName FROM pirateteam";
                    $result = mysqli_query($link, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['teamName'] . '">' . $row['teamName'] . '</option>';
                    }
                    ?>
                </select>


                </div>
                <input class='popup__input popup__btn' type='submit' value='добавить' >
            </form>
        </div>
    </div>