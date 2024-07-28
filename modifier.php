<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>mini projet</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        .container-form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .btn-submit {
            width: 100%;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">mini projet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="add.php">ajouter projet</a></li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="logout.php">Déconnexion</a>
                </form>
            </div>
        </div>
    </nav>

<?php
require_once 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM projet WHERE id = $id";
    $result = mysqli_query($bdd, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Projet non trouvé.";
        exit;
    }
} else {
    echo "ID de projet non fourni.";
    exit;
}

mysqli_close($bdd);
?>

    <div class="container-form mt-5">
        <div class="card card-4">
            <div class="card-body">
                <h2 class="title form-title">Modifier Projet</h2>
                <form method="POST" action="dao.modifier.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="input-group">
                        <label class="label">Nom du Projet*</label>
                        <input class="form-control" type="text" name="nom" value="<?php echo $row['nom']; ?>" required>
                    </div>
                    <div class="input-group">
                        <label class="label">Type de Projet*</label>
                        <select class="form-control" name="type" required>
                            <option disabled="disabled">Choisissez l'option</option>
                            <option value="Construction" <?php if($row['type'] == 'Construction') echo 'selected'; ?>>Construction</option>
                            <option value="Rénovation" <?php if($row['type'] == 'Rénovation') echo 'selected'; ?>>Rénovation</option>
                            <option value="Génie Civil" <?php if($row['type'] == 'Génie Civil') echo 'selected'; ?>>Génie Civil</option>
                            <option value="Autre" <?php if($row['type'] == 'Autre') echo 'selected'; ?>>Autre</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="label">Description*</label>
                        <textarea class="form-control" name="description" rows="4" required><?php echo $row['description']; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Date de Début*</label>
                                <input class="form-control" type="date" name="date_debut" value="<?php echo $row['date_debut']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Date de Fin*</label>
                                <input class="form-control" type="date" name="date_fin" value="<?php echo $row['date_fin']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="label">Localisation*</label>
                        <input class="form-control" type="text" name="localisation" value="<?php echo $row['localisation']; ?>" required>
                    </div>
                    <div class="input-group">
                        <label class="label">Équipe Responsable</label>
                        <input class="form-control" type="text" name="equipe" value="<?php echo $row['equipe']; ?>">
                    </div>
                    <div class="input-group">
                        <label class="label">Budget (optionnel)</label>
                        <input class="form-control" type="number" name="budget" value="<?php echo $row['budget']; ?>">
                    </div>
                    <div class="input-group">
                        <label class="label">Statut du Projet*</label>
                        <select class="form-control" name="statut" required>
                            <option disabled="disabled">Choisissez l'option</option>
                            <option value="En cours" <?php if($row['statut'] == 'En cours') echo 'selected'; ?>>En cours</option>
                            <option value="Terminé" <?php if($row['statut'] == 'Terminé') echo 'selected'; ?>>Terminé</option>
                            <option value="Planifié" <?php if($row['statut'] == 'Planifié') echo 'selected'; ?>>Planifié</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="label">Image du Projet*</label>
                        <input class="form-control" type="file" name="image">
                    </div>

                    <div class="py-3 pb-4 d-flex justify-content-center w-100">
                        <button class="btn btn-outline-dark btn-submit" type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
