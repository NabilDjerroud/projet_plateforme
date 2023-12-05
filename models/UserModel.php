<?php

function authentification() {

    session_start();
    require('database/connex.php');
    // var_dump($_POST);
    foreach($_POST as $key => $value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }

    // 1- check user
    $sql = "SELECT * FROM utilisateur WHERE user_name = '$user_name'";

    $result = mysqli_query($connex, $sql);

    //2 - verifier nombre de lignes
    $count = mysqli_num_rows($result);
    if($count == 1) {
        //3 verifier le mot de passe
        $info_user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // var_dump($info_user);

        $salt = "B13L&@u'";

        $saltPassword = $password.$salt;

        // var_dump(password_verify($saltPassword, $info_user['password']) ? "oui" : "non");
        if(password_verify($saltPassword, $info_user['password'])) {

            session_regenerate_id();
            $_SESSION['id'] = $info_user['id_utilisateur'];
            $_SESSION['nom'] = $info_user['nom'];
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);

            // echo 'succes';
            header('location:index.php?controller=Article&function=creerArticle');

        } else {
            //header('location:login.php?msg=2');
        }

    } else {
        header('location:login.php?msg=1');
    }

}