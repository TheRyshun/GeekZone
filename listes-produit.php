<!DOCTYPE html>
<html lang="en">

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
    <?php require('header.php') ?>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <?php if ($_GET['choix_boutique'] == "") {
                    echo '<h2 class="text-center">Vous n\'avez pas séléctionné de boutique !</h2>';
                } else {
                    echo '<h2 class="text-center">Listes Produits</h2>';
                } ?>
                <p class="text-center">Retrouve touts les produits de la catégorie <?php echo $_GET['libelle'] ?></p>
            </div>
            <div class="row justify-content-center features">

                <?php
                $choix_boutique = $_GET["choix_boutique"];
                $name = $_GET["libelle"];
                $sqlQuery = 'SELECT * FROM produit WHERE categorie = ' . $_GET["id"];
                $lstProduitStatement = $mysqlClient->prepare($sqlQuery);
                $lstProduitStatement->execute();
                $lstProduit = $lstProduitStatement->fetchAll();

                foreach ($lstProduit as $lstProduit) {
                    $idprod =  $lstProduit['produit_id'];
                    $libelle = $lstProduit['nom'];
                    $prix = $lstProduit['prix'];
                    $image = $lstProduit['image'];

                    $sqlQuery = 'SELECT quantité FROM stock WHERE id_produit = ' . $idprod . ' AND id_boutique =' . $_GET["id"];
                    $stockStatement = $mysqlClient->prepare($sqlQuery);
                    $stockStatement->execute();
                    $stock = $stockStatement->fetchAll();

                ?>
                <?php
                    $enStock = $stock[0]['quantité'];
                    if ($enStock == "") {
                        $enStock = 0;
                    }
                    $container = '<div class="col-sm-6 col-md-5 col-lg-4 item">
                                    <div class="box"><img height="100px"src="images/' . $_GET["libelle"] . '/' . $image . '">
                                        <h3 class="name">' . $libelle . '</h3>
                                        <h3 class="name">' . $prix . '€</h3>
                                        <h3 class="name">En stock : ' . $enStock . '</h3>
                                        <a href="produit.php?id_catégorie=' . $idprod . '&choix_boutique=' . $choix_boutique . '&libelle=' . $name . '" class="learn-more" style="color:#00b760;">Afficher »</a>
                                    </div>
                                  </div>';
                    echo $container;

                    $compteur++;
                }
                ?>
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