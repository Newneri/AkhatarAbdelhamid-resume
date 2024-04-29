<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Coach</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    $_SESSION["pagename"] = "gestionProf";
    if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "coach") {
        include ("components/header.php");
        include ("components/formulaireAjCours.php");
    } else {
        header("location: index.php");
    }
    ?>

</body>

</html>