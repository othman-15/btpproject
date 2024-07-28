<?php
require_once 'connexion.php';

if ($_POST) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $localisation = $_POST['localisation'];
    $equipe = $_POST['equipe'];
    $budget = $_POST['budget'];
    $statut = $_POST['statut'];
    
    $sql = "UPDATE projet SET nom='$nom', type='$type', description='$description', date_debut='$date_debut', date_fin='$date_fin', localisation='$localisation', equipe='$equipe', budget='$budget', statut='$statut' WHERE id='$id'";

    if (mysqli_query($bdd, $sql)) {
        echo "Projet modifié avec succès.";
        header("Location: home.php");
    } else {
        echo "Erreur: " . mysqli_error($bdd);
    }

    mysqli_close($bdd);
} else {
    echo "Méthode non autorisée.";
}
?>
