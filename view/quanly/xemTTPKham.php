<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Đom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/xemTTPK.css">
</head>
<body>
<?php include("../interface/header.php"); ?>
    <div class="main">
        <div class="container mt-4">
            <div class="row mb-3">
                <div class="col mt-2">
                <form class="d-flex" method="post">
                    <input class="form-control me-2" type="search" name="txtsearch" placeholder="Nhập ID bệnh nhân" aria-label="Search">
                    <button class="btn btn-custom-search" type="submit" name="btnsearch">Tìm kiếm</button>
                </form>
                </div>
            </div>
                        <?php
                            include_once("BN.php");
                        ?>
            </div>
    </div>
    <?php include("../interface/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>