<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Nguyễn Nam'; 
}

$patients = [
    [
        "id" => "1",
        "name" => "Nguyễn Nam",
        "appointment_time" => "17:00 - 22/10/2024",
        "doctor" => "Nguyễn Văn A",
        "medical_record" => [
            "ticket_id" => "YPK2410220630",
            "creation_date" => "22/10/2024",
            "symptoms" => "Đau bụng dưới",
            "examination_result" => "Có vật thể lạ ở bụng trái",
            "diagnosis" => "Mắc dị vật",
            "prescription_id" => "FTH532472368",
            "follow_up" => "29/10/2024"
        ]
    ],
    [
        "id" => "2",
        "name" => "Nguyễn Nam",
        "appointment_time" => "7:00 - 23/10/2024",
        "doctor" => "Nguyễn Văn B",
        "medical_record" => [
            "ticket_id" => "YPK2410220631",
            "creation_date" => "23/10/2024",
            "symptoms" => "Đau đầu",
            "examination_result" => "Không có dấu hiệu bất thường",
            "diagnosis" => "Căng thẳng",
            "prescription_id" => "FTH532472369",
            "follow_up" => "30/10/2024"
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu Khám</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: white;
            color: black;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
        }

        .header .logo img {
            height: 70px;
        }

        .header .nav-links {
            display: flex;
            align-items: center;
        }

        .header .nav-links a {
            color: black;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .header .nav-links a:hover {
            background-color: #f0f0f0;
            border: 1px solid #888;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            transform: translateY(-3px);
            transition: all 0.3s ease; 
        }
        .header .nav-links .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #007BFF;
            color: blue; 
        }

        .dropbtn {
            background-color: white;
            color: black;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none; 
        }

        .dropbtn:hover {
            background-color: #f0f0f0;
        }

        .dropdown-content.show {
            display: block;
        }
        body {
            background-color: none;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background-color: none; 
            padding: 20px;
            height: 45vh;
            border: 1px solid #ccc;
            border-radius: 10px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
       
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: black;
        }
        .sidebar ul li.active a {
            font-weight: bold;
            color: #2196F3;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .patient-item {
            margin-bottom: 10px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .patient-item:hover{
            background-color: #f0f0f0;
            border: 1px solid #888; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            transform: translateY(-3px); 
            transition: all 0.3s ease; 
        }
        .patient-item p {
            font-weight: bold;
            color: black;
        }
        .patient-item span {
            display: block;
            font-size: 12px;
            color: gray;
        }
        .patient-details {
        background-color: #ffffff;
        margin-bottom: 20px;
        padding: 20px; 
        border: 1px solid #ccc; 
        border-radius: 10px; 
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
        .patient-details h3 {
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .patient-details p {
            margin-bottom: 10px;
        }
    </style>
    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("userDropdown");
            dropdownContent.classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        function showPatientDetails(patient) {
            const detailsContainer = document.getElementById("patientDetails");
            detailsContainer.innerHTML = `
                <h3>Thông tin phiếu khám</h3>
                <p><strong>Mã phiếu khám:</strong> ${patient.medical_record.ticket_id}</p>
                <p><strong>Ngày tạo:</strong> ${patient.medical_record.creation_date}</p>
                <p><strong>Bác sĩ:</strong> ${patient.doctor}</p>
                <h3>Thông tin bệnh án</h3>
                <p><strong>Triệu chứng nhập viện:</strong> ${patient.medical_record.symptoms}</p>
                <p><strong>Kết quả cận lâm sàng:</strong> ${patient.medical_record.examination_result}</p>
                <p><strong>Chuẩn đoán:</strong> ${patient.medical_record.diagnosis}</p>
                <p><strong>Mã đơn thuốc:</strong> ${patient.medical_record.prescription_id}</p>
                <p><strong>Hẹn khám:</strong> ${patient.medical_record.follow_up}</p>
            `;
        }
    </script>
</head>
<body>
<div class="header" style="background: white;">
    <div class="logo">
        <img src="../../img/logo.png" alt="">
    </div>

    <div class="nav-links">
        <a href="datlichkham.php">Đặt lịch khám</a>
        <a href="#consultation">Tư vấn trực tiếp</a>
        <a class="disabled" href="#">Dành cho nhân viên</a>
        
        <div class="dropdown">
            <a href="javascript:void(0)" class="dropbtn" onclick="toggleDropdown()">
                <?php echo $_SESSION['username']; ?>
            </a>
            <div id="userDropdown" class="dropdown-content">
                <a href="lichkham.php">Lịch khám</a>
                <a href="thanhtoan.php">Thanh toán</a>
                <a href="">Hồ sơ cá nhân</a>
                <a href="xemhosophieukham.php">Hồ sơ phiếu khám</a>
                <a href="">Tài khoản</a>
                <a href="">Đăng xuất</a>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul>
                    <li ><a href="lichkham.php">Lịch khám</a></li>
                    <li ><a href="thanhtoan.php">Thanh toán</a></li>
                    <li><a href="">Hồ sơ cá nhân</a></li>
                    <li class="active"><a href="xemhosophieukham.php">Hồ sơ phiếu khám</a></li>
                    <li><a href="">Tài khoản</a></li>
                    <li><a href="">Đăng xuất</a></li>
                </ul>
                   
            </div>

            <div class="col-md-10">
                <h2 class="mt-3">Phiếu khám</h2>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group">
                            <?php foreach ($patients as $patient): ?>
                                <div class="patient-item list-group-item" onclick='showPatientDetails(<?= json_encode($patient) ?>)'>
                                    <p><?= $patient['doctor'] ?></p>
                                    <span><?= $patient['appointment_time'] ?></span>
                                    <span><?= $patient['name'] ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
     
                    <div class="col-md-8">
                        <div id="patientDetails" class="patient-details">
                            <h3>Thông tin phiếu khám</h3>
                            <p>Chọn một phiếu khám để xem chi tiết.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../interface/footer.php"); ?>
</body>
</html>
