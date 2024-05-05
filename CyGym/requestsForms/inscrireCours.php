<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription au cours de <?php echo $_GET["sport"] ?></title>
    <link rel="stylesheet" href="../styles/main_style.css">
    <link rel="stylesheet" href="../styles/forms_style.css">
</head>

<body>
    <?php
    session_start();
    include "../components/header.php";
    if (!isset($_SESSION["pagename"]) || $_SESSION["pagename"] != "search-page") {
        header("location: ../index.php");
    }
    ?>

    <div class="card">
        <?php echo "<h2>Sign to ". $_GET["sport"] ." lesson</h2>"; ?>
        <form action="enregistrerCours.php" method="POST" autocomplete="off">
            <div class="form-element">
                <input type="text" placeholder="first-name" name="fname" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="last-name" name="lname" required>
            </div>
            <div class="form-element">
                <input type="number" placeholder="number" name="number" required>
            </div>
            <div class="form-element">
                <input type="number" placeholder="age" name="age" required>
            </div>
            <?php echo "<input name='coursId' value=". $_GET["coursId"] ." hidden>"; ?>
            <?php echo "<input name='sport' value=". $_GET["sport"] ." hidden>"; ?>
            <input type="submit" value="Sign" class="loginButton" name="submit">
        </form>
    </div>
    <a class='btn-revenir' href='../index.php'> Revenir </a>
    <?php $_SESSION["pagename"] = "inscription-page";?>

</body>

</html>