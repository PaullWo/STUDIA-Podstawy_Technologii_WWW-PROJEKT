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
                <div class="nad_article" id="nad_article_profil">
                    <div class="article_post lista_profil" id="gang_dachowce">
                        <div class="scroll_profil">
                            <?php
                                $sql="SELECT * FROM uzytkownicy WHERE login='$login'";
                                $result = $conn->query($sql);
                                $row=$result->fetch_object();
                                    $wyglad=$row->wyglad;
                                    $login=$row->login;
                                    $coins=$row->coins;
                                    $gang=$row->gang;
                                    $id=$_SESSION['id'];
                                    if($_SESSION['gang']=="dachowce"){
                                        echo '<h4>Członek MIEJSKIE DACHOWCE<br><br>';
                                        echo "<div class='uzytkownik'><img src='obrazy/glowy/dachowce/$wyglad' class='profil_img'><div>login: $login <br>stan konta:$coins <img src='grafika/coin.png'class='coins'></div></div>";
                                    }else{
                                        echo '<h4>Członek RASOWA MAFIA<br><br>';
                                        echo "<div class='uzytkownik'><img src='obrazy/glowy/mafia/$wyglad' class='profil_img'><div>login: $login <br>stan konta:$coins <img src='grafika/coin.png'class='coins'></div></div>";
                                    }
                                    echo "<br>SŁUDZY ";
                                    echo"<div>";
                                    $sql="SELECT * FROM sludzy WHERE idWlasciciela=$id";
                                    $result = $conn->query($sql);
                                    while($row=$result->fetch_object()){
                                    $wyglad=$row->wyglad;
                                    $imie=$row->imie;
                                    $cena=$row->cena;
                                    $opis=$row->opis;
                                        echo "<div class='uzytkownik' id='sluga'><div><img src='$wyglad' class='profil_img'><div>imię: $imie <br>opis: $opis <br> cena: $cena <img src='grafika/coin.png'class='coins'><br></div>
                                        </div></div>";
                                    }
                                    echo"</div>";
                                    echo "<br>ULUBIONE ";

                                    $sql="SELECT tresc,obrazek,login,wyglad,data FROM polubienia l,posty p,uzytkownicy u WHERE p.id=l.idPostu AND l.idUzytkownika=u.id AND l.idUzytkownika=$id";
                                    $result= $conn->query($sql);
                                    while($row=$result->fetch_object()){
                                        $login=$row->login;
                                        $tresc=$row->tresc;
                                        $obrazek=$row->obrazek;
                                        $data=$row->data;
                                        $wyglad=$row->wyglad;
                                        echo "<div class='article_post_profil'>
                                            <div class='article_post_mniejszy'>
                                            <div class='post_tresc'>
                                                $tresc";
                                                if($obrazek!=""){
                                                    echo"<img src='obrazy/posty/$obrazek' style='height:100px'>";
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
                    <a href="wyloguj.php" id="wyloguj">Wyloguj się</a>
                </div>
                
            </article>
        </div>
    </div>
</body>

</html>