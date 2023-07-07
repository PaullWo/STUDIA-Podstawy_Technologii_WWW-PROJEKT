<?php
 require("db_session.php");
 $idPostu = $_REQUEST["idDzbana"];
 $idUzytkownika = $_SESSION["id"];
 $sql = "SELECT id FROM polubienia WHERE idPostu = $idPostu AND idUzytkownika =$idUzytkownika";
 $result = $conn->query($sql);;
 if ($result->num_rows == 1) {
 $id = $result->fetch_object()->id;
 $sql = "DELETE FROM polubienia WHERE id = $id";
 } else {
 $sql = "INSERT INTO polubienia (idPostu, idUzytkownika) VALUES ($idPostu,
$idUzytkownika)";
 }
 if ($conn->query($sql) !== TRUE) {
 echo "Error: " . $sql . "<br>" . $conn->error;
 } else {
 echo "sukces";
 }
 $conn->close();
?>