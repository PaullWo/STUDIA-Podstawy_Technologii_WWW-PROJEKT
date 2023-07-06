<!--Strona z rejestracja-->

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="grafika/favicon.png" type="image/x-icon">
    <title>CATS GANG</title>
</head>

<body>
    <?php require("db_session.php"); ?>
    <div class="tlo">
        <div class="okno_glowne">
            <nav>
                <div class="menu">
                    <a href="gangi.php" class="button">Gangi</a>
                    <a href="spolecznosc.php" class="button">Społeczność</a>
                    <a href="aktualnosci.php" class="button" >AKTUALNOŚCI</a>
                    <a href="polowanie.php" class="button">Polowanie</a>
                    <a href="handel.php" class="button">Handel</a>
                </div>
                <div class="menu_profil">
                    <a href="profil.php">
                        <?php
                        $login=$_SESSION['login'];
                        $sql="SELECT gang,wyglad,coins FROM uzytkownicy WHERE login='$login'";
                        $result = $conn->query($sql)->fetch_object();
                        $gang=$_SESSION['gang'];
                        $wyglad=$result->wyglad;
                        echo "<img src='obrazy/glowy/$gang/$wyglad' alt='profil' class='profil_img'>";
                        ?>
                    </a>
                    <div>
                        <?php
                            $coins=$result->coins;
                            echo "<p>$coins</p><img src='grafika/coin.png' class='coins'>"
                        ?>
                    </div>
                </div>
            </nav>
            <article>
                <div class="nad_article" id="nad_article_gangi">
                    <div class="article_post">
                        
                    </div>
                    <div class="article_post">
                        
                    </div>
                </div>
                
            </article>
        </div>
    </div>
</body>

</html>