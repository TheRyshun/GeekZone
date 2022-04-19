<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
if ($_SESSION["username"] != "superadmin") {
    header("Location: index.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>geekzone</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
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

<body style="background-color:rgb(241,247,252);">

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
    <div class="register-photo" style="margin-bottom:99px">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center">Modifier le mot de passe</h2>
                <div class="form-group"><input class="form-control" type="text" name="identifiant" placeholder="Identifiant"></div>
                <div class="form-group"><input class="form-control" type="password" name="new-password" placeholder="Nouveau mot de passe"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" name="envoi" style="background-color:#00b760;" type="submit">Modifier</button></div>
            </form>
        </div>
    </div>
    <div style="padding-bottom:42px"></div>
    <?php
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    if (isset($_POST['envoi'])) {
        $sqlQuery = "SELECT * FROM compte";
        $verifStatement = $mysqlClient->prepare($sqlQuery);
        $verifStatement->execute();
        $verif = $verifStatement->fetchAll();
        for ($k = 0; $k < count($verif); $k++) {
            if ($verif[$k]['identifiant'] == $identifiant) {
              $identifiant = $_POST['identifiant'];
              $newmdp = $_POST['new-password'];
                $sqlQuery = "UPDATE compte SET password = $newmdp WHERE identifiant = '$identifiant'";
                $loginStatement = $mysqlClient->prepare($sqlQuery);
                $loginStatement->execute();
                $login = $loginStatement->fetchAll();
                echo '<script>alert("Modification Acceptée")</script>';
            }
        }
    }
    ?>
    <?php require ('footer.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Contact-Form-v2-Modal--Full-with-Google-Map.js"></script>
</body>

</html>
