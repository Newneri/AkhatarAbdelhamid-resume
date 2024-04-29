<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coaches</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    define('ROOT_PATH', dirname(__DIR__) . '/');
    function genPassword()
    {
        $password = random_bytes(8);
        $password = base64_encode($password);
        $password = str_replace(["+", "/", "="], "", $password);
        $password = substr($password, 0, 8);
        return md5($password);
    }
    if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {
        $ligne = [$_POST["fname"], $_POST["lname"], $_POST["date-embauche"], $_POST["fname"][0] . $_POST["lname"], genPassword()];
        $path = ROOT_PATH . "donnees/profs.csv";
        $file = fopen($path, "a+");
        $noms = array();
        $tmp = 1;

        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            if ($data[3] == $ligne[3] && $data[0][0] == $ligne[0][0]) {
                if ($tmp > 1) {
                    $ligne[3] = substr($data[3], 0, -1) . strval($tmp);
                } else {
                    $ligne[3] = $data[3] . strval($tmp);
                }
                $tmp++;
                
            }
        }
        fputcsv($file, $ligne);
        fclose($file);

        include '../components/header.php';

        echo "<div class='card card-coaches'> <h2>Coaches</h2>";
        echo "<table>\n\n";
        $fileRead = fopen($path, "r");
        while (($line = fgetcsv($fileRead)) !== false) {
            echo "<tr>";
            foreach (array_slice($line, 0, -1) as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
        fclose($fileRead);
        echo "\n</table>";
        echo "</div>";
        echo "<a class='btn-revenir' href='../gestionAdmin.php'> Revenir </a>";
    } else {
        header("location: ../index.php");
    }

    ?>

</body>

</html>