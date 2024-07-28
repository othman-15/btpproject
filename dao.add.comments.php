<?php
session_start();
require_once 'connexion.php';

if ($_POST) {
    if (isset($_SESSION['id_user'])) {
        $id_projet = $_POST['id_projet'];
        $id_utilisateur = $_SESSION['id_user'];
        $commentaire = mysqli_real_escape_string($bdd, $_POST['commentaire']);

        $sql = "INSERT INTO commentaires (id_projet, id_user, commentaire) VALUES ('$id_projet', '$id_utilisateur', '$commentaire')";

        if (mysqli_query($bdd, $sql)) {
            header("Location: consulter.php?id=$id_projet");
        } else {
            echo "Erreur: " . mysqli_error($bdd);
        }
    } else {
        header('Location: login.php');
    exit();
    }
} else {
    echo "Méthode non autorisée.";
}
mysqli_close($bdd);
?>
