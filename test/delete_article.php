<?php
session_start();
require_once('database/connex.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Vérifier si l'ID de l'article à supprimer est présent dans l'URL (par exemple, ?id=1)
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: home.php");
    exit();
}

$article_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Vérifier si l'utilisateur a les autorisations pour supprimer cet article
$query = "SELECT * FROM articles WHERE id = '$article_id' AND author_id = '$user_id'";
$result = mysqli_query($connex, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    // L'utilisateur n'a pas l'autorisation pour supprimer cet article
    header("Location: home.php");
    exit();
}

// Suppression de l'article de la base de données
$delete_query = "DELETE FROM articles WHERE id = '$article_id'";

if (mysqli_query($connex, $delete_query)) {
    // Rediriger vers la page d'accueil après la suppression de l'article
    header("Location: home.php");
    exit();
} else {
    echo "Erreur lors de la suppression de l'article : " . mysqli_error($connex);
}
?>