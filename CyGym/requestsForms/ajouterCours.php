<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Added Lessons</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    define('ROOT_PATH', dirname(__DIR__) . '/');

    if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] != 'coach') {
        header('location: ../index.php');
    } else {

        $id_cours = uniqid();
        $sport = $_POST['sport'];
        $description = $_POST['description'];
        $date = $_POST['date-cours'];
        $adresse = $_POST['adresse'];
        $prof = $_SESSION['username'];

        $ligne = [$id_cours, $sport, $description, $date, $adresse, $prof];
        $path = ROOT_PATH . "donnees/cours.csv";
        $file = fopen($path, "a+");
        fputcsv($file, $ligne);
        fclose($file);


        //affichage des sports:
        include '../components/header.php';
        echo "<div class='card card-coaches'> <h2>Lessons</h2>";
        echo "<table>\n\n";
        $f = fopen($path, "r");
        while (($line = fgetcsv($f, 1000, ",")) !== false) {
            echo "<tr>";
            foreach ($line as $cell) {
                echo "<td><div>" . htmlspecialchars($cell) . "</div></td>";
            }
            echo "</tr>\n";
        }
        fclose($f);
        echo "\n</table>";
        echo "</div>";
        echo "<a class='mainBtn' href='../gestionProf.php'> Revenir </a>";
    }
    ?>

</body>

</html>