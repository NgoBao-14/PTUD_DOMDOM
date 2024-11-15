<?php
if (isset($_REQUEST['btn-xn'])) {
    include_once("controller/cnguoidung.php");
    $p = new cNguoiDung();
    $id_taikhoan = $_GET['id_taikhoan'];
    $kq = $p->cDangKy2(
        $_REQUEST['name'],
        $_REQUEST['gender'],
        $_REQUEST['dob'],
        $_REQUEST['sdt'],
        $_REQUEST['diachi'],
        $_REQUEST['email'],
        $_REQUEST['bhyt'],
        $_REQUEST['maphieukham'],
        $id_taikhoan
    );
    if ($kq) {
        echo "<script>alert('Đăng ký thông tin thành công! Bạn có thể đăng nhập')</script>";
    } else {
        echo "<script>alert('Đăng ký thông tin thất bại!')</script>";
    }
    header("refresh:0; url='index.php?dangnhap'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        font-family: Arial, sans-serif;
    }
    
    /* Tiêu đề form */
    .container h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }
    
    /* Căn chỉnh nhãn */
    .container label {
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
    }
    
    /* Styling cho các input */
    .container input[type="text"],
    .container input[type="email"],
    .container input[type="date"],
    .container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        transition: border-color 0.3s;
    }
    
    /* Đổi màu border khi input được focus */
    .container input[type="text"]:focus,
    .container input[type="email"]:focus,
    .container input[type="date"]:focus,
    .container select:focus {
        border-color: #007bff;
        outline: none;
    }
    
    /* Nút xác nhận */
    .container button {
        width: 100%;
        padding: 12px;
        font-size: 18px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .container button:hover {
        background-color: #0056b3;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }
    
        .container h2 {
            font-size: 20px;
        }
    
        .container button {
            font-size: 16px;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thông tin Hồ sơ</h2>
        <form method="POST">
            <input type="hidden" name="phone" >
            <input type="hidden" name="password" >

            <div class="mb-3">
                <label for="name">Họ và tên:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name">Số điện thoại:</label>
                <input type="tel" class="form-control" name="sdt" required>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label for="dob">Ngày sinh:</label>
                <input type="date" class="form-control" name="dob" required>
            </div>
            <div class="mb-3">
                <label for="gender">Giới tính:</label>
                <select name="gender" class="form-control" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" class="form-control" name="diachi">
            </div>
            <div class="mb-3">
                <label for="bh">Bảo hiểm y tế:</label>
                <input type="text" class="form-control" name="bhyt">
                <input type="hidden" name="maphieukham" value="0">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="btn-xn" id="btn-xn">Xác nhận</button>
        </form>
</div>
</body>
</html>
