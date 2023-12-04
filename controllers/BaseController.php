<?php

function index()
{
    //require_once (VIEW_DIR."/base/welcome.php");

    render('/base/base.php');
}

function voirLogin()
{
    render('/login.php');
}

?>