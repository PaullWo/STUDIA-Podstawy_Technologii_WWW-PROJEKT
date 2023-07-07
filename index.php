<!--Strona z logowaniem-->

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
    <div class="tlo">
        <div class="okno">
            <div class="test_lewy">
                <div class="okno_gora">
                    <img src="grafika/logo.png" alt="logo" id="okno_logo">
                </div>
                <div class="okno_lewy">
                    <div class="okno_img">
                        <img src="grafika/kot1.png" alt="szary kot" id="okno_lewykot">
                    </div>
                    <div class="okno_menu">
                        <p id="powitanie">      <!--komunikat początkowy-->
                            Witaj w świecie,w którym nad ludźmi panują koty.<br>
                            Wybierz drużynę <b class="wyrozniony_tekst">Miejskich Dachowców</b> lub wciel się <br>w 
                            <b class="wyrozniony_tekst">Rasową Mafię</b> i razem ze swoim gangiem<br> zacznij podbijać świat!
                        </p>
                        <div id="logowanie">
                            <form id="form_logowanie" action="index.php" method="POST">
                                <p>LOGOWANIE</p>
                                <p id="login_haslo">
                                    login: <input type="text" name="logowanie_login" id="" value="login"><br>
                                    hasło: <input type="password" name="logowanie_haslo" id="" value="hasło"><br>

                                </p>
                                <button type="submit">Zaloguj się</button>
                                <p id="komunikat2" class="wyrozniony_tekst">
                                    </p>
                            </form>
                            <div id="rejestrowanie">
                                <p>Nie masz jeszcze konta?</p>
                                <a href="rejestracja_form.php" class="button">Zarejestruj się</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="okno_prawy">
                <img src="grafika/kot2.png" alt="rudy kot" id="okno_prawykot">
            </div>
        </div>
    </div>
    <?php
        $conn = new mysqli("localhost", "root", "", "cats_gang");
        if ($conn->connect_error) {
            exit("Connection failed: " . $conn->connect_error);
        }
        session_start();
        if (isset($_POST["logowanie_login"])) {
            $login = $_POST["logowanie_login"];
            $haslo = $_POST["logowanie_haslo"];
            $sql1 = "SELECT * FROM uzytkownicy WHERE login='$login' AND haslo='".md5($haslo)."'";
            $result1 = $conn->query($sql1);
            if($result1->num_rows==1){
                $row=$result1->fetch_object();
                $_SESSION["login"]=$login;
                $_SESSION["gang"]=$row->gang;
                header("Location: aktualnosci.php");
            }else{
                ?>
                <script>
                    document.getElementById("komunikat2").innerHTML="Błędne dane!";
                </script>
                <?php
            }
        }
        $conn->close();
    ?>
</body>

</html>