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
    <div class="tlo">
        <div class="okno">
            <div class="okno_menu" id="okno_rejestracja">
                <div class="zakoncz">
                    <a href="index.php"><img src="grafika/x.png" alt="zakoncz"></a>
                </div>
                <div id="okno_rejestracja_mniejsze">   
                    <img src="grafika/logo.png" alt="logo" id="rejestracja_logo">
                    <p id="info_rejestracja">
                        Stań się jednym z członków najbardziej niebezpiecznych gangów na świecie!<br>
                        Wybierz swoją drużynę. <b class="antywyrozniony_tekst"><br>*Pamiętaj zrób to rozsądnie, ponieważ nie można <br>
                        zrzec się z gangu bez konsekwencji.*</b><br>
                    </p>
                    
                    <div id="formularz_rejestracja">
                        <p> REJESTRACJA</p>
                        <p id="info_gangi">
                            <b class="wyrozniony_tekst">MIEJSKIE DACHOWCE</b> - pozostań z boku i zaskocz w najmniej spodziewanym momencie.<br>
                            Wyróżniasz się wielką siłą i sprytem, a swoją niezależnością imponujesz nie jednej kotce.<br>
                            Każda mysz drży na Twój widok!<br>
                            <b class="wyrozniony_tekst">RASOWA MAFIA</b> - postaw na elegancje i otaczaj się w najbardziej
                            prestiżowym środowisku.<br> Przemierzaj świat w garniturze, ale nie daj się zwieść swojej waleczności.<br>
                            Łosoś, kawior i pieniądze to coś do czego dążysz!<br>
                        </p>
                        <form action="rejestracja_form.php" method="POST" id="form_rejestracja">
                            <p id="wybor_p">
                                <input type="radio" name="wybor_gangu" id="wybor_dachowce" value="dachowce" required/> MIEJSKIE DACHOWCE
                                <input type="radio" name="wybor_gangu" id="wybor_mafia" value="mafia" required/> RASOWA MAFIA <br>
                            </p>
                            <p>login: <input type="text" name="rejestracja_login" id="rejestracja_login" value="login" required/></p>
                            <div id="komunikat" class="wyrozniony_tekst">
                                
                            </div>
                            <p>hasło: <input type="password" name="rejestracja_haslo" id="rejestracja_haslo" value="haslo" required/></p>
                            <button type="submit">Zarejestruj się</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
        $conn = new mysqli("localhost", "root", "", "cats_gang");
        if ($conn->connect_error) {
            exit("Connection failed: " . $conn->connect_error);
        }
        session_start();
        if (isset($_POST["rejestracja_login"])) {
            $login = $_POST["rejestracja_login"];
            $haslo = $_POST["rejestracja_haslo"];
            $gang = $_POST["wybor_gangu"];
            //Sprawdzanie czy uzytkownik juz istnieje
            $sql1 = "SELECT * FROM uzytkownicy WHERE login='$login'";
            $result1 = $conn->query($sql1);
            if($result1->num_rows>=1){
                ?>
                <script>
                    document.getElementById("komunikat").innerHTML="Podany login już istnieje!";
                </script>
                <?php
            }else{
                $sql2 = "INSERT INTO uzytkownicy (login, haslo, gang) VALUES ('$login', '".md5($haslo)."', '$gang')";
                $result2 = $conn->query($sql2);
                $_SESSION["login"]=$login;
                $_SESSION["gang"]=$gang;
                header("Location: wybor_postaci.php");
                $conn->close();
            }
        }
    ?>
</body>

</html>