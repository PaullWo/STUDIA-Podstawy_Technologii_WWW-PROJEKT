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
    <?php require("db_session.php"); 
        if(isset($_REQUEST["wynik"])){
            $id=$_SESSION['id'];
            $sql1="SELECT coins FROM uzytkownicy WHERE id=$id";
            $result1 = $conn->query($sql1);
            $row=$result1->fetch_object();
            $coins=$row->coins;
            $suma=$coins+$_REQUEST["wynik"];
            $sql2="UPDATE uzytkownicy SET coins = $suma WHERE id = $id";
            $result2 = $conn->query($sql2);
        }
    ?>
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
                <div class="nad_article">
                <div id="zamknij1">
                    <div class="zakoncz" id="zamknij1" onclick="zamknij1()">
                        <img src="grafika/x.png" alt="zakoncz">
                    </div>
                    <div class="article_post">
                        <div>
                        <h4>Witaj towarzyszu!</h3>
                        <p>Dobrze Cię widzieć. Z tej strony szef gangu: 
                            <?php 
                            if($_SESSION['gang']=="dachowce"){
                                echo '<b class="wyrozniony_tekst">Miejskie Dachowce</b>.<br><br>';
                            }else{
                                echo '<b class="wyrozniony_tekst">Rasowa Mafia</b>.<br><br>';
                            }
                            ?>
                            •Koniecznie zajrzyj w zakładke: <b class="wyrozniony_tekst">GANGI</b>, aby poznać wszystkie koty w okolicy.<br>
                            •W zakładce <b class="wyrozniony_tekst">SPOŁECZNOŚĆ</b> zobaczysz posty tylko naszych przyjaciół z gangu.<br>
                            •Na start dostajesz 2000 CatCoins, jednak nie przejmuj się w każdej chwili <br>możesz je zarobić w zakładce <b class="wyrozniony_tekst">POLOWANIE</b>.<br>
                            •W zakładce <b class="wyrozniony_tekst">HANDEL</b> możesz kupić/sprzedać swojego sługę.<br>
                            Miłej zabawy!
                        </p>
                        </div>
                        <div>
                        <?php 
                            if($_SESSION['gang']=="dachowce"){
                                echo '<img src="grafika/szef_dachowce.png">';
                            }else{
                                echo '<img src="grafika/szef_mafia.png">';
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div id="zamknij2">
                    <div class="zakoncz" onclick="zamknij2()">
                        <img src="grafika/x.png" alt="zakoncz">
                    </div>
                    <div class="article_post">
                        <div>
                            <img src="grafika/walka.png">
                        </div>
                        <div>
                            <h4>Już wkrótce!</h4>
                            <p>Zbierz drużynę i zmierz swoje siły w najbardziej brutalnych walkach <br>gangów!<br>
                            Opcja dostępna będzie w następnej aktualizacji.</p>
                        </div>
                    </div>
                </div>
                </div>
            </article>
            </div>
        </div>
    </div>
    <script>
        function zamknij1(){
            document.getElementById("zamknij1").style.visibility = "hidden";
        }
        function zamknij2(){
            document.getElementById("zamknij2").style.visibility = "hidden";
        }
    </script>
</body>

</html>