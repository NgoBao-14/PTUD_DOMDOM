<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        /* Styling for the login name */
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .menu > li {
            position: relative;
            display: inline-block;
        }

        .menu > li > a {
            display: block;
            padding: 10px 15px;
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu > li > a:hover {
            background-color: #e9ecef;
            color: #0056b3;
        }

        /* Submenu styles */
        .submenu {
            display: none;
            list-style-type: none;
            position: absolute;
            top: 100%; /* Positioned right below the login name */
            left: 0;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 5px 0;
            z-index: 1000;
        }

        .submenu li {
            width: 200px;
        }

        .submenu li a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            white-space: nowrap;
            transition: background-color 0.3s;
        }

        .submenu li a:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        /* Show the submenu when hovering over the parent menu item */
        .menu > li:hover .submenu {
            display: block;
        }

        #nutdn .nav-link {
            font-weight: bold;
            color: #007bff;
            background-color: #e9ecef;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        #nutdn .nav-link:hover {
            background-color: #d1e7ff;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Đom Đóm</a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                    <a class="nav-link" href="workSchedule.php">Bệnh nhân</a>
                    <a class="nav-link" href="#">Nhân viên</a>
                    <a class="nav-link" href="workSchedule.php">Lịch làm việc</a>
                    <a class="nav-link" href="statistic.php">Thống kê</a>
                </div>
                <?php
                    if (isset($_SESSION['dn']) && $_SESSION['dn'] >= 3) { // Bệnh nhân
                        if (isset($_SESSION['idbn']) && isset($_SESSION['tenbn'])) {
                            echo '<nav>
                                    <ul class="menu">
                                        <li>
                                            <a class="nav-link" href="?hoso&idbn=' . $_SESSION['idbn'] . '">' . $_SESSION['tenbn'] . '</a>
                                            <ul class="submenu">
                                                <li><a href="?lichkham">Lịch khám</a></li>
                                                <li><a href="#">LS thanh toán</a></li>
                                                <li><a href="?hoso&idbn=' . $_SESSION['idbn'] . '">Hồ sơ</a></li>
                                                <li><a href="#">Tài khoản</a></li>
                                                <li><a href="view/khachhang/Login/dangxuat.php" onclick="return confirm(\'Bạn có muốn đăng xuất?\')">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>';
                        }
                    } else if (isset($_SESSION['dn'])) { // Quản lý, Cán bộ y tế
                        
                            echo '<nav>
                                <ul class="menu">
                                    <li>
                                        <a class="nav-link" href="?hoso">' . $_SESSION['role'] . '</a>
                                        <ul class="submenu">
                                            <li><a href="?lichkham">Lịch khám</a></li>
                                            <li><a href="#">LS thanh toán</a></li>
                                            <li><a href="?hoso">Hồ sơ</a></li>
                                            <li><a href="#">Tài khoản</a></li>
                                            <li><a href="view/khachhang/Login/dangxuat.php" onclick="return confirm(\'Bạn có muốn đăng xuất?\')">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>';
                        
                    } else {
                        echo '<div id="nutdn" class="navbar-nav"><a class="nav-link" href="?dangnhap">Đăng nhập</a></div>';
                    }
                ?>
            </div>
        </nav>
    </div>
    <div class="main">
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>