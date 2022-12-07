<?php
require_once 'helper.php';
require_once '../../assets/database.php';
$db = new Database();
$query = "INSERT INTO `ctdt` (`ID`, `Name`, `CTDT`, `KHHT`) VALUES ('" . $_POST['ID'] . "', '" 
. $_POST['name'] . "', '" . basename($_FILES['CTDT']["name"]) . "', '" . basename($_FILES['KHHT']["name"]) . "');";
$db->conn->query($query);

file_handling('CTDT');
file_handling('KHHT');

header('Location: edit-dao-tao.php');
exit();