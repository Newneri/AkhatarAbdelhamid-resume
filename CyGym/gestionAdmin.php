<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Administrateur</title>
    <link rel="stylesheet" href="styles/main_style.css">
    <link rel="stylesheet" href="styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    $_SESSION["pagename"] = "gestionAdmin";
    if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] == "admin") {
        include ("components/header.php");
        include ("components/formulaireAjProf.php");
        include ("components/formulaireAjSport.php");
    } else {
        header("location: index.php");
    }
    ?>

</body>

</html>