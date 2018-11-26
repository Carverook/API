<?php

$db     = new SafeMysql();
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];


if($email == "") {
    $result = array(
        "Status" => "400"
    );
    echo json_encode($result);
    return true;
}
else if($login == "") {
    $result = array(
        "Status" => "400"
    );
    echo json_encode($result);
    return true;
}
else if($password == "") {
    $result = array(
        "Status" => "400"
    );
    echo json_encode($result);
    return true;
}
else {
    $row = $db->getRow("SELECT * FROM `account` WHERE `login`=?s OR `email`=?s", $login, $email);
    if($row['login'] != "")
    {
        $result = array(
            "Status" => "400"
        );

        echo json_encode($result);
        return true;
    }
    $MD5 = md5($password);
    $salt = password_hash($MD5, PASSWORD_DEFAULT);
    $db->query("INSERT INTO `account` SET `login`=?s, `password`=?s,`email`=?s,`salt`=?s", $login,$password,$email,$salt);
    $result = array(
        "Status" => "200",
        "login" => $login,
        "password" => $password,
        "e-mail" => $email
    );
    echo json_encode($result);
}