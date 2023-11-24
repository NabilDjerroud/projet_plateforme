<?php
function index()
{
    render("/nouvelutilisateur.php");
}

function newuser()
{
    echo "9";
    require('database/connex.php');
    echo "10";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérification et échappement des données POST
        $nom = isset($_POST['nom']) ? mysqli_real_escape_string($connex, $_POST['nom']) : '';
        $user_name = isset($_POST['user_name']) ? mysqli_real_escape_string($connex, $_POST['user_name']) : '';
        $date_naissance = isset($_POST['date_naissance']) ? mysqli_real_escape_string($connex, $_POST['date_naissance']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Génération du sel pour le mot de passe
        $salt = "B13L&@u'";
        $saltPassword = $password . $salt;

        // Hachage du mot de passe
        $password = isset($_POST['password']) ? password_hash($saltPassword, PASSWORD_BCRYPT, ['cost' => 10]) : '';

        // Vérifiez que toutes les données sont présentes
        if ($nom !== '' && $user_name !== '' && $date_naissance !== '' && $password !== '') {
            // Requête SQL avec des backticks pour les noms de colonnes
            $sql = "INSERT INTO utilisateur (`nom`, `user_name`, `password`, `date_naissance`) VALUES ('$nom', '$user_name', '$password', '$date_naissance')";

            // Exécution de la requête SQL
            if (mysqli_query($connex, $sql)) {
                echo "Success";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connex);
            }
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    } else {
        echo "Méthode non autorisée pour accéder à cette page.";
    }
}
?>