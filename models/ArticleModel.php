<?php
function enregistrer() {
    require('database/connex.php');

    // Récupération des données du formulaire
    $titre = mysqli_real_escape_string($connex, $_POST['titre']);
    $article = mysqli_real_escape_string($connex, $_POST['article']);
    $date_ = mysqli_real_escape_string($connex, $_POST['date_']);
    $user_id_utilisateur = mysqli_real_escape_string($connex, $_POST['user_id_utilisateur']);

    $sql = "INSERT INTO forum (titre, article, date_, user_id_utilisateur) VALUES ('$titre', '$article', '$date_', '$user_id_utilisateur')";

    if(mysqli_query($connex, $sql)) {
        header('location:index.php?controller=utilisateur&function=afficherFormulaire');
    } else {
        echo "Error: ".$sql."<br>".mysqli_error($connex);
    }
}

function supprimer($request) {
    require_once("database/connex.php");

    $id = mysqli_real_escape_string($connex, $request['id']);

    $sql = "DELETE FROM forum WHERE id_forum = '$id'";

    if(mysqli_query($connex, $sql)) {
        return true;
    } else {
        echo "Error: ".$sql."<br>".mysqli_error($connex);
    }
}

function getArticleDetails($article_id) {
    require('database/connex.php');
    // var_dump($article_id);

    $sql = "SELECT * FROM forum WHERE id_forum = '$article_id'";
    $result = mysqli_query($connex, $sql);


    if($result && mysqli_num_rows($result) > 0) {
        $article_details = mysqli_fetch_assoc($result);
        return $article_details;
    } else {
        return null;
    }
}

function mettreAJourArticle($article_id, $titre, $article, $date_) {
    require('database/connex.php');

    $article_id = mysqli_real_escape_string($connex, $article_id);
    // var_dump($article_id);
    $titre = mysqli_real_escape_string($connex, $titre);
    $article = mysqli_real_escape_string($connex, $article);
    $date_ = mysqli_real_escape_string($connex, $date_);

    $sql = "UPDATE forum SET titre = '$titre', article = '$article', date_ = '$date_' WHERE id_forum = '$article_id'";

    $result = mysqli_query($connex, $sql);
    if($result) {
        return true;
    } else {
        echo "Error updating record: ".mysqli_error($connex);
        return false;
    }
}
?>