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
        <div class="okno">
            <div class="okno_menu" id="okno_rejestracja">
                <div class="zakoncz">
                    <a href="index.php"><img src="grafika/x.png" alt="zakoncz"></a>
                </div>
                <div id="okno_rejestracja_mniejsze" class="okno_wybor">
                <img src="grafika/logo.png" alt="logo" id="rejestracja_logo">
                <div id="formularz_wybor">   
                    <form action="wybor_postaci.php" method="POST" id="form_postac">
                        <p>WYBÓR POSTACI</p>
                        <div id="wybor_postaci">
                            <?php
                                $gang=$_SESSION["gang"];
                                echo ' <p><input type="radio" name="wybor_postaci" id="wybor_dachowce" value="bury1.png" required/><img src="obrazy/postacie/'.$gang.'/bury1.png" class="postacie_img">
                                <input type="radio" name="wybor_postaci" id="wybor_mafia" value="czarny1.png" required/><img src="obrazy/postacie/'.$gang.'/czarny1.png" class="postacie_img"></p>
                                <p><input type="radio" name="wybor_postaci" id="wybor_mafia" value="kolorowy1.png" required/><img src="obrazy/postacie/'.$gang.'/kolorowy1.png" class="postacie_img">
                                <input type="radio" name="wybor_postaci" id="wybor_mafia" value="rudy1.png" required/><img src="obrazy/postacie/'.$gang.'/rudy1.png" class="postacie_img"><br></p>'
                            ?>
                        </div>
                            <button type="submit">Wybierz postać</button>
                    </form>
                </div> 
                </div>
            </div>


        </div>
    </div>
    <?php
        if (isset($_POST["wybor_postaci"])) {
            $wyglad = $_POST["wybor_postaci"];
            $login=$_SESSION["login"];
            $sql1 = "UPDATE uzytkownicy SET wyglad = '$wyglad' WHERE login = '$login'";
            $result1 = $conn->query($sql1);
            $conn->close();
            header("Location: aktualnosci.php?pierwsze=1");
        }
    ?>
</body>

</html>