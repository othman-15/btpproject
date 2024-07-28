
<?php
require_once 'connexion.php';

if ($_POST) {
    
    $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
    $prenom = mysqli_real_escape_string($bdd, $_POST['prenom']);
    $ville = mysqli_real_escape_string($bdd, $_POST['ville']);
    $email = mysqli_real_escape_string($bdd, $_POST['email']);
    $pwd = mysqli_real_escape_string($bdd, $_POST['pwd']);
   
   

    
    $sql = "INSERT INTO USERS (nom, prenom,ville,email,password) 
            VALUES ('$nom', '$prenom', '$ville', '$email','$pwd')";
    
    $resultat = mysqli_query($bdd, $sql);

    if ($resultat) {
        
        header("Location: login.php");
        exit(); 
    } else {
        echo "Erreur d'enregistrement du projet : " . mysqli_error($bdd) . "<br>";
        echo "<a href='inscription.php'>Retour à la page d'inscription</a>";
    }

    mysqli_close($bdd);
}
?>