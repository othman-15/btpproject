<?php
require_once 'connexion.php';

if ($_POST) {
    $id = $_POST['id'];

    
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $sql = "DELETE FROM projet WHERE id = $id";

        if (mysqli_query($bdd, $sql)) {
            echo "Projet supprimé avec succès.";
        } else {
            echo "Erreur: " . mysqli_error($bdd);
        }
    } else {
        echo "ID de projet invalide.";
    }

    mysqli_close($bdd);

   
    header("Location: home.php");
    exit;
} else {
    echo "Méthode non autorisée.";
}
?>
