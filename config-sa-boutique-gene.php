<?php
session_start();
if ($_SESSION["username"] != "superadmin") {
    header("Location: index.php");
}
?>
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
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
</head>

<body style="background-color:rgb(238,244,247);">
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="margin-top:-20px;">
            <div class="container"><a class="navbar-brand" href="config-admin.php" style="color:#00b760;"><img src="assets/img/logo_geek.jpg" style="width:100px;height:100px;"><em>GeekZone</em></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto"></ul>
                    <span class="navbar-text actions">
                        <form method="post" action="config-admin.php">
                            <input class="btn btn-light action-button" type="submit" name="deco" value="Déconnexion" style="background-color:#f26877;">
                        </form>
                        <?php
                        if ($_POST['deco'] == "Déconnexion") {
                            session_destroy();
                            header("Location: index.php");
                        }
                        ?>
                    </span>
                </div>
            </div>
        </nav>
    </div>
    <div class="highlight-clean" style="background-color:rgb(238,244,247);padding-bottom:100px;">
        <h2 class="text-center" style="padding-top:38px">Configuration des produits</h2><br><br>
        <div style="background-color:rgb(238,244,247);margin-bottom:69px;">
            <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color:rgb(238,244,247);">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="config-sa-boutique-new.php" class="btn btn-dark" type="button" style="background-color:#00b760;">Nouvelle boutique<br></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="config-sa-boutique-modif.php" class="btn btn-dark" type="button" style="background-color:#00b760;">Modifier une boutique<br></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="config-sa-boutique-supp.php" class="btn btn-dark" type="button" style="background-color:#00b760;">Supprimer une boutique<br></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="features-boxed"></div>
    <?php require('footer.php') ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>