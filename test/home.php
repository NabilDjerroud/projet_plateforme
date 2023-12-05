<?php
session_start();
require_once('database/connex.php');

// Récupération des articles depuis la base de données
$query = "SELECT * FROM articles ORDER BY date_creation DESC";
$result = mysqli_query($connex, $query);

$articles = []; // Initialise un tableau pour stocker les articles récupérés

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $articles[] = $row; // Ajoute chaque article au tableau des articles
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil</title>
</head>

<body>
    <h2>Articles</h2>

    <?php if (!empty($articles)): ?>
        <!-- Boucle pour afficher les articles -->
        <?php foreach ($articles as $article): ?>
            <div>
                <h3>
                    <?php echo $article['title']; ?>
                </h3>
                <p>Auteur :
                    <?php echo $article['author']; ?>
                </p>
                <p>Date :
                    <?php echo $article['date_creation']; ?>
                </p>
                <p>
                    <?php echo $article['content']; ?>
                </p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</body>

</html>