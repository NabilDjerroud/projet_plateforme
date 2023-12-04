<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <form method="post" action="index.php?controller=utilisateur&function=newuser">
        <label> Nom :
            <input type="text" name="nom" placeholder="Nom">
        </label>
        <label> User Name :
            <input type="text" name="user_name" placeholder="Nom d'utilisateur">
        </label>
        <label> Mot de passe :
            <input type="password" name="password" placeholder="Mot de passe">
        </label>
        <label> Date de naissance :
            <input type="date" name="date_naissance" placeholder="Date de naissance">
        </label>
        <input type="submit" value="Soumettre">
    </form>
</body>

</html>