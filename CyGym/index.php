<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyGym - Akhatar Abdelhamid</title>
    <link rel="stylesheet" href="styles/main_style.css">
</head>

<body>
    <?php
    session_start();
    $_SESSION["usertype"] = "";
    $_SESSION["username"] = "";
    $_SESSION["pagename"] = "index";
    $_SESSION["erreur"] = "";
    include 'components/header.php';
    ?>
    <div class="accueil">
        <h1>
            Welcome to <span>CyGym</span> <br> From the smartest to the strongest.
        </h1>
        <p>Building strong brains and strong bodys since 1983 <br> </p>
        <form action="requestsForms/resultatsRecherche.php" method="POST">
            <input type="text" class="search__input" placeholder="Search for a class" name="search">
            <input type="submit" class="search__button" value='Search'>
        </form>
    </div>
</body>

</html>