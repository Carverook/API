<?php
$db     = new SafeMysql();
if (isset($_POST['token'])) {
    $access_token = $_POST['token'];

    $row = $db->getRow("SELECT * FROM `token` WHERE `token`=?s", $access_token);
    if ($row['token'] != "") {
        $result = array(
            "Status" => "200"
        );

        echo json_encode($result);
        $db->query("DELETE FROM `token` WHERE `token`=?s", $access_token);
    } else {
        $result = array(
            "Status" => "404"
        );

        echo json_encode($result);
    }
}