<?php
session_start();
require_once('database/connex.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérifier si l'ID de l'article à modifier est présent dans l'URL (par exemple, ?id=1)
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: home.php");
    exit();
}

$article_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Vérifier si l'utilisateur a les autorisations pour modifier cet article
$query = "SELECT * FROM articles WHERE id = '$article_id' AND author_id = '$user_id'";
$result = mysqli_query($connex, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    // L'utilisateur n'a pas l'autorisation pour modifier cet article
    header("Location: home.php");
    exit();
}

// Récupérer les détails de l'article depuis la base de données
$article = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_title = $_POST['new_title'];
    $new_content = $_POST['new_content'];

    // Validation minimale des données - Vous devez effectuer des vérifications plus approfondies

    // Requête de mise à jour dans la base de données pour modifier l'article
    $update_query = "UPDATE articles SET title = '$new_title', content = '$new_content' WHERE id = '$article_id'";

    if (mysqli_query($connex, $update_query)) {
        // Rediriger vers la page d'accueil après la modification de l'article
        header("Location: home.php");
        exit();
    } else {
        echo "Erreur lors de la modification de l'article : " . mysqli_error($connex);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modifier l'Article</title>
</head>

<body>
    <h2>Modifier l'Article</h2>
    <form method="post" action="edit_article.php?id=<?php echo $article_id; ?>">
        <label for="new_title">Nouveau Titre :</label><br>
        <input type="text" id="new_title" name="new_title" value="<?php echo $article['title']; ?>" required><br><br>

        <label for="new_content">Nouveau Contenu :</label><br>
        <textarea id="new_content" name="new_content" rows="4"
            required><?php echo $article['content']; ?></textarea><br><br>

        <input type="submit" value="Enregistrer les Modifications">
    </form>
</body>

</html>