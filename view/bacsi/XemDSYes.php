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
        .patient-list {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .patient-list th, .patient-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .patient-list th {
            background-color: #f2f2f2;
        }
        .patient-list tr:hover {
            background-color: #f1f1f1;
        }
        .patient-list .highlight {
            color: blue;
            text-decoration: underline;
        }
        .patient-list .selected {
            background-color: #cce5ff;
        }
        .btn-submit {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0056b3;
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
                <li><a href="dangkylichlamviec.php">Đăng ký lịch làm việc</a></li>
                <li><a href="xemlichlamviec.php">Xem lịch làm việc</a></li>
                <li><a href="#" class="active">Xem danh sách khám</a></li>
                <li><a href="xemthongtinbenhnhan.php">Xem thông tin bệnh nhân</a></li>
                <li><a href="XemLSKB.php">Xem lịch sử khám bệnh</a></li> <!-- Thay đổi link tại đây -->
            </ul>
        </div>
        <div class="main-content">
            <h1>Danh sách khám bệnh</h1>
            <div class="filters">
                <div class="radio-group">
                    <label>
                        <input type="radio" name="shift" value="morning" checked>
                        Sáng
                    </label>
                    <label>
                        <input type="radio" name="shift" value="afternoon">
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
            <table class="patient-list">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên Bệnh nhân</th>
                        <th>Ngày sinh</th>
                        <th>Giờ hẹn</th>
                        <th>Triệu chứng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="selectRow(this)">
                        <td>1</td>
                        <td>Nguyễn Thị Anh</td>
                        <td>2001-05-18</td>
                        <td>7g10 - 7g50</td>
                        <td>Ho, sốt cao</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td>2</td>
                        <td>Đinh La Thăng</td>
                        <td>1994-12-01</td>
                        <td>8g10 - 8g50</td>
                        <td>Đau nửa đầu</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td>3</td>
                        <td>Diễm Thị Huệ</td>
                        <td>1982-05-21</td>
                        <td>9g10 - 9g50</td>
                        <td>Nhức đầu</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td>4</td>
                        <td>Võ Cao Kiệt</td>
                        <td>2000-11-08</td>
                        <td>10g10 - 10g50</td>
                        <td>Bụng đau</td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td>5</td>
                        <td>Cao Đình Đạt</td>
                        <td>2012-03-03</td>
                        <td>11g10 - 11g50</td>
                        <td>Sốt, nóng</td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="btn-submit" onclick="submitForm()">Lập phiếu khám</a>
        </div>
    </div>
    <script>
        function selectRow(row) {
            var rows = document.querySelectorAll('.patient-list tr');
            rows.forEach(function(r) {
                r.classList.remove('selected');
            });
            row.classList.add('selected');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${yyyy}-${mm}-${dd}`;
            document.getElementById('current-date').value = formattedDate;
        });

        function submitForm() {
            // Chuyển hướng đến trang Lapphieu.php khi lập phiếu khám
            window.location.href = 'Lapphieu.php';
        }
    </script>
<!-- footer -->
<?php include("../interface/footer.php"); ?>
</body>
</html>
