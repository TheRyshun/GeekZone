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
                    <h2 class="text-center">Modification d'une boutique</h2>

                </div>
                <div class="dropdown" style="text-align: center;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">Nos Boutique</button>
                    <div class="dropdown-menu" role="menu">
                        <?php
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
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-map-marker icon" style="color:#007a3d;"></i>
                            <h3 class="name">Adresse</h3><input type="text" name="new-rue" placeholder="R U E">
                            <input type="text" name="new-cp" placeholder="C P">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-clock-o icon" style="color:#007a3d;"></i>
                            <h3 class="name">Horraires</h3>
                            <input type="text" name="new-horaires">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-phone icon" style="color:#007a3d;"></i>
                            <h3 class="name">Téléphone</h3>
                            <input type="text" name="new-phone">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box"><i class="fa fa-photo icon" style="color:#007a3d;"></i>
                            <h3 class="name">Image</h3><input type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group"><button class="btn btn-dark btn-block" name="envoi" style="background-color:#00b760;" type="submit">Modifier</button></div>
            </form>
        </div>
    </div>
    <?php
    $choix_boutique = $_POST['transmis'];
    if (isset($_POST['transmis'])) {
        $sqlQuery = "SELECT * FROM boutique WHERE ville = $choix_boutique";
        $verifStatement = $mysqlClient->prepare($sqlQuery);
        $verifStatement->execute();
        $verif = $verifStatement->fetchAll();
        if (isset($_POST['envoi'])) {
            foreach ($verif as $verif) {
                $new_rue = $_POST['new-rue'];
                $new_cp = $_POST['new-cp'];
                $new_horaires = $_POST['new-horaires'];
                $new_phone = $_POST['new-phone'];
                $sqlQuery = "UPDATE boutique SET rue = '$new_rue', cp = '$new_cp', horaires = '$new_horaires', telephone= '$new_phone' WHERE ville = '$verif[0]'";
                $loginStatement = $mysqlClient->prepare($sqlQuery);
                $loginStatement->execute();
                $login = $loginStatement->fetchAll();
                echo '<script>alert("Modification Acceptée")</script>';
            }
        }
    }
    ?>

    <?php include_once('footer.php'); ?>
</body>

</html>