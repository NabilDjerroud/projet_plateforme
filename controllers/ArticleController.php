<?php

function creerArticle() {
    render("/article/creerArticle.php");
    return afficherFormulaire();
}



function enregistrerArticle() {

    require("models\ArticleModel.php");
    enregistrer();
}


function supprimerArticle($request) {
    require_once('models/ArticleModel.php');
    supprimer($request);
    echo "Article supprimé avec succès";

}



function modifierArticle($request) {
    require_once('models/ArticleModel.php');
    $article_id = $_GET['id']; // Récupérez l'ID de l'article depuis l'URL

    $article_details = getArticleDetails($article_id);

    if($article_details) {
        render('/article/modifierArticle.php', ['article_details' => $article_details]);
    } else {
        echo "L'article que vous essayez de modifier n'existe pas.";
    }
}

function enregistrerModification($request) {
    require_once('models/ArticleModel.php');
    $article_id = $_GET['id']; // Récupérez l'ID de l'article depuis l'URL
    $article_id = $request['id'];
    var_dump($article_id);
    // Récupérer les données du formulaire

    $titre = $_POST['titre'];
    $article = $_POST['article'];
    $date_ = $_POST['date_'];

    // $article_id = $_POST['id_forum'];

    // Mettre à jour l'article
    $result = mettreAJourArticle($article_id, $titre, $article, $date_);


    if($result) {
        // var_dump($article_id, $titre, $article, $date_);
        echo "Article mis à jour avec succès.";
        header("Location: index.php?controller=utilisateur&function=afficherFormulaire");
        // Redirection vers une page appropriée ou action supplémentaire si nécessaire
    } else {
        echo "Erreur lors de la mise à jour de l'article.";
    }
}
