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
        return $password;
    }
    if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {
        if (isset($_POST["fname"])) {

            $password = genPassword();
            $ligne = [$_POST["fname"], $_POST["lname"], $_POST["date-embauche"], $_POST["fname"][0] . $_POST["lname"], md5($password)];
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
        }

        include '../components/header.php';
        echo "<h3 class='msg' >Retenez bien le mot de passe affiché à coté du prof que vous venez de rajouter, vous ne le verez plus ! </h3>";
        echo "<div class='card card-coaches'> <h2>Coaches</h2>";
        echo "<table>\n\n";
        $fileEndPos = filesize(($path));
        $fileRead = fopen($path, "r");

        while (($line = fgetcsv($fileRead)) !== false) {
            $currentPos = ftell($fileRead);
            echo "<tr>";
            if ($currentPos >= $fileEndPos) {
                for( $i = 0; $i < sizeof($line); $i++ ){
                    if($i==4){
                        echo "<td>" . $password . "</td>";
                    } else{
                        echo "<td>" . $line[$i] . "</td>";
                    }
                }
            } else {
                foreach (array_slice($line, 0, -1) as $cell) {
                    echo "<td>" . $cell . "</td>";
                }
            }
            echo "</tr>\n";
            $i++;
        }
        fclose($fileRead);
        echo "\n</table>";
        echo "</div>";
        echo "<a class='mainBtn' href='../gestionAdmin.php'> Revenir </a>";
    } else {
        header("location: ../index.php");
    }

    ?>

</body>

</html>