<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">

<body>
    <?php
    session_start();
    define('ROOT_PATH', dirname(__DIR__) . '/');

    if (!isset($_SESSION["usertype"]) || $_SESSION["usertype"] != "admin") {
        header("location: ../index.php");
    } else {
        include '../components/header.php';

        $pseudo = $_POST["pseudo"];
        $sport1 = $_POST["sport1"];
        $sport2 = $_POST["sport2"];
        $ligne = [$pseudo, $sport1, $sport2];

        $path = ROOT_PATH . "donnees/sports.csv";
        $data = [];
        $header = null;
        if (($file = fopen($path, "r")) !== false) {
            $header = fgetcsv($file, 1000, ",");

            while (($row = fgetcsv($file, 1000, ",")) !== false) {
                $data[] = $row;
            }
            fclose($file);
        }

        $indexToRemove = -1;
        foreach ($data as $index => $row) {
            if ($row[0] === $pseudo) {
                $indexToRemove = $index;
                break;
            }
        }

        if ($indexToRemove !== -1) {
            unset($data[$indexToRemove]);
        }

        $data[] = $ligne;

        if (($file = fopen($path, "w")) !== false) {
            fputcsv($file, $header);

            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        }

        //affichage des sports:
        echo "<div class='card card-coaches'> <h2>Coaches</h2>";
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
        echo "<a class='btn-revenir' href='../gestionAdmin.php'> Revenir </a>";
    }
    ?>

</body>

</html>