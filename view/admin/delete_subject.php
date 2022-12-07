<?php
require_once "../../assets/database.php";
require_once "helper.php";
$db = new Database();
$query = "DELETE FROM ctdt WHERE `ctdt`.`ID` = '" . $_GET['sj'] . "'";
$db->conn->query($query);
