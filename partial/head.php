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

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg p-0 d-none fixed-top topnav" style="background-color: #3a454b;">
            <!-- Add d-none -->
            <div class="container-fluid p-0 justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img src="http://localhost/NLN_MT/assets/uploads/logo_dhct.png" class="logo" alt="">
                    </li>
                    <?php
                    require_once "../../assets/database.php";
                    $db = new Database();
                    $query = 'SELECT * FROM pages';
                    $result = $db->conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        if ($row['on_nav'] == 1) { ?>
                            <li class="nav-item p-2 <?php if($row['Dir_name'] == substr(getcwd(), 28)){echo 'active';}?>">
                                <a class="nav-link text-white" href="http://localhost/NLN_MT/view/<?= $row['Dir_name'] ?>"><?= $row['Name'] ?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <!-- Navbar -->
    </header>

    <div class="content-container my-4">
        <!-- Heading -->
        <div class="heading p-3">
            <a href="/NLN_MT/" class="heading-link" style="text-decoration: none;">
                <img src="http://localhost/NLN_MT/assets/uploads/logo_dhct.png" class="logo-big" alt="">
                <div class="px-3 w-100 text-center">
                    <h3 class="mt-2 mb-0 pb-2 link-text">KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG TRƯỜNG ĐẠI HỌC CẦN THƠ
                    </h3>
                    <h4 class="mt-3 mb-0 text-muted">Trang tư vấn tuyển sinh</h4>
                </div>
            </a>
        </div>

        <!-- Subnav -->
        <nav id="top-anchor" class="navbar navbar-expand-lg p-0 subnav" style="background-color: #3a454b;">
            <!-- Add d-none -->
            <div class="container-fluid p-0">
                <ul class="navbar-nav">

                    <?php
                    $result = $db->conn->query($query);
                    while ($row = $result->fetch_assoc()) {
                        if ($row['on_nav'] == 1) { ?>
                            <li class="nav-item p-2 <?php if($row['Dir_name'] == substr(getcwd(), 28)){echo 'active';}?>">
                                <a class="nav-link text-white" href="http://localhost/NLN_MT/view/<?= $row['Dir_name']?>"><?= $row['Name']?></a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <!-- Heading -->