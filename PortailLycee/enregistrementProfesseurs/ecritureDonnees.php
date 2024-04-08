<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

        $dataEleve = [$_POST["nom"], $_POST["prenom"], $_POST["dateNaissance"], $_POST["adresse"], $_POST["nbPoints"], $_POST["pseudo"], $_POST["mdp"]];

        $file = fopen("eleves.csv","a");

        fputcsv($file, $dataEleve, ";");
        
        fclose($file);
    ?>
    <main>
        <a href="formulaire.php">Revenir</a>
    </main>

</body>
</html>
