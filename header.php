<?php
try {
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=geekzone;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
?>
<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="margin-top:-20px;">
        <div class="container"><a class="navbar-brand" href="index.php" style="color:#00b760;"><img src="assets/img/logo_geek.jpg" style="width:100px;height:100px;" alt="error"><em>GeekZone</em></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="categorie.php">Catégorie</a></li>
                    <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Nos Boutiques</a>
                        <div class="dropdown-menu" role="menu">
                            <?php
                            $sqlQuery = "SELECT * FROM boutique";
                            $navBarStatement = $mysqlClient->prepare($sqlQuery);
                            $navBarStatement->execute();
                            $navBar = $navBarStatement->fetchAll();
                            foreach ($navBar as $navBar) :
                        ?>
                                <?php
                                $ville = $navBar['ville'];
                                $id = $navBar['id'];
                                echo  '<a class="dropdown-item" role="presentation" href="nos_boutiques.php?id=' . $id . '">' . $ville . '</a>';
                                ?>
                            <?php endforeach ?>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php">Contact</a></li>
                  </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="login.php" style="background-color:#00b760;">SE CONNECTER<br></a></span></div>
            </div>
        </div>
    </nav>
</div>
