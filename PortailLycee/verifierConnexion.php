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
        $fileName = "";
        if($_POST["classe"] == "eleve"){
            $fileName = "enregistrementEleves/eleves.csv";
        } else {
            $fileName = "enregistrementProfesseurs/professeurs.csv";
        }

        $file = fopen($fileName, "r");
        $contenu = fread($file, filesize($fileName));
        echo $contenu;
        fclose($file);
    ?>
</body>
</html>