<?php
session_start();
require_once('database/connex.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id']; // ID de l'utilisateur connecté

    // Validation minimale des données - Vous devez effectuer des vérifications plus approfondies

    // Requête d'insertion dans la base de données pour ajouter un nouvel article
    $query = "INSERT INTO articles (title, content, author_id, date_creation) VALUES ('$title', '$content', '$author_id', NOW())";

    if (mysqli_query($connex, $query)) {
        // Rediriger vers la page d'accueil après l'insertion de l'article
        header("Location: home.php");
        exit();
    } else {
        echo "Erreur lors de l'insertion de l'article : " . mysqli_error($connex);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rédiger un Article</title>
</head>

<body>
    <h2>Rédiger un Nouvel Article</h2>
    <form method="post" action="write_article.php">
        <label for="title">Titre :</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Contenu :</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>

        <input type="submit" value="Publier l'Article">
    </form>
</body>

</html>