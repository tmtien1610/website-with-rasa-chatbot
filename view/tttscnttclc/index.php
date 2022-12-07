<?php
require_once "../../assets/database.php";
$db = new Database();
$query = 'SELECT * FROM `pages` WHERE `pages`.`Dir_name` = "' . basename(dirname(__FILE__)) . '"';
$result = $db->conn->query($query);
$row = $result->fetch_assoc();
?>
<title><?= $row['Name'] ?></title>

<?php
require_once "../../partial/head.php";
?>

<div class="content pb-5">
<?php
require_once "content.html";
?>
</div>

<?php
require_once "../../partial/tail.php";
?>