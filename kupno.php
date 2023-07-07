<?php
    require("db_session.php");
    $id = $_REQUEST["id"];
    $cena= $_REQUEST["cena"];
    $idUzytkownika = $_SESSION["id"];
    $sql="SELECT coins FROM uzytkownicy WHERE id='$idUzytkownika'";
    $result = $conn->query($sql);
    $row=$result->fetch_object();
    $srodki=$row->coins;
    if($srodki>=$cena){
        $sql="UPDATE sludzy SET idWlasciciela = '$idUzytkownika' WHERE id = $id";
        $result = $conn->query($sql);
        $srodki=$srodki-$cena;
        $sql="UPDATE uzytkownicy SET coins = '$srodki' WHERE id = $idUzytkownika";
        echo $sql;
        $result = $conn->query($sql);
    }
    header("Location: handel.php");
?>