<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <form action="dao.inscription.php" method="POST" class="inscription-form">
            <h2>Inscription</h2>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text"  name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text"  name="prenom" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" name="ville" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="text"  name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password"  name="pwd" required>
            </div>
            <button type="submit">S'inscrire</button>
            <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous ici</a></p>
        </form>
    </div>
</body>

</html>
