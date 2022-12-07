<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="http://localhost/NLN_MT/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/NLN_MT/assets/bootstrap-5.2.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/NLN_MT/assets/bootstrap-5.2.0-dist/css/bootstrap.css.map">
</head>
<link rel="stylesheet" href="style.css">
<title>Chỉnh sửa trang đào tạo</title>
<div class="content pb-5">
    <div class="row">
        <div class="col-4">
            <?php
            require_once "../../assets/database.php";
            $db = new Database();
            $query = 'SELECT * FROM `ctdt`';
            $result = $db->conn->query($query);
            while ($row = $result->fetch_assoc()) {
            ?>
                <div id="<?= $row['ID']; ?>wrapper">
                    <div id="<?= $row['ID']; ?>" onClick="loadPdf('<?= $row['ID']; ?>', 'CTDT')" class="border border-info p-3 w-100 text-center subject-link"><?= $row['Name']; ?></div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-8 p-0 d-none" id="pdf-display">
            <button id="CTDT" type="button" onClick="loadPdf('', 'CTDT')" class="btn btn-outline-success active">Chương trình đào tạo</button>
            <button id="KHHT" type="button" onClick="loadPdf('', 'KHHT')" class="btn btn-outline-success">Kế hoạch học tập mẫu</button>
            <button type="button" onClick="deleteSubject(subject)" class="btn btn-danger">Xóa</button>
            <iframe src="" id="pdf-frame" class="w-100 pt-3" style="height: 800px;"></iframe>
        </div>
        <form action="DT-form-handling.php" class="col-8 p-0" id="form-add" method="post" enctype="multipart/form-data">
            <h2>Thêm một ngành đào tạo</h2>
            <div class="form-group pb-3">
                <label for="ID">ID</label>
                <input type="text" class="form-control" id="ID" name="ID" required placeholder="Nhập ID">
            </div>
            <div class="form-group pb-3">
                <label for="Name">Tên ngành</label>
                <input type="text" class="form-control" id="Name" name="name" required placeholder="Nhập tên ngành">
            </div>
            <div class="form-group pb-3">
                <label for="">File chương trình đào tạo</label>
                <br>
                <input type="file" class="form-control-file" required id="CTDT" name="CTDT">
            </div>
            <div class="form-group pb-3">
                <label for="">File kế hoạch học tập mẫu</label>
                <br>
                <input type="file" class="form-control-file" id="KHHT" required name="KHHT">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="script_dt.js"></script>