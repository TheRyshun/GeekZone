<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>geekzone</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/Features-Blue.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
</head>

<body>
    <?php require('header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-2"></div>
            <div class="col-md-4 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Nos choix</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Retrouver tout nos produits dans une listes de catégorie.</p>
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Nos Boutique</button>
                                    <div class="dropdown-menu" role="menu">
                                        <?php
                                        $choix_boutique = "";
                                        $sqlQuery = "SELECT * FROM boutique";
                                        $navBarStatement = $mysqlClient->prepare($sqlQuery);
                                        $navBarStatement->execute();
                                        $navBar = $navBarStatement->fetchAll();
                                        echo '<form method="post">';
                                        foreach ($navBar as $navBar) :
                                            $ville = $navBar['ville'];
                                            $id = $navBar['id'];
                                            echo  '<a class="dropdown-item" role="presentation"><input type="submit" name="transmis" value="' . $ville . '" /></a>';
                                        ?>
                                        <?php endforeach;
                                        echo '</form';

                                        ?>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="font-size:28px;"><em>Catégorie</em></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $compteur = 1;
                                            $choix_boutique = $_POST["transmis"];
                                            $sqlQuery = "SELECT * FROM categorie";
                                            $categorieStatement = $mysqlClient->prepare($sqlQuery);
                                            $categorieStatement->execute();
                                            $categorie = $categorieStatement->fetchAll();
                                            foreach ($categorie as $categorie) {
                                                $libelle = $categorie['libelle'];
                                                $container = '<tr><td style="font-size:18px;">' . $libelle . '<br><td><a href ="listes-produit.php?libelle=' . $libelle . '&choix_boutique=' . $choix_boutique . '&id=' . $compteur . '" class="btn"><input type="button" style="background-color:#00b760;" value="Slectionner" /></a></td>';
                                                echo $container;
                                                $compteur++;
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2"></div>
        </div>
    </div>
    </div>
    <div class="footer-dark" style="padding-bottom:36px;padding-top:20px;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>A propos</h3>
                        <ul>
                            <li><a href="#">Conditions général</a></li>
                            <li><a href="#">Mentions légal</a></li>
                            <li><a href="#">Cookie</a></li>
                            <li><a href="#">Donnée Personnel</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>GeekZone</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">GeekZone - 2022</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>