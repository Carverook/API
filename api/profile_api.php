<?php
$db     = new SafeMysql();
$t = $_GET['t'];
if($t == "info")
{
    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $row = $db->getRow("SELECT * FROM `token` WHERE `token`=?s", $token);
        if($row['token'] != "") {
            $id_account = $row['id'];
            $row = $db->getRow("SELECT * FROM `profile` WHERE `id`=?i", $id_account);
            if($row['id'] != "")
            {
                $result = array(
                    "Status" => "200",
                    "id" => $row['id'],
                    "photo" => $row['photo'],
                    "name" => $row['name'],
                    "number" => $row['number'],
                    "type" => $row['type']
                );
                echo json_encode($result);
            }
            else
            {
                $result = array(
                    "Status" => "404"
                );

                echo json_encode($result);
            }
        }
        else
        {
            $result = array(
                "Status" => "404"
            );

            echo json_encode($result);
        }
    }
}
else if($t == "update")
{
    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $row = $db->getRow("SELECT * FROM `token` WHERE `token`=?s", $token);
        $id_account = $row['id'];
        $check = $db->getRow("SELECT * FROM `profile` WHERE `id`=?i", $id_account);
        if($check['id'] != 0)
        {
            if (isset($_POST['photo'])) {
            $photo = $_POST['photo'];
            $db->query("UPDATE `profile` SET `photo` = ?s WHERE `id`=?i", $photo, $id_account);
        }
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
                $db->query("UPDATE `profile` SET `name` = ?s WHERE `id`=?i", $name, $id_account);
            }
            if (isset($_POST['number'])) {
                $number = $_POST['number'];
                $db->query("UPDATE `profile` SET `number` = ?s WHERE `id`=?i", $number, $id_account);
            }
        }
        else
        {
            $result = array(
                "Status" => "404"
            );

            echo json_encode($result);
        }
    }
}