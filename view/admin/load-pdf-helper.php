<?php
require_once '../../assets/database.php';
$db = new Database();
$query = "SELECT * FROM `ctdt` WHERE `ID`='" . $_GET['sj'] . "';";
$result = $db->conn->query($query)->fetch_assoc();
echo $result[$_GET['type']];