<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <form action="verifierConnexion.php" method="POST">
        <div class='form-element'> 
            <label>Pseudo</label>
            <input type='text' name="login">
        </div>
        <div class='form-element'> 
            <label>Mot de passe</label> 
            <input type='password' name="password">
        </div>
        <div class='form-element'> 
            <input type='radio' name="classe" id="eleve">
            <label for="eleve">Eleve</label>
            <input type='radio' name="classe" id="professeur">
            <label for="professeur">Professeur</label>
        </div>
        <input type='submit' value='Connexion' id='btn'>
    </form>
    <div class="register-btns">
        <a href="enregistrementProfesseurs/formulaire.php">Enregistrer professeur</a>
        <a href="enregistrementEleves/formulaire.php">Enregistrer eleve</a>
    </div>
</body>
</html>
