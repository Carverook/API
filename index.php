<?php
require_once "bdconnect.php";
if($_GET['page'] == "api")
{
    $u = $_GET['u'];
    include_once "./api/api.php";
}
else{
    echo "Неверный запрос.";
}