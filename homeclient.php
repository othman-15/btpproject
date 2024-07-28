<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>miniprojet</title>
   
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
   
    <link href="css/styles.css" rel="stylesheet" />
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
                    
                        <a class="btn btn-outline-dark" href="tp-xml.php">Tp xml </a>


                   
                </form>
              
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="logout.php">Déconnexion</a>
                </form>
            </div>
        </div>
    </nav>
    
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./assets/1.webp" alt="..." /></div>
                <div class="col-md-6">

                    <h1 class="display-5 fw-bolder">bienvenue sur notre application</h1>

                    <p class="lead">Bienvenue sur notre plateforme dédiée aux entreprises du BTP (Bâtiment et Travaux Publics), où l'innovation et l'excellence rencontrent la construction moderne. Nous sommes déterminés à offrir une expérience en ligne exceptionnelle, spécifiquement conçue pour répondre aux besoins uniques de l'industrie du BTP.</p>

                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Voir nos projets</h2>
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center">
                <?php
                require_once 'connexion.php';
                $sql = "SELECT * FROM projet";
                $resultat = mysqli_query($bdd, $sql);

                if ($resultat && mysqli_num_rows($resultat) > 0) {
                    while ($row = mysqli_fetch_assoc($resultat)) {
                ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                               
                                <img class="card-img-top" src="image/<?php echo $row['image']; ?>" alt="Image du projet" />
                               
                                <div class="card-body p-4">
                                    <div class="text-center">


                                        <h5 class="fw-bolder"><?php echo $row['nom']; ?></h5>

                                        <h5 class="fw-bolder"><?php echo $row['budget']; ?>mad</h5>

                                        <div><?php echo $row['statut']; ?> </div>
                                    </div>
                                </div>

                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <!-- /* <a class="btn btn-outline-dark mt-auto" href="consulter.php?nom=' . <?php $row['nom'] ?>' . "> Consulter le projet </a>*/ -->
                                        <form action="consulter.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-outline-dark mt-auto">Consulter le projet</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Aucun projet trouvé.";
                }
                mysqli_close($bdd);
                ?>
            </div>
        </div>
    </section>
   
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="js/scripts.js"></script>
</body>

</html>