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
        $logins = ["HarryDu93"=>"giny<3", "HermioneDu64"=>"pattenrond", "RonDu33"=>"tfcForEver", "newneri"=>"kobee"];
        foreach($logins as $user => $mdp){
            if($_POST["login"] == $user && $_POST["password"] == $mdp){
                echo "Logging in";
                header('Location: accueil.php');
                exit();
            }
        } 
        header('Location: connexion.php');
    ?>
</body>
</html>