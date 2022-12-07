<?php
require_once "../../assets/database.php";
require_once "helper.php";
$db = new Database();
$query = "SELECT * FROM `pages` WHERE `pages`.`ID` = '" . $_GET['page'] . "'";
$result = $db->conn->query($query);
$row = $result->fetch_assoc();
delete_view('../../view/' . $row['Dir_name']);
$query = "DELETE FROM pages WHERE `pages`.`ID` = '" . $_GET['page'] . "'";
$db->conn->query($query);
