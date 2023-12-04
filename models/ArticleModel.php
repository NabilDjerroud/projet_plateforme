<?php
function enregistrer()
{
    require('database/connex.php');

    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }


    $sql = "INSERT INTO forum (titre, article, date_, user_id_utilisateur) VALUES ('$titre', '$article', '$date_', '$user_id_utilisateur')";


    if (mysqli_query($connex, $sql)) {
        header('location:index.php?controller=utilisateur&function=afficherFormulaire');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connex);
    }


}


function supprimer($request)
{
    require_once("db/connex.php");

    $id = mysqli_real_escape_string($connex, $request['id']);

    foreach ($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }


    $sql = "DELETE FROM forum WHERE id_forum = '$id' ";


    if (mysqli_query($connex, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connex);
    }

}


// function modifier()
// {
//     require('database/connex.php');

//     foreach ($_POST as $key => $value) {
//         $$key = mysqli_real_escape_string($connex, $value);
//     }


//     $sql = "DELETE FROM forum (titre, article, date_, user_id_utilisateur) VALUES ('$titre', '$article', '$date_', '$user_id_utilisateur')";


//     if (mysqli_query($connex, $sql)) {
//         header('location:index.php?controller=utilisateur&function=afficherFormulaire');
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($connex);
//     }


// }

?>