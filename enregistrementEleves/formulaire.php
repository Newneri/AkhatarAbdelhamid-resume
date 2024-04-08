<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="ecritureDonnees.php" method="POST">
        <div class='form-element'> 
            <label>Nom</label>
            <input type='text' name="nom">
        </div>
        <div class='form-element'> 
            <label>Prenom</label>
            <input type='text' name="prenom">
        </div>
        <div class='form-element'> 
            <label>Date de Naissance</label>
            <input type='date' name="dateNaissance">
        </div>
        <div class='form-element'> 
            <label>Adresse</label>
            <input type='text' name="adresse">
        </div>
        <div class='form-element'> 
            <label>Nb points</label>
            <input type='number' name="nbPoints">
        </div>
        <div class='form-element'> 
            <label>Pseudo</label>
            <input type='text' name="pseudo">
        </div>
        <div class='form-element'> 
            <label>Mot de passe</label>
            <input type='password' name="mdp">
        </div>
        <input type='submit' value='Connect' id='btn'>
    </form>
</body>
</html>
