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
                echo "<td> <div>" . htmlspecialchars($cell) . "</div></td>";
            }
            echo "<td> 
                <form method='GET' action='inscrireCours.php'>
                    <input type='text' value='". $line[0] ."' name='coursId' hidden>
                    <input type='text' value='". $line[1] ."' name='sport' hidden>
                    <input type='submit' class='mainBtn inscrireBtn' value='Sign lesson'>
                </form> 
            </td>";
            echo "</tr>\n";
        }
        $tmp++;
    }
    fclose($f);
    ?>
    </table>
    </div>
    <a class='mainBtn' href='../index.php'> Revenir </a>
</body>

</html>