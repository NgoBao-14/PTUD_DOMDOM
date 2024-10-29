<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Booking</title>
<style>
    .container {
        display: flex;
        width: 1200px;
    }

    .sidebar {
        width: 300px;
        padding: 20px;
        background-color: #fff;
    }

    .sidebar h2 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .sidebar input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
        outline: none;
        color: #333;
    }

    .sidebar ul {
        list-style-type: none;
    }

    .sidebar ul li {
        margin: 10px 0;
        display: flex;
        align-items: center;
    }

    .sidebar ul li label {
        margin-left: 8px;
        color: #333;
        font-size: 14px;
    }

    /* Doctor List */
    .doctor-list {
        flex: 1;
        padding: 20px;
    }

    .doctor-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        height: 150px;
    }

    .doctor-info {
        display: flex;
        align-items: center;
    }

    .doctor-info img {
        width: 140px;
        height: 140px;
        margin-right: 15px;
        border-radius: 100%;
    }

    .doctor-name {
        font-size: 16px;
        color: #333;
    }

    .book-button {
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .book-button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Chuyên khoa</h2>
        <br>
        <ul>
            <li><input type="radio" name="specialty"><label>Tất cả</label></li>
            <li><input type="radio" name="specialty"><label>Nhi khoa</label></li>
            <li><input type="radio" name="specialty"><label>Sản phụ khoa</label></li>
            <li><input type="radio" name="specialty"><label>Da liễu</label></li>
            <li><input type="radio" name="specialty"><label>Tiêu hoá</label></li>
            <li><input type="radio" name="specialty"><label>Cơ xương khớp</label></li>
            <li><input type="radio" name="specialty"><label>Dị ứng - miễn dịch</label></li>
            <li><input type="radio" name="specialty"><label>Gây mê hồi sức</label></li>
            <li><input type="radio" name="specialty"><label>Tai - mũi - họng</label></li>
            <li><input type="radio" name="specialty"><label>Ung bướu</label></li>
        </ul>
    </div>

    <div class="doctor-list">
        <div class="doctor-card">
            <div class="doctor-info">
                <a href="?lichkhambs"><img src="img/bs1.png" alt="Doctor Icon"></a>
                <span class="doctor-name">Bác Sĩ A</span>
            </div>
            <button class="book-button">Đặt khám</button>
        </div>
        <div class="doctor-card">
            <div class="doctor-info">
                <img src="img/bs2.jpg" alt="Doctor Icon">
                <span class="doctor-name">Bác Sĩ B</span>
            </div>
            <button class="book-button">Đặt khám</button>
        </div>
        <div class="doctor-card">
            <div class="doctor-info">
                <img src="img/bs3.jpg" alt="Doctor Icon">
                <span class="doctor-name">Bác Sĩ C</span>
            </div>
            <button class="book-button">Đặt khám</button>
        </div>
        <div class="doctor-card">
            <div class="doctor-info">
                <img src="img/bs4.webp" alt="Doctor Icon">
                <span class="doctor-name">Bác Sĩ D</span>
            </div>
            <button class="book-button">Đặt khám</button>
        </div>
    </div>
</div>

</body>
</html>