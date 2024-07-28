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

        .comment-section {
            margin-top: 30px;
        }

        .comment {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .comment-author {
            font-weight: bold;
        }

        .comment-date {
            font-size: 0.9em;
            color: #999;
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="homeclient.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">contact us</a></li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="">Tp xml </a>
                </form>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="logout.php">Déconnexion</a>
                </form>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <?php
        require_once 'connexion.php';
        if ($_GET) {
            extract($_GET);
            $sql = "SELECT * FROM projet WHERE id='$id'";
            $resultat = mysqli_query($bdd, $sql);
        }
        if ($resultat && mysqli_num_rows($resultat) > 0) {
            while ($row = mysqli_fetch_assoc($resultat)) {
        ?>
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="image/<?php echo $row['image']; ?>" alt="..." /></div>
                        <div class="col-md-6">
                            <h1 class="display-5 fw-bolder"><?php echo $row['nom']; ?></h1>
                            <p class="lead"><?php echo $row['description']; ?></p>
                            <p>Statut: <?php echo $row['localisation']; ?></p>
                            <p>Budget: <?php echo $row['budget']; ?> MAD</p>
                            <p>Statut: <?php echo $row['statut']; ?></p>
                            <p>Date de départ: <?php echo $row['date_debut']; ?></p>
                            <p>Date de fin: <?php echo $row['date_fin']; ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "Aucun projet trouvé.";
        }
        ?>

        
        <div class="container-form">
            <form action="dao.add.comments.php" method="post">
                <div class="form-group">
                    <label for="commentaire">Ajouter un commentaire :</label>
                    <textarea class="form-control" id="commentaire" name="commentaire" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Ajouter</button>
                <input type="hidden" name="id_projet" value="<?php echo htmlspecialchars($id); ?>">
            </form>
        </div>

        
        <div class="container comment-section">
            <h3>Commentaires</h3>
            <?php
            $sql_comments = "SELECT c.commentaire, u.nom, u.prenom 
                             FROM commentaires c 
                             JOIN users u ON c.id_user = u.id 
                             WHERE c.id_projet = '$id' 
                             ";
            $result_comments = mysqli_query($bdd, $sql_comments);

            if ($result_comments && mysqli_num_rows($result_comments) > 0) {
                while ($comment = mysqli_fetch_assoc($result_comments)) {
            ?>
                    <div class="comment">
                        <p class="comment-author"><?php echo $comment['prenom'] . ' ' . $comment['nom']; ?></p>
                       
                        <p><?php echo $comment['commentaire']; ?></p>
                    </div>
            <?php
                }
            } else {
                echo "<p>Aucun commentaire trouvé.</p>";
            }

            mysqli_close($bdd);
            ?>
        </div>
    </section>

    <footer class="py-5 bg-dark mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
