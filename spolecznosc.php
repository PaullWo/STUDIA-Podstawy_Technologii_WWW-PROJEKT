<!--Strona z rejestracja-->

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="grafika/favicon.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
                <div class="nad_article spolecznosc">
                    <div class='dodaj_post'>
                        <h4>DODAJ POST</h4>
                        <form action="spolecznosc.php" method="POST" enctype="multipart/form-data">
                            <input type="number" name="idUzytkownika" hidden>
                            <textarea name="tresc_posta" id="tresc_posta" cols="70" rows="5"></textarea>
                            <p>ZDJĘCIE:   <input type="file" name="obrazek" id="obrazek"></p>
                            <input type="submit" value="Dodaj" class="button">
                        </form>
                    </div>
                    <?php
                        if (isset($_POST["tresc_posta"])) {
                            $tresc = $_POST["tresc_posta"];
                            $login_biezacy=$_SESSION['login'];
                            $sql1 = "SELECT id FROM uzytkownicy WHERE login='$login_biezacy'";
                            $result1 = $conn->query($sql1);
                            $row=$result1->fetch_object();
                            $idUzytkownika=$row->id;
                            $_SESSION['id']=$idUzytkownika;
                            $sql2 = "INSERT INTO posty (idUzytkownika, tresc) VALUES ('$idUzytkownika', '$tresc')";
                            $result2 = $conn->query($sql2);
                            $sql3 = "SELECT id FROM posty WHERE idUzytkownika='$idUzytkownika' AND tresc='$tresc'";
                            $result3 = $conn->query($sql3);
                            $row=$result3->fetch_object();
                            $idPosta=$row->id;
                            $obrazek = basename($_FILES["obrazek"]["name"]);
                            move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazy/posty/" .$idPosta.".png");
                            $sql4="UPDATE posty SET obrazek = '$idPosta.png' WHERE id = '$idPosta'";
                            $result4 = $conn->query($sql4);
                        }
                    ?>
                    <?php
                        $sql="SELECT p.id,login,tresc,obrazek,data,wyglad FROM posty p,uzytkownicy u WHERE u.id=p.idUzytkownika";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_object()){
                            $login=$row->login;
                            $tresc=$row->tresc;
                            $obrazek=$row->obrazek;
                            $data=$row->data;
                            $wyglad=$row->wyglad;
                            $id=$row->id;
                            echo "<div class='article_post'>
                                <div class='post_profil'>
                                    <img src='obrazy/glowy/mafia/$wyglad' class='profil_img'><br>
                                    <div>
                                    login: $login<br>";
                                    $login_biezacy=$_SESSION['login'];
                                    $sql2 = "SELECT idPostu,u.id FROM polubienia p,uzytkownicy u WHERE idPostu = '$id' AND login ='$login_biezacy' AND u.id=idUzytkownika";
                                    $added = $conn->query($sql2)->num_rows > 0;
                                    $text = $added ? "grafika/polubione.png" : "grafika/odlubione.png";   
                                    echo "<img class='polubienia' data-dzban='$id' src='$text' style='height:30px;'>
                                    </div>
                                    </div>
                                <div class='article_post_mniejszy'>
                                <div class='post_tresc'>
                                    $tresc";
                                    if($obrazek!=""){
                                        echo"<img src='obrazy/posty/$obrazek'>";
                                    }
                            echo "
                                <br>
                                </div>
                                $data
                                </div>
                                </div>";
                        }
                    ?>
                </div>
                </div>
            </article>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>