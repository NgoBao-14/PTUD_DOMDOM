<?php
    if (isset($_REQUEST['btn-dk'])) {
        include_once("controller/cnguoidung.php");
        $p = new cNguoiDung();
        $password = $_REQUEST['password'];
        $password2 = $_REQUEST['password2'];
        if ($password !== $password2) {
            echo "<script>alert('Mật khẩu và mật khẩu nhập lại không khớp!')</script>";
            exit;
        }
        $password = md5($password);
        $id_taikhoan = $p->cDangKy($_REQUEST['txtuser'], $password, $_REQUEST['hiddenphanquyen']);
        if ($id_taikhoan) {
            echo "<script>alert('Đăng ký thành công! Mời bạn tạo hồ sơ.')</script>";
            header("Location: index.php?thongtin&id_taikhoan=" . $id_taikhoan);
        } else {
            echo "<script>alert('Đăng ký thất bại!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 50px auto;
            max-width: 1200px;
        }
        .login-image {
            width: 80%;
            background-image: url('img/bannerlogin.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            min-height: 400px;
        }
        .login-form-container {
            margin-left: 150px;
            width: 40%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container login-container">
        <div class="login-image">
            <a href="img/bannerlogin.jpg"></a>
        </div>

        <div class="login-form-container">
            <ul class="nav nav-tabs" id="login-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="login-tab" href="?dangnhap" >Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="register-tab" href="?dangky" >Đăng ký</a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="login" role="tabpanel">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="txtuser" class="form-label">Username</label>
                            <input type="text" class="form-control" name="txtuser" id="txtuser" placeholder="Nhập username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                            <input type="hidden" name="hiddenphanquyen" id="hiddenphanquyen" value="Bệnh Nhân">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <button type="submit" name="btn-dk" id="btn-dk" class="btn btn-primary w-100">Đăng ký</button>
                    </form>
                    <p class="mt-3 text-center">Đã có tài khoản? <a href="?dangnhap">Đăng nhập ngay</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
