<?php



function index()
{
    render("/nouvelUtilisateur.php");
}

function newuser()
{
    require('database/connex.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérification et échappement des données POST
        $nom = isset($_POST['nom']) ? mysqli_real_escape_string($connex, $_POST['nom']) : '';
        $user_name = isset($_POST['user_name']) ? mysqli_real_escape_string($connex, $_POST['user_name']) : '';
        $date_naissance = isset($_POST['date_naissance']) ? mysqli_real_escape_string($connex, $_POST['date_naissance']) : '';
        $password = isset($_POST['password']) ? mysqli_real_escape_string($connex, $_POST['password']) : '';
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

function afficherconnexion()
{
    render('/login.php');

}

function verifierConnexion()
{
    require_once("models/UserModel.php");
    return authentification();
}


function afficherFormulaire()
{
    require('lib/checksession.php');
    require('database/connex.php');

    $sql = "SELECT id_forum, titre, article, date_, user_id_utilisateur FROM forum INNER JOIN utilisateur on user_id_utilisateur = id_utilisateur ORDER BY date";

    $result = mysqli_query($connex, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Titre : " . $row['titre'] . "<br>";
            echo "Article : " . $row['article'] . "<br>";
            echo "Date : " . $row['date_'] . "<br>";
            echo "Utilisateur : " . $row['user_id_utilisateur'] . "<br>";
            echo "<hr>";
        }
        if ($_SESSION['id_utilisateur'] == $row['user_id_utilisateur']) {

            ?>

            <a href="index.php?controller=article&function=supprimerArticle=<?= $row['id_forum']; ?>">Supprimer</a>

            <?php
        }
    } else {
        echo "Aucun formulaire trouvé.";
    }
}


//  else {
//         echo "Aucun forum trouvé.";
//         exit();
//     }


