<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/bootstrap-5.2.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/bootstrap-5.2.0-dist/css/bootstrap.css.map">
</head>

<body>
    <div id="wrapper">
        <div class="p-3">
            <h1>Dashboard</h1>
            <h3>Các trang mặc định:</h3>
            <p>Giới thiệu <a href="" onclick="showForm('AGT')">Chỉnh sửa</a></p>
            <p>Đào tạo <a href="edit-dao-tao.php">Chỉnh sửa</a></p>
            <h3>Các trang thông tin thêm:</h3>
            <?php
            require_once "../../assets/database.php";
            $db = new Database();
            $query = 'SELECT * FROM `pages`';
            $result = $db->conn->query($query);
            while ($row = $result->fetch_assoc()) {
                if ($row['ID'] == 'AGT' || $row['ID'] == 'DT') {
                    continue;
                } else {
            ?>
                    <p id="<?= $row['ID'] ?>"><?= $row['Name'] ?>
                        <a href="" onclick="showForm('<?= $row['ID'] ?>')">Chỉnh sửa </a>
                        <a class="m-2" href="" onclick="deletePage('<?= $row['ID'] ?>')">Xóa</a>
                    </p>
            <?php }
            }
            ?>
            <a href="" onclick="showForm()">Thêm 1 trang thông tin</a>
            <div id="form_place"></div>
        </div>

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/tinymce/tinymce.min.js"></script>
    <script src="script.js"></script>
</body>

</html>