<?php
require_once "../../assets/database.php";
$db = new Database();
$id = '';
$name = '';
$d_name = '';
$article = '';
$buffer = '';
if (isset($_GET['page'])){
    $query = 'SELECT * FROM pages WHERE id="' . $_GET['page'] . '"';
    $result = $db->conn->query($query)->fetch_assoc();
    $id = $result['ID'];
    $name = $result['Name'];
    $d_name = $result['Dir_name'];
    $content_path = '../../view/' . $result['Dir_name'] . '/content.html';
    $myfile = fopen($content_path, "r");
    $article = fread($myfile,filesize($content_path));
    $buffer = '?action=edit&id=' . $id;
}
?>
<form method="post" action="form-handling.php<?= $buffer?>" enctype="multipart/form-data">
    <div class="form-group pb-3">
        <label for="id">ID</label>
        <input class="form-control" value="<?= $id?>" id="id" name="id">
    </div>
    <div class="form-group pb-3">
        <label for="name">Tên trang</label>
        <input class="form-control" value="<?= $name?>" id="name" name="name">
    </div>
    <div class="form-group pb-3">
        <label for="dir_name">Tên directory</label>
        <input class="form-control" value="<?= $d_name?>" id="dir_name" name="dir_name">
    </div>
    <div class="form-group pb-3">
        <label for="medias">Thêm nội dung</label><br>
        <input type="file" class="form-control-file" onchange="printSrc()" id="medias" name="medias[]" multiple="multiple">
        <div id="media_src"></div>
    </div>
    <div class="form-group pb-3">
        <label for="article">Nội dung của trang</label>
        <textarea class="form-control" name="article" id="editor"><?= $article?></textarea>
    </div>
    <button type="submit">Submit</button>
</form>