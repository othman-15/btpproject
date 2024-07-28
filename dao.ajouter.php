<?php
require_once 'connexion.php';

if ($_POST) {
    
    $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
    $type = mysqli_real_escape_string($bdd, $_POST['type']);
    $description = mysqli_real_escape_string($bdd, $_POST['description']);
    $date_debut = mysqli_real_escape_string($bdd, $_POST['date_debut']);
    $date_fin = mysqli_real_escape_string($bdd, $_POST['date_fin']);
    $localisation = mysqli_real_escape_string($bdd, $_POST['localisation']);
    $equipe = mysqli_real_escape_string($bdd, $_POST['equipe']);
    $budget = !empty($_POST['budget']) ? mysqli_real_escape_string($bdd, $_POST['budget']) : 'NULL';
    $statut = mysqli_real_escape_string($bdd, $_POST['statut']);

  
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "C:/xampp/htdocs/mini-projet/image/";
        $image = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          
        } else {
            echo "Désolé, il y a eu une erreur lors de l'upload de votre image.";
            exit;
        }
    } else {
        echo "Erreur lors de l'upload de l'image.";
        exit;
    }

    
    $sql = "INSERT INTO projet (nom, type, description, date_debut, date_fin, localisation, equipe, budget, statut, image) 
            VALUES ('$nom', '$type', '$description', '$date_debut', '$date_fin', '$localisation', '$equipe', $budget, '$statut', '$image')";
    
    $resultat = mysqli_query($bdd, $sql);

    if ($resultat) {
        header("Location:home.php");
    } else {
        echo "Erreur d'enregistrement du projet : " . mysqli_error($bdd) . "<br>";
        echo "<a href='index.php'>Retour à la page d'accueil</a>";
    }

    mysqli_close($bdd);
}
?>
