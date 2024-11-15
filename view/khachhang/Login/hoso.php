<?php
    $mabn = $_SESSION["idbn"];
    include_once("controller/choso.php");
    $p = new cHoSo();
    $bn = $p->get1HoSo($mabn);
    if($bn){
        while($r = mysqli_fetch_assoc($bn)){
            $tenbn = $r["HovaTen"];
            $gioitinh = $r["GioiTinh"];
            $ngaysinh = $r["NgaySinh"];
            $sdt = $r["SoDT"];
            $diachi = $r["DiaChi"];
            $email = $r["Email"];
            $baohiem = $r["BHYT"];
            $mapk = $r["MaPK"];
        }
    } else {
        echo "<script>alert('Ma benh nhan khong ton tai!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
        }

        .container {
            margin-bottom: 50px;
        }

        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            height: 260px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
        }
        .sidebar a.active {
            color: #0d6efd;
            font-weight: bold;
        }

        .main-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
        }


        .profile-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-header .avatar {
            font-size: 3rem;
            color: #6c757d;
            margin-right: 15px;
        }
        .profile-header h5 {
            margin: 0;
        }

        .info-section {
            
        }

        .profile-section {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            border-left: 4px solid #0d6efd;
        }
        .profile-section p {
            margin: 0;
            font-weight: bold;
        }
        .profile-section div {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }
        .edit-button {
            text-align: right;
            margin-top: 20px;
        }
        .btn a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 sidebar">
            <a href="?lichkham">Lịch khám</a>
            <a href="#">Lịch sử thanh toán</a>
            <a href="?hoso" class="active">Hồ sơ</a>
            <a href="#">Tài khoản</a>
            <a href="#">Đăng xuất</a>
        </div>
        
        <div class="col-md-9">
            <h4 class="main-title">Hồ sơ</h4>
            <div class="profile-container">
                <div class="profile-header">
                    <div class="avatar">👤</div>
                    <div>
                        <h5><?php echo $tenbn;?></h5>
                        <small>Mã BN: <?php echo $mabn;?></small>
                    </div>
                </div>
                
                <div class="profile-section mb-3">
                    <p>Thông tin cơ bản</p>
                    <div>
                        <span>Họ và tên</span>
                        <span><?php echo $tenbn; ?></span>
                    </div>
                    <div>
                        <span>Điện thoại</span>
                        <span><?php echo $sdt; ?></span>
                    </div>
                    <div>
                        <span>Giới tính</span>
                        <span><?php echo $gioitinh; ?></span>
                    </div>
                    <div>
                        <span>Ngày sinh</span>
                        <span><?php echo $ngaysinh; ?></span>
                    </div>
                    <div>
                        <span>Địa chỉ</span>
                        <span><?php echo $diachi; ?></span>
                    </div>
                </div>

                <div class="profile-section">
                    <p>Thông tin bổ sung</p>
                    <div>
                        <span>Mã BHYT</span>
                        <span><?php echo $baohiem;?></span>
                    </div>
                    <div>
                        <span>Email</span>
                        <span><?php echo $email;?></span>
                    </div>
                    <div>
                        <span>Mã phiếu khám</span>
                        <span><?php echo $mapk;?></span>
                    </div>
                </div>

                <div class="edit-button">
                    <button class="btn btn-primary"><a href="?capnhathoso">Thay đổi thông tin</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>