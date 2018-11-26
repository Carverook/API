<?php
require_once "function.php";
$db     = new SafeMysql();
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password_api = $_POST['password'];

    $row = $db->getRow("SELECT * FROM `account` WHERE login=?s", $login);

    if($row['login'] != "")
    {
        $id_account = $row['id'];
        $password = $row['password'];
        $hash = $row['salt'];
        $password_md5 = md5($password_api);

        if (password_verify($password_md5, $hash) == password_verify($password, $hash)) {
            $token = genRandomString(60);
            $db->query("INSERT INTO `token` SET `token`=?s, `id`=?i", $token,$id_account);

            $result = array(
                "Status" => "200",
                "token" => $token
            );

            echo json_encode($result);
        } else {
            $result = array(
                "Status" => "401"
            );

            echo json_encode($result);
        }
    }
    else {
        $result = array(
            "Status" => "401"
        );

        echo json_encode($result);
    }
}