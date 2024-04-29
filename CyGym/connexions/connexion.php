<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">
    <title>Connexion Administrateur</title>
</head>
<body>
    <?php
        session_start();
        $_SESSION["pagename"] = "login-page";
        $_SESSION["usertype"] = "";
        $_SESSION["username"] = "";
        include "../components/header.php";
        include "../components/formulaireConnexion.php";        
    ?>
</body>
</html>