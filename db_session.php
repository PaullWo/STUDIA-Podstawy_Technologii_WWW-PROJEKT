<?php
    $conn = new mysqli("localhost", "root", "", "cats_gang");
    if ($conn->connect_error) {
        exit("Connection failed: " . $conn->connect_error);
    }
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }
?>