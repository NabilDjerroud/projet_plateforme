<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap">

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="login.php?controller=utilisateur&function=afficherconnexion">Se Connecter</a></li>
            <li><a href="index.php?controller=utilisateur&function=index">Nouvel Utilisateur</a></li>
            <li><a href="index.php?controller=utilisateur&function=afficherFormulaire">Liste des articles</a></li>
            <li><a href="logout.php">Déconnexion</a></li>


        </ul>
    </nav>

    
    <div class="container">
        <?php echo $content; ?>
    </div>
    <div class="article-list">
    </div>

</body>

</html>