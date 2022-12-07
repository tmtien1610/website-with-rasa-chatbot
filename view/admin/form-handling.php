<?php
require_once "../../assets/database.php";
require_once "helper.php";
$db = new Database();
if (isset($_GET['action'])) {
    $query = "SELECT `Dir_name` FROM `pages` WHERE `pages`.`ID` = '" . $_GET['id'] . "'";
    $result = $db->conn->query($query)->fetch_assoc();
    $query = "UPDATE `pages` SET `ID` = '" . $_POST['id'] .
        "', `Name` = '" . $_POST['name'] . "', `Dir_name` = '" .
        $_POST['dir_name'] . "' WHERE `pages`.`ID` = '" . $_GET['id'] . "'";
    $db->conn->query($query);
    delete_view('../../view/' . $result['Dir_name']);
    create_view($_POST['dir_name'], $_POST['article']);
} else {
    $query = "INSERT INTO `pages` (`ID`, `Name`, `Dir_name`) VALUES ('" . $_POST['id'] .
        "', '" . $_POST['name'] . "', '" . $_POST['dir_name'] . "');";
    $db->conn->query($query);
    create_view($_POST['dir_name'], $_POST['article']);
}
foreach($_FILES["medias"]["name"] as $fname){
    file_handling($fname);
}
header('Location: index.php');
exit();
?>