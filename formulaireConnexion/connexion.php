<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
    <form action="verifierConnexion.php" method="POST">
        <div class='form-element'> 
            <label>Log In</label>
            <input type='text' name="login">
        </div>
        <div class='form-element'> 
            <label>Password</label>
            <input type='password' name="password">
        </div>
        <input type='submit' value='Connect' id='btn'>
    </form>
    
</body>
</html>