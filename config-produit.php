<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
</head>

<body>
  <<?php require ("config.php"); ?>
  <div>
      <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="margin-top:-20px;">
          <div class="container"><a class="navbar-brand" href="#" style="color:#00b760;"><img src="assets/img/logo_geek.jpg" style="width:100px;height:100px;"><em>GeekZone</em></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
              <div
                  class="collapse navbar-collapse" id="navcol-1">
                  <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="register.html" style="background-color:#f26877;">Déconnexion</a></span></div>
  </div>
  </nav>
  </div>
  <div class="features-boxed">
      <div class="container">
          <div class="intro">
              <h2 class="text-center">Modification du stock</h2>
              <div class="card">
                  <form method="post" class="search-form">
                        <!-- name="identifiant" placeholder="Identifiant" -->
                        <!-- name="submit" value="Connexion" type="submit" -->
                      <form class="search-form">
                          <div class="input-group">
                              <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" name="identifiant" placeholder="Identifiant">
                              <div class="input-group-append"><button name="submit" value="Connexion" type="submit" class="btn btn-light" type="button">Search </button></div>
                          </div>
                      </form>
              </div>
          </div>
          <!-- $sqlQuery = "SELECT quantité FROM stock WHERE id_produit = $verif['id_produit']"; -->

          <div class="row justify-content-center features">
              <div class="col-sm-6 col-md-5 col-lg-4 item">
                 <?php
                 $identifiant = $_POST['identifiant'];
                 $submit = $_POST['submit'];
                 if ($submit == "Connexion") {
                     $sqlQuery = "SELECT nom from produit WHERE nom LIKE '$identifiant%'";
                     $verifStatement = $mysqlClient->prepare($sqlQuery);
                     $verifStatement->execute();
                     $verif = $verifStatement->fetchAll();
                     foreach ($verif as $verif) {
                       $id = $verif['produit_id'];
                       $comp = 0;
                       $sqlQuery1 = "SELECT * FROM stock WHERE id_produit = $verif['produit_id']";
                       $stockStatement = $mysqlClient->prepare($sqlQuery1);
                       $stockStatement->execute();
                       $stock = $stockStatement->fetchAll();
                       $nom = $verif['nom'];
                       $lestocks = $stock[$comp]['quantité'];
                       $container = '<div class="box"><i class="fa fa-cube icon" style="color:#00b760;"></i>
                                     <h3 class="name">'.$nom.'</h3>
                                     <p class="description">Stock Actuel : '.$lestocks.'</p><input placeholder="2" type="number">
                                     <div class="col" style="padding-top:40px;"><button class="btn btn-dark" type="button" style="background-color:#00b760;">M O D I F I E R</button></div>
                                     </div>';
                       echo $container;
                       $comp++;
                     }
                    }
                 ?>
              </div>
          </div>
      </div>
  </div>
    <div class="footer-dark" style="padding-bottom:18px;padding-top:5px;"></div>
    <?php include_once('footer.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>
