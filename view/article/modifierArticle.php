<?php
$data['article_details'];
?>

<!-- Formulaire pour modifier l'article -->
<h2>Modifier l'article</h2>
<form method="post"
    action="index.php?controller=article&function=enregistrerModification&id=<?= $data["article_details"]['id_forum']; ?>">
    <!-- Champ caché pour l'ID de l'article -->
    <input type="hidden" name="id" value="<?= $data["article_details"]['id_forum']; ?>">

    <label for="titre">Titre de l'article</label><br>
    <input type="text" name="titre" value="<?= $data["article_details"]['titre']; ?>" required><br>

    <label for="article">Contenu de l'article</label><br>
    <textarea name="article" rows="5" cols="50" required><?= $data["article_details"]['article']; ?></textarea><br>

    <label for="date_">Date de l'article</label><br>
    <input type="date" name="date_" value="<?= $data["article_details"]['date_']; ?>"><br>

    <input type="submit" value="Enregistrer les modifications">
</form>