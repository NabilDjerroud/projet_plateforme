<?php
session_start();
require_once('database/connex.php');

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation minimale des données - Vous devriez effectuer des vérifications plus approfondies

    // Requête pour récupérer l'utilisateur depuis la base de données en fonction du nom d'utilisateur ou de l'email
    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($connex, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            // Mot de passe correct, connectez l'utilisateur en créant une session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirigez vers la page d'accueil
            header("Location: home.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Nom d'utilisateur ou email non trouvé dans la base de données
        echo "Nom d'utilisateur ou email incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
</head>

<body>
    <h2>Connexion</h2>
    <form method="post" action="login.php">
        <label for="username">Nom d'utilisateur ou email :</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se Connecter">
    </form>
</body>

</html>