<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultats</title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    $_SESSION["pagename"] = "search-page";
    include '../components/header.php';
    ?>
    <div class='card card-coaches'> 
        <h2>Lessons</h2>
        <table>
    <?php
    define('ROOT_PATH', dirname(__DIR__) . '/');
    $result = [];
    $tmp = 0;
    $path = ROOT_PATH . "donnees/cours.csv";
    $f = fopen($path, "r");
    while (($line = fgetcsv($f, 1000, ",")) !== false) {
        if($tmp == 0){
            echo "<tr>";
            foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>\n";
        }
        else if ($line[1] == $_POST["search"]) {
            echo "<tr>";
            foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "<td> <button>Sign lesson</button> </td>";
            echo "</tr>\n";
        }
        $tmp++;
    }
    fclose($f);
    ?>
    </table>
    </div>
    <a class='btn-revenir' href='../index.php'> Revenir </a>
</body>

</html>