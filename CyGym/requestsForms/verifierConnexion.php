<?php
session_start();
define('ROOT_PATH', dirname(__DIR__) . '/');
if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
    $_SESSION["usertype"] = $_POST["username"];
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["erreur"] = "";
    header("location: ../gestionAdmin.php");
} else {
    $path = ROOT_PATH . "donnees/profs.csv";
    $file = fopen($path, "r");
    $tmp = 0;
    while (($data = fgetcsv($file, 1000, ",")) !== false) {
        if ($tmp > 0) {
            if ($data[3] == $_POST["username"] && $data[4] == md5($_POST["password"])) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["usertype"] = "coach";
                $_SESSION["erreur"] = "";
                header("location: ../gestionProf.php");
                fclose($file);
                exit();
            }
        }
        $tmp++;
    }
    fclose($file);
    $_SESSION["erreur"] = "Wrong password or username";
    header("location: ../connexions/connexion.php");
}

