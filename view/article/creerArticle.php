<!-- article/creerArticle.php -->
<?php
require('library/checksession.php');

?>
    

<h2>Créer un nouvel article</h2>
<form method="post" action="index.php?controller=article&function=enregistrerArticle">
    <!-- Formulaire pour la création d'un article -->
    <label for="titre">Veuillez insérer le titre ici</label>
    <br>
    <input type="text" name="titre" placeholder="Titre de l'article" required>
    <br>
    <label for="article">Veuillez écrire votre article dans le champs ci dessous</label>
    <br>
    <textarea name="article" placeholder="Contenu de l'article" rows="5" cols="50" required></textarea>
    <br>
    <label for="date_">veuillez entrer la date de votre article</label>
    <br>
    <input type="date" name="date_">
    <input type="hidden" name="user_id_utilisateur" value="<?= $_SESSION['id']; ?>">
    <br>
    <input type="submit" value="Créer l'article">
</form>
</body>

</html>