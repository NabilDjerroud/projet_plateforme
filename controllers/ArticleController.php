<?php

function creerArticle()
{
    render("/article/creerArticle.php");
    return afficherFormulaire();
}



function enregistrerArticle()
{

    require("models\ArticleModel.php");
    enregistrer();
}


function supprimerArticle($request)
{
    require_once('models/ArticleModel.php');
    supprimer($request);
    echo "Article supprimé avec succès";

}



function modifierArticle($request)
{
    require_once('models/ArticleModel.php');
    $article_id = $_GET['id']; // Récupérez l'ID de l'article depuis l'URL
    var_dump($article_id);

    $article_details = getArticleDetails($article_id);

    if ($article_details) {
        render('/article/modifierArticle.php', ['article_details' => $article_details]);
    } else {
        echo "L'article que vous essayez de modifier n'existe pas.";
    }
}

function enregistrerModification($request)
{
    // Récupération de l'ID de l'article depuis le tableau $request
    $article_id = $request['id']; // Assurez-vous que le nom correspond à l'ID dans le tableau $request

    // Récupérer les autres données du formulaire
    $titre = $_POST['titre'];
    $article = $_POST['article'];
    $date_ = $_POST['date_'];
    // $user_id_utilisateur = $_POST['user_id_utilisateur']; // S'il est nécessaire de récupérer l'utilisateur lié à l'article

    // Assurez-vous que l'ID de l'article a été correctement récupéré
    var_dump($article_id);

    // Mettre à jour l'article
    $result = mettreAJourArticle($article_id, $titre, $article, $date_);

    if ($result) {
        echo "Article mis à jour avec succès.";
        // Redirection ou autre action après la mise à jour
    } else {
        echo "Erreur lors de la mise à jour de l'article.";
    }
}