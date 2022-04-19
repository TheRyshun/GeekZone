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
    <?php include_once('header.php'); ?>
    <?php
    $id = $_GET['id'];
    if ($id == 0) {
        $id = 1;
    }
    $sqlQuery = "SELECT * FROM boutique WHERE id = $id";
    $boutiqueStatement = $mysqlClient->prepare($sqlQuery);
    $boutiqueStatement->execute();
    $boutique = $boutiqueStatement->fetchAll();
    foreach($boutique as $boutique):
        ?>
    <?php
        $horraire = $boutique['horaires'];
        $telephone = $boutique['telephone'];
        $adresse = $boutique['rue'] . ", " . $boutique['cp'] . " " . $boutique['ville'];
        $ville =$boutique['ville'];
        $image = $boutique['image'];
    ?>
    <div class="features-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php echo $ville ?></h2>
                <p class="text-center"><img width="95%" height="90%" src="images/boutiques/<?php echo $image ?>" alt="error"></p>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-map-marker icon" style="color:#007a3d;"></i>
                        <h3 class="name">Adresse</h3>
                        <p class="description"><?php echo $adresse ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-clock-o icon" style="color:#007a3d;"></i>
                        <h3 class="name">Horraires</h3>
                        <p class="description"><?php echo $horraire ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-phone icon" style="color:#007a3d;"></i>
                        <h3 class="name">Téléphone</h3>
                        <p class="description"><?php echo $telephone ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>
<?php endforeach ?>