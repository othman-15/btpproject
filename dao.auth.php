<?php
require_once 'connexion.php';

if ($_POST) {
    $email = mysqli_real_escape_string($bdd, $_POST['email']);
    $pwd = mysqli_real_escape_string($bdd, $_POST['pwd']);
   
   
    $sql = "SELECT * FROM USERS WHERE email='$email' AND password='$pwd'";
    
    $resultat = mysqli_query($bdd, $sql);
    if ($email == "admin" && $pwd="admin") {
        session_start();
        $_SESSION['login'] = $email;
      
        header("Location: home.php");
    } 
    if ($resultat && mysqli_num_rows($resultat) > 0) {
      
        session_start();
        $user = mysqli_fetch_assoc($resultat);
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        
        $_SESSION['login'] = $email;
        
        
        header("Location: homeclient.php");
        exit(); 
    } else {
        
        echo "Adresse e-mail ou mot de passe incorrect.<br>";
        echo "<a href='login.php'>Retour à la page de connexion</a>";
    }

    mysqli_close($bdd);
}
?>
