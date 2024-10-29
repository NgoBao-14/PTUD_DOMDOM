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
</head>
<body>
    <div class="container login-container">
        <div class="login-image">
            <a href="img/bannerlogin.jpg"></a>
        </div>

        <div class="login-form-container">
            <ul class="nav nav-tabs" id="login-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" href="?dangnhap">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="register-tab" href="?dangky">Đăng ký</a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="login" role="tabpanel">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                    </form>
                    <p class="mt-3 text-center">Chưa có tài khoản? <a href="?dangky">Đăng ký ngay</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
