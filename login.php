<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <h2>Veuillez insérer vos identifiants pour vous connecter </h2>

    <form method="post" action="index.php?controller=utilisateur&function=verifierConnexion">
        <label for="user_name">Nom d'utilisateur ou email :</label><br>
        <input type="text" id="user_name" name="user_name" required><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se Connecter">
    </form>

</body>

</html>