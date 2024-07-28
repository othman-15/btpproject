<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miniprojet</title>
    
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <form action="dao.auth.php" method="POST" class="login-form">
            <h2>Connexion</h2>
            <div class="form-group">
                <label for="username">email</label>
                <input type="text"  name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password"  name="pwd" required>
            </div>
            <button type="submit">Se connecter</button>
            <p>Vous n'avez pas de compte? <a href="inscription.php">Inscrivez-vous ici</a></p>
        </form>
    </div>
</body>

</html>
