<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-custom {
            max-width: 1200px;
            margin: auto;
        }
        .doctor-image {
            max-width: 150px;
            border-radius: 100%;
        }
        .register-btn {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container-custom my-5">
    <div class="card p-4">
        <div class="row align-items-center">
            <div class="col-md-2 text-center">
                <img src="img/bs3.jpg" alt="Doctor Image" class="doctor-image">
            </div>
            <div class="col-md-10">
                <h3>Phó giáo sư, Tiến sĩ, Bác sĩ Trần Văn X</h3>
                <p><strong>Chuyên khoa:</strong> Nội tiết</p>
                <p><strong>Chức vụ:</strong> Trưởng khoa Nội Tiết bệnh viện Đại học Y Dược TP.HCM</p>
                <p><strong>Nơi công tác:</strong> Bệnh viện Trường ĐH Y Dược</p>
                <p><strong>Kinh nghiệm:</strong> 24 năm</p>
            </div>
        </div>

        <hr>

        <div>
            <h5>Đặt khám nhanh</h5>
            <div class="d-flex flex-wrap gap-2 my-3">
                <button class="btn btn-outline-primary">Th 4, 30-10</button>
                <button class="btn btn-outline-primary">Th 6, 01-11</button>
                <button class="btn btn-outline-primary">Th 2, 04-11</button>
                <button class="btn btn-outline-primary">Th 4, 06-11</button>
                <button class="btn btn-outline-primary">Th 6, 08-11</button>
                <button class="btn btn-outline-primary">Th 2, 11-11</button>
                <button class="btn btn-outline-primary">Th 4, 13-11</button>
            </div>
        </div>

        <hr>

        <div>
            <h5>Buổi chiều</h5>
            <div class="d-flex flex-wrap gap-2 my-3">
                <button class="btn btn-outline-secondary">19:00 - 19:15</button>
                <button class="btn btn-outline-secondary">19:45 - 20:00</button>
            </div>
        </div>

        <hr>

        <div>
            <h5>Giới thiệu</h5>
            <p>Phó giáo sư, Tiến sĩ, Bác sĩ hiện đang là Trưởng khoa Nội Tiết bệnh viện Đại học Y Dược TP.HCM, Phó Trưởng Bộ môn Nội tiết tại Đại học Y Dược TP.HCM. Bác sĩ có nhiều năm kinh nghiệm trong việc chuyên khám và điều trị các bệnh như đái tháo đường, bệnh bướu cổ, bệnh nội tiết và các bệnh nội khoa.</p>
            <p>Trước khi đến thăm khám, Bác sĩ Trần Quang Nam khuyến khích bệnh nhân đặt lịch sớm qua ứng dụng YouMed để chọn khung giờ khám phù hợp, tránh tình trạng hết lịch và giúp phòng khám phục vụ tốt hơn.</p>
            <ul>
                <li>Đăng ký ngày, giờ khám và lấy số thứ tự sớm.</li>
                <li>Nhận và lưu trữ hồ sơ y tế.</li>
                <li>Nhắc lịch khám.</li>
            </ul>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary register-btn">Đăng ký khám</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>