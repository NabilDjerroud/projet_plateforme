<?php

function index() {
    //require_once (VIEW_DIR."/base/welcome.php");

    render('/base/base.php');
    require('database/connex.php');

    $sql = "SELECT forum.id_forum, forum.titre, forum.article, forum.date_, utilisateur.nom, forum.user_id_utilisateur 
        FROM forum 
        INNER JOIN utilisateur ON forum.user_id_utilisateur = utilisateur.id_utilisateur 
        ORDER BY forum.date_";

    $result = mysqli_query($connex, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="article-container">
                <h3>
                    <?= $row['titre']; ?>
                </h3>
                <p>
                    <?= $row['article']; ?>
                </p>
                <p class="article-date">
                    <?= $row['date_']; ?>
                </p>
                <p><strong>Auteur de l'article : </strong>
                    <?= $row['nom'] ? $row['nom'] : "Auteur non défini"; ?>
                </p>
                <hr>
            </div>
            <?php
        }
    } else {
        echo "Aucun article trouvé.";
    }

}

function voirLogin() {
    render('/login.php');
}

?>