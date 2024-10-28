<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khám bệnh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .layout {
            display: flex;
            width: 100%;
            max-width: 1400px;
            margin: 80px auto 0;
            gap: 20px;
        }
        .sidebar {
            width: 250px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .main-content {
            flex-grow: 1;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 18px;
        }
        .function-list {
            list-style-type: none;
            padding: 0;
        }
        .function-list li {
            margin-bottom: 10px;
        }
        .function-list a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .function-list a:hover, .function-list a.active {
            background-color: #f0f0f0;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .radio-group {
            display: flex;
            gap: 20px;
        }
        .radio-group label {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .date-picker {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .date-picker input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .no-data p:first-child {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .no-data p:last-child {
            color: #666;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include("../interface/header.php"); ?>

    <div class="layout">
        <div class="sidebar">
            <h6>DANH SÁCH CHỨC NĂNG</h6>
            <ul class="function-list">
                <li><a href="#">Đăng ký lịch làm việc</a></li>
                <li><a href="#">Xem lịch làm việc</a></li>
                <li><a href="XemDSYes.php" class="active">Xem danh sách khám</a></li>
                <li><a href="#">Xem thông tin bệnh nhân</a></li>
                <li><a href="XemLSKB.php">Xem lịch sử khám bệnh</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h1>Danh sách khám bệnh</h1>
            <div class="filters">
                <div class="radio-group">
                    <label>
                        <input type="radio" name="shift" value="morning">
                        Sáng
                    </label>
                    <label>
                        <input type="radio" name="shift" value="afternoon" checked>
                        Chiều
                    </label>
                    <label>
                        <input type="radio" name="shift" value="all">
                        Tất cả
                    </label>
                </div>
                <div class="date-picker">
                    <span>Ngày hiện tại</span>
                    <input type="date" value="" id="current-date" readonly>
                </div>
            </div>
            <div class="no-data">
                <p>Không có dữ liệu</p>
                <p>Vui lòng chọn ca làm việc khác, hoặc đợi phân bổ bệnh nhân vào ca...</p>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${yyyy}-${mm}-${dd}`;
            document.getElementById('current-date').value = formattedDate;

            // Chuyển định dạng ngày-tháng-năm
            const dateInput = document.getElementById('current-date');
            const dateValue = new Date(dateInput.value);
            const formattedDateVN = `${dd}.${mm}.${yyyy}`;
            dateInput.value = formattedDateVN;
        });

        // Lắng nghe sự kiện thay đổi của radio button
        document.querySelectorAll('input[name="shift"]').forEach((radio) => {
            radio.addEventListener('change', (event) => {
                const selectedValue = event.target.value;
                window.location.href = `XemDSYes.php?shift=${selectedValue}`;
            });
        });
    </script>
    <!-- footer -->
    <?php include("../interface/footer.php"); ?>
</body>
</html>
