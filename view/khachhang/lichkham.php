<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Nguyễn Nam'; 
}
$showForm1 = isset($_POST['change_time']);
$showForm2 = isset($_POST['cancel']);

$patients = [
    [
        "id" => "1",
        "name" => "Nguyễn Nam",
        "appointment_time" => "17:00 - 22/10/2024",
        "doctor" => "Nguyễn Văn A",
        "number" => "1",
        "medical_record" => [
            "ticket_id" => "YPK2410220630",
            "creation_date" => "22/10/2024",
            "specialist" => "RHM",
            "patient_id" => "YMP2477845737",
            "birth" => "21/05/2003",
            "phone" => "0123456789",
            "gender" => "Nam",
            "insurance" => "HGDFUKY264723",
            "status" => "Chưa thanh toán"
        ]
        ],
    
    [
        "id" => "2",
        "name" => "Nguyễn Nam",
        "appointment_time" => "17:00 - 22/10/2024",
        "doctor" => "Nguyễn Văn B",
        "number" => "2",
        "medical_record" => [
            "ticket_id" => "YPK24102657630",
            "creation_date" => "22/10/2024",
            "specialist" => "Tim",
            "patient_id" => "YMP2477845737",
            "birth" => "21/05/2003",
            "phone" => "0123456789",
            "gender" => "Nam",
            "insurance" => "HGDFUKY264723",
            "status" => "Chưa thanh toán"
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
        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container1 {
            display: flex;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }
        .col-81, .col-41 {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .col-81 {
            flex: 8;
        }
        .col-41 {
            flex: 4;
        }
        .time-slot1 {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .time-button1 {
            width: 70px;
            padding: 10px;
            text-align: center;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        .time-button1.selected {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        .info-box1 {
            padding: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
                <h3>STT:${patient.number}</h3>
                <h3>Thông tin đặt khám</h3>
                <p><strong>Mã lịch khám:</strong> ${patient.medical_record.ticket_id}</p>
                <p><strong>Ngày khám:</strong> ${patient.medical_record.creation_date}</p>
                <p><strong>Chuyên khoa:</strong> ${patient.medical_record.specialist}</p>
                <h3>Thông tin bệnh nhân</h3>
                <p><strong>Mã bệnh nhân:</strong> ${patient.medical_record.patient_id}</p>
                <p><strong>Họ tên:</strong> ${patient.name}</p>
                <p><strong>Năm sinh:</strong> ${patient.medical_record.birth}</p>
                <p><strong>Số điện thoại:</strong> ${patient.medical_record.phone}</p>
                <p><strong>Giới tính:</strong> ${patient.medical_record.gender}</p>
                <p><strong>Mã BHYT:</strong> ${patient.medical_record.insurance}</p>
                <p><strong>Trạng thái thanh toán:</strong> ${patient.medical_record.status}</p>
                 <form method="post" action=""> 
                    <button type="submit" name="change_time" onclick="handleReschedule('${patient.medical_record.ticket_id}')" class="btn btn-primary mt-3">Thay đổi lịch khám</button>
                    <button type="submit" name="cancel" onclick="handleCancel('${patient.medical_record.ticket_id}')" class="btn btn-danger mt-3">Hủy lịch khám</button>
                </form>
                `;
        }

        function selectTime(time) {
        document.querySelectorAll('.time-button1').forEach(button => button.classList.remove('selected'));
        event.target.classList.add('selected');
        document.getElementById('selectedTime').innerText = time;
        }

        document.getElementById('appointmentDate').addEventListener('change', function() {
            document.getElementById('selectedDate').innerText = this.value;
        });

        function confirmAppointment() {
            alert("Lịch khám đã được tahy đổi thành công!");
        }

        function handleCancel(ticketId) {
    const confirmCancel = confirm("Bạn có chắc chắn muốn hủy lịch khám này không?");
    if (confirmCancel) {
     
        alert(`Lịch khám với mã ${ticketId} đã được hủy thành công.`);
       
        const detailsContainer = document.getElementById("patientDetails");
        if (detailsContainer) {
            detailsContainer.innerHTML = `
                <h3>STT: ${patient.number}</h3>
                <h3>Thông tin đặt khám</h3>
                <p><strong>Mã lịch khám:</strong> ${ticketId}</p>
                <p><strong>Ngày khám:</strong> ${patient.medical_record.creation_date}</p>
                <p><strong>Chuyên khoa:</strong> ${patient.medical_record.specialist}</p>
                <h3>Thông tin bệnh nhân</h3>
                <p><strong>Mã bệnh nhân:</strong> ${patient.medical_record.patient_id}</p>
                <p><strong>Họ tên:</strong> ${patient.name}</p>
                <p><strong>Năm sinh:</strong> ${patient.medical_record.birth}</p>
                <p><strong>Số điện thoại:</strong> ${patient.medical_record.phone}</p>
                <p><strong>Giới tính:</strong> ${patient.medical_record.gender}</p>
                <p><strong>Mã BHYT:</strong> ${patient.medical_record.insurance}</p>
                <p><strong>Trạng thái thanh toán:</strong> Đã hủy</p>
            `;
        }
    }
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
<div class="main">
    <?php if (!$showForm1): ?>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <ul>
                    <li class="active"><a href="lichkham.php">Lịch khám</a></li>
                    <li ><a href="thanhtoan.php">Thanh toán</a></li>
                    <li><a href="">Hồ sơ cá nhân</a></li>
                    <li ><a href="xemhosophieukham.php">Hồ sơ phiếu khám</a></li>
                    <li><a href="">Tài khoản</a></li>
                    <li><a href="">Đăng xuất</a></li>
                </ul>
                   
            </div>

            <div class="col-md-10">
                <h2 class="mt-3">Lịch khám</h2>
                               
                <div class="row">
                    <div class="search-bar">
                        <input type="text" placeholder="Mã giao dịch, tên bệnh nhân,...">
                    </div>
                    <div class="col-md-4">
                        <div class="list-group">
                            <?php foreach ($patients as $patient): ?>
                                <div class="patient-item list-group-item" onclick='showPatientDetails(<?= json_encode($patient) ?>)'>
                                    <p><?= $patient['doctor'] ?></p>
                                    <span><?= $patient['appointment_time'] ?></span>
                                    <span><?= $patient['name'] ?></span>
                                    <span><?= $patient['number'] ?></span>
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
    <?php else: ?>
        <div class="container1">
        <div class="col-81">
            <h3>Ngày và giờ khám</h3>
            <div>
                <label for="appointmentDate"></label>
                <input type="date" id="appointmentDate" name="appointment_date" required>
            </div>
            
            <h4></h4>
            <div class="time-slot1">
                
                <?php
                $start_time = strtotime("17:00");
                $end_time = strtotime("20:00");
                $time_interval = 10 * 60;

                for ($time = $start_time; $time <= $end_time; $time += $time_interval) {
                    $time_formatted = date("H:i", $time);
                    echo "<div class='time-button1' onclick='selectTime(\"$time_formatted\")'>$time_formatted</div>";
                }
                ?>
            </div>
        </div>
        
        <div class="col-41">
            <h3>Thông tin đặt khám</h3>
            <div class="info-box1">Giờ khám: <span id="selectedTime">Chưa chọn</span></div>
            <div class="info-box1">Bệnh nhân: <span id="patientName"><?php echo $_SESSION['username']; ?></span></div>
            
            <button onclick="confirmAppointment()" style="border-radius: 10px;width:300px">Thay đổi lịch khám</button>
        </div>
    </div>
    
    <?php endif; ?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../interface/footer.php"); ?>
</body>
</html>
