<?php
$db     = new SafeMysql();
if (isset($_POST['token'])) {
    $token = $_POST['token'];
    $id_account_sql = $db->getRow("SELECT * FROM `token` WHERE `token`=?s", $token);
    $id_account = $id_account_sql['id'];
    $t = $_GET['t'];
    if ($t == "info") {
            if ($row = $db->getRow("SELECT * FROM `profile` WHERE `id`=?i", $id_account)) {
                $result = array(
                    "Status" => "200",
                    "id" => $row['id'],
                    "photo" => $row['photo'],
                    "name" => $row['name'],
                    "number" => $row['number'],
                    "type" => $row['type']
                );
                echo json_encode($result);
            } else {
                $result = array(
                    "Status" => "404"
                );

                echo json_encode($result);
            }
    } else if ($t == "update") {
        $check = $db->getRow("SELECT * FROM `profile` WHERE `id`=?i", $id_account);
        if ($check['id'] != 0) {
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
            $result = array(
                "Status" => "200"
            );

            echo json_encode($result);
        } else {
            $result = array(
                "Status" => "404"
            );

            echo json_encode($result);
        }
    } else if ($t == "addlist") {
        $product = $_POST['product'];
        if(isset($product) && !empty($product)) {
            if ($check = $db->getRow("SELECT * FROM `likelist` WHERE `id`=?i AND `product`=?i", $id_account, $product)) {
                $result = array(
                    "Status" => "404" //Заменить статус-код на подходящий.
                );

                echo json_encode($result);
            } else {
                $db->query("INSERT INTO `likelist` SET `id`=?i, `product`=?i", $id_account, $product);
                $result = array(
                    "Status" => "200"
                );

                echo json_encode($result);
            }
        }
        else
        {
            $result = array(
                "Status" => "404" //Заменить статус-код на подходящий.
            );

            echo json_encode($result);
        }
    } else if ($t == "dellist") {
        $product = $_POST['product'];
        if (isset($product) && !empty($product)) {
            if ($check = $db->getRow("SELECT * FROM `likelist` WHERE `id`=?i AND `product`=?i", $id_account, $product)) {
                $db->query("DELETE FROM `likelist` WHERE `id`=?i AND`product`=?i", $id_account, $product);
                $result = array(
                    "Status" => "200"
                );

                echo json_encode($result);
            } else {
                $result = array(
                    "Status" => "404" //Заменить статус-код на подходящий.
                );

                echo json_encode($result);
            }
        } else {
            $result = array(
                "Status" => "404" //Заменить статус-код на подходящий.
            );

            echo json_encode($result);
        }
    } else if($t == "horder") {
        $product = $_POST['product'];
        $total = $_POST['total'];
        $date = $_POST['date'];
        if (isset($product) && !empty($product)) {
            if (isset($total) && !empty($total)) {
                $db->query("INSERT INTO `OrdersHistory` SET `id`=?i, `product`=?s, `total`=?i,`date`=?s", $id_account, $product, $total,$date);
                $result = array(
                    "Status" => "200"
                );

                echo json_encode($result);
            }
            else {
                $result = array(
                    "Status" => "404" //Заменить статус-код на подходящий.
                );

                echo json_encode($result);
            }
        }
        else {
            $result = array(
                "Status" => "404" //Заменить статус-код на подходящий.
            );

            echo json_encode($result);
        }
    }
}
else
{
    $result = array(
        "Status" => "404"
    );

    echo json_encode($result);
}