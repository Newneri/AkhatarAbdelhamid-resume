<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signed</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["pagename"]) || $_SESSION["pagename"] != "inscription-page") {
        header("location: ../index.php");
    }
    define('ROOT_PATH', dirname(__DIR__) . '/donnees/');
    $path = ROOT_PATH . $_POST['coursId'] . "-". $_POST['sport'].".csv";
    $ligne = array($_POST['fname'], $_POST['lname'], $_POST['number'], $_POST['age']);
    $file = fopen($path, "a+");

    if (filesize($path) == 0) {
        fputcsv($file, array("prenom", "nom", "numero", "age"));
    }

    fputcsv($file, $ligne);
    fclose($file);

    include '../components/header.php';

    echo "<div class='card card-coaches'> <h2>Inscrits au cours " . $_POST["coursId"] . "</h2>";
    echo "<table>\n\n";
    $f = fopen($path, "r");
    while (($line = fgetcsv($f, 1000, ",")) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
    }
    fclose($f);
    echo "\n</table>";
    echo "</div>";
    ?>
    <a class='mainBtn' href='../index.php'> Revenir </a>

</body>

</html>