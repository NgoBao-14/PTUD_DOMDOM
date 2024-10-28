<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch khám</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
        }

        .container {
            margin-top: 30px;
        }

        .row {
            background-color: #f8f9fa;
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

        .search-section {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .search-section input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: none;
        }

        .search-section input[type="text"]::placeholder {
            color: #6c757d;
        }

        .appointment-card {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #b0d3ff;
        }

        .appointment-card-1 {
            background-color: #e9f2ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            border: 1px solid #b0d3ff;
        }

        .appointment-details {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #b0d3ff;
        }

        .doctor-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .doctor-info .avatar {
            font-size: 2rem;
            margin-right: 10px;
        }

        .info-section {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            border-left: 4px solid #0d6efd;
        }

        .info-section p {
            font-weight: bold;
            margin-bottom: 8px;
            color: #0d6efd;
        }

        .info-group {
            display: flex;
            justify-content: space-between;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .filter {
            font-size: 1rem;
            text-align: right;
            color: #0d6efd;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            <a href="?lichkham" class="active">Lịch khám</a>
            <a href="#">Lịch sử thanh toán</a>
            <a href="?hoso">Hồ sơ</a>
            <a href="#">Tài khoản</a>
            <a href="#">Đăng xuất</a>
        </div>
        <div class="col-md-9">
            <h1 class="main-title">Lịch khám</h1>
            <div class="row">
                <!-- Search and Filter Section -->
                <div class="col-md-4">
                    <div class="search-section">
                        <input type="text" placeholder="Tìm kiếm">
                    </div>
                    <div class="appointment-card-1">
                        <p>Bác sĩ X</p>
                        <span>Trần Văn A</span><br>
                        <span>22/10/2024</span>
                    </div>
                    <div class="appointment-card">
                        <p>Bác sĩ Y</p>
                        <span>Trần Văn A</span><br>
                        <span>22/10/2024</span>
                    </div>
                </div>

                <!-- Appointment Details Section -->
                <div class="col-md-8">
                    <div class="filter">🔍 Lọc</div>
                    <div class="doctor-info">
                        <span class="avatar">👤</span>
                        <div>
                            <p>Bác Sĩ X</p>
                            <small>12 Nguyễn Văn Bảo, Gò Vấp, HCM</small>
                        </div>
                    </div>
                    <div class="info-section">
                        <p>Thông tin đặt khám</p>
                        <div class="info-group">
                            <span>Mã phiếu khám</span>
                            <span>PK0000001</span>
                        </div>
                        <div class="info-group">
                            <span>Mã lịch khám</span>
                            <span>PK1000002</span>
                        </div>
                        <div class="info-group">
                            <span>Ngày khám</span>
                            <span>22/10/2024</span>
                        </div>
                        <div class="info-group">
                            <span>Trạng thái</span>
                            <span>Đã hủy</span>
                        </div>
                    </div>
                    <div class="info-section">
                        <p>Thông tin bệnh nhân</p>
                        <div class="info-group">
                            <span>Mã BN</span>
                            <span>BN21017801</span>
                        </div>
                        <div class="info-group">
                            <span>Họ và tên</span>
                            <span>Trần Văn A</span>
                        </div>
                        <div class="info-group">
                            <span>Ngày sinh</span>
                            <span>11/11/2003</span>
                        </div>
                        <div class="info-group">
                            <span>Số điện thoại</span>
                            <span>0987654321</span>
                        </div>
                        <div class="info-group">
                            <span>Giới tính</span>
                            <span>Nam</span>
                        </div>
                        <div class="info-group">
                            <span>Mã BHYT</span>
                            <span>YT123456</span>
                        </div>
                        <div class="info-group">
                            <span>Địa chỉ</span>
                            <span>12 Nguyễn Văn Bảo, HCM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>