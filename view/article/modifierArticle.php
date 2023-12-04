<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Modifier l'article</title>
</head>

<body>
    <form method="post" action="index.php?controller=article&function=modifier">
        <label> Titre :
            <input type="text" name="titre" placeholder="Titre">
        </label>
        <label> Contenu :
            <textarea name="contenu" placeholder="Contenu de l'article"></textarea>
        </label>
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
        <input type="submit" value="Modifier">
    </form>
</body>

</html>