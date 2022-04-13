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
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
</head>

<body>
    <?php

    require('header.php');
    ?>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="identifiant" name="identifiant" placeholder="identifiant"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input type="submit" value="Connexion" name="submit" class="btn btn-primary btn-block"></div>
        </form>
        <div style="margin-top:42px;"></div>
        <?php
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        $submit = $_POST['submit'];
        if ($submit == "Connexion") {
            $sqlQuery = "SELECT * FROM compte ";
            $connectionStatement = $mysqlClient->prepare($sqlQuery);
            $connectionStatement->execute();
            $connection = $connectionStatement->fetchAll();
            for ($k = 0; $k < count($connection); $k++) {

                if ($connection[$k]['identifiant'] == $identifiant && $connection[$k]['password'] == $password) {
                    session_start();
                    $_SESSION['username'] = $identifiant;
                    header("Location: config-admin.php");
                    exit;
                } else {
                    echo '<script>alert("mauvais mdp ou identifiant")</script>';
                    unset($submit);
                }
            }
        }
        ?>
    </div>
    <?php include_once('footer.php'); ?>

</body>

</html>
