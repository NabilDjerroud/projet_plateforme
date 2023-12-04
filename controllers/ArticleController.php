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
    delete($request);
    render('/article/creerArticle.php');
}
