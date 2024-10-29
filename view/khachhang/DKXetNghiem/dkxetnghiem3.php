<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Giờ Xét Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            height: 650px;
            position: relative;
            width: 600px;
            background-color: #fff;
            padding: 1rem;
            margin-top: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .gioxn {
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
        .time-section {
            margin-top: 1.5rem;
        }
        .time-slot {
            display: inline-block;
            margin: 0.25rem;
            padding: 0.5rem 1rem;
            border: 1px solid #000;
            border-radius: 5px;
            cursor: pointer;
        }
        .confirm-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
        .confirm-button a {
            color: white;
            text-decoration: none;
        }
        .no-data {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            height: 150px;
        }
        .no-data-icon {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #6c757d;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="gioxn">
        <a href="?dkxn2"><span class="back-icon">&larr;</span></a>
        <h5 class="mb-0">Chọn giờ xét nghiệm</h5>
    </div>

    <!-- Buổi sáng -->
    <div class="time-section">
        <h6>Buổi sáng</h6>
        <div class="time-slots">
            <span class="time-slot">08:00-10:00</span>
            <span class="time-slot">10:00-12:00</span>
            <span class="time-slot">09:00-11:00</span>
        </div>
    </div>

    <!-- Buổi chiều -->
    <div class="time-section">
        <h6>Buổi chiều</h6>
        <div class="time-slots">
            <span class="time-slot">16:00-18:00</span>
        </div>
    </div>

    <!-- Nút xác nhận -->
    <button class="btn btn-primary confirm-button">
        <a href="?dkxn4">Xác Nhận</a>
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>