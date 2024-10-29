<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Xét Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            width: 600px;
            height: 650px;
            background-color: #fff;
            padding: 1.5rem;
            margin-top: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .xacnhanxn {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding-bottom: 1rem;
            border-bottom: 2px solid #007bff;
        }
        .back-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            cursor: pointer;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
        }
        .payment-section {
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid #e0e0e0;
        }
        .total {
            font-weight: bold;
            text-align: right;
            padding-top: 1rem;
            font-size: 1.25rem;
        }
        .confirm-button {
            width: 100%;
            margin-top: 80px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        a{
            color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="xacnhanxn">
        <a href="?dkxn3"><span class="back-icon">&larr;</span></a>
        <h5 class="mb-0">Xác nhận</h5>
    </div>

    <!-- Thông tin bệnh nhân -->
    <div class="info-section mt-3">
        <div class="info-row">
            <span>Loại xét nghiệm</span>
            <span>Xét nghiệm AMH</span>
        </div>
        <div class="info-row">
            <span>Bệnh nhân</span>
            <span>Nguyễn Văn A</span>
        </div>
        <div class="info-row">
            <span>Số điện thoại</span>
            <span>0987654321</span>
        </div>
        <div class="info-row">
            <span>Ngày sinh</span>
            <span>21/05/2003</span>
        </div>
        <div class="info-row">
            <span>Giới tính</span>
            <span>Nam</span>
        </div>
        <div class="info-row">
            <span>Ngày xét nghiệm</span>
            <span>24/10/2024</span>
        </div>
        <div class="info-row">
            <span>Giờ xét nghiệm</span>
            <span>16:00 - 18:00</span>
        </div>
    </div>

    <!-- Phương thức thanh toán -->
    <div class="payment-section">
        <div class="d-flex justify-content-between align-items-center">
            <span>Thanh toán bằng</span>
            <a href="#" class="text-decoration-none">Xem tất cả &rsaquo;</a>
        </div>
        <div class="form-check mt-2">
            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1">
            <label class="form-check-label" for="paymentMethod1">
                Chọn phương thức thanh toán
            </label>
        </div>
    </div>

    <!-- Tổng cộng -->
    <div class="total">
        Tổng: 700,000đ
    </div>

    <!-- Nút xác nhận -->
    <button class="btn confirm-button">Xác nhận</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
