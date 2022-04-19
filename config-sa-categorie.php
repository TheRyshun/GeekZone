<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION["username"] != "superadmin") {
    header("Location: index.php");
}
?>

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

    <?php include_once('config.php'); ?>

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
    <div class="features-boxed">
        <div class="container">
            <form method="post">
                <div class="intro">
                    <h2 class="text-center">CONFIG CATEGORIE</h2>
                </div>
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"></i>
                            <h3 class="name">Nouvelle catégorie</h3>
                            <input type="text" placeholder="nom de la catégorie" name="new-categorie">
                        </div>
                    </div>

                </div>
                <div class="form-group"><button class="btn btn-dark btn-block" name="envoi" style="background-color:#00b760;" type="submit">Modifier</button></div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['envoi'])) {
        $new_categorie = $_POST['new-categorie'];
        $sqlQuery = "INSERT INTO categorie (libelle) VALUES ('$new_categorie')";
        $loginStatement = $mysqlClient->prepare($sqlQuery);
        $loginStatement->execute();
        $login = $loginStatement->fetchAll();
        echo '<script>alert("Modification Acceptée")</script>';
    }
    ?>

    <?php include_once('footer.php'); ?>
</body>

</html>