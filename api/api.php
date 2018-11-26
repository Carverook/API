<?php


    if($u == "registration")
    {
        include_once "registration_api.php";
    }
    else if($u == "auth")
    {
        include_once "auth_api.php";
    }
    else if($u == "logout")
    {
        include_once "logout_api.php";
    }