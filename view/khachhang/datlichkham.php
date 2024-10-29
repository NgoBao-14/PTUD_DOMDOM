<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Nguyễn Nam'; 
}

$showForm1 = isset($_POST['book_appointment']);
$showForm2 = isset($_POST['book_doctor']);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch khám</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

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

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .button-group {
            display: flex;
            justify-content: space-around; 
            width: 100%; 
            max-width: 800px; 
            margin-bottom: 20px;
        }

        .button-group button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            flex: 1;
            margin: 0 10px; 
        }

        .button-group button:hover {
            background-color: #0056b3;
            
        }

        .search-bar {
            display: flex;
            justify-content: center;
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
        }

        .search-bar input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 10px; 
            font-size: 16px;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 800px;
            margin-top: 20px;
        }

        .col-4 {
            flex: 0 0 33.33%;
            padding-right: 20px;
        }

        .col-6 {
            flex: 0 0 66.67%;
        }

        .specialties, .doctors {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .specialty {
            margin-bottom: 15px;
        }

        .doctors img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .doctor {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
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

        function showDoctors(specialty) {
            const doctorsList = document.getElementById('doctorsList');
            doctorsList.innerHTML = '';

            const doctors = {
                'khoa1': [
                    { name: 'Bác sĩ Nguyễn Văn A', img: '' },
                    { name: 'Bác sĩ Nguyễn Văn B', img: '' },
                ],
                'khoa2': [
                    { name: 'Bác sĩ Nguyễn Văn C', img: '' },
                    { name: 'Bác sĩ Nguyễn Văn D', img: '' },
                ],
                
            };

            if (doctors[specialty]) {
                doctors[specialty].forEach(doctor => {
                const doctorElement = document.createElement('div');
                doctorElement.className = 'doctor';
                doctorElement.innerHTML = `
                    <img src="${doctor.img}" alt="${doctor.name}">
                    <span>${doctor.name}</span>
                    <form method="post" action=""> 
                        <input type="hidden" name="doctor_id" value="${doctor.id}"> 
                        <button type="submit" name="book_doctor" style="margin-left: 370px;border-radius: 10px;">Đặt khám</button>
                    </form>
                `;
                doctorsList.appendChild(doctorElement);
        });
            }

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
            alert("Lịch khám đã được đặt thành công!");
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
    <?php if (!$showForm1 && !$showForm2 ): ?>
        <div class="button-group">
            <form method="post" action="">
                <button type="submit" name="book_appointment">Đặt lịch khám</button>
                <button>Đặt lịch bác sĩ</button>
                <button>Đặt lịch xét nghiệm</button>
            </form>
        </div>
        <div>
            <input type="text" placeholder=" Nhập thông tin cần tìm kiếm" class="search-bar" style="width: 600px;height: 50px;">
        </div>
    <?php elseif (!$showForm2 ): ?>
        <div class="container">
            <div class="col-4">
                <div class="search-bar">
                    <input type="text" placeholder="Tìm kiếm khoa khám nhanh...">
                </div>
                <div class="specialties">
                    <h3>Chuyên khoa:</h3>
                    <div class="specialty">
                        <input type="radio" id="khoa1" name="specialty" value="khoa1" onclick="showDoctors('khoa1')">
                        <label for="khoa1">Khoa Tim mạch</label>
                    </div>
                    <div class="specialty">
                        <input type="radio" id="khoa2" name="specialty" value="khoa2" onclick="showDoctors('khoa2')">
                        <label for="khoa2">Khoa Răng-Hàm-Mặt</label>
                    </div>
                    
                </div>
            </div>
            <div class="col-8">
                <div class="doctors">
                    <h3>Danh sách Bác sĩ:</h3>
                    <div id="doctorsList"></div>
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
            <div class="info-box1">Bác sĩ: <span id="doctorName">Nguyễn Văn A</div>
            <div class="info-box1">Ngày khám: <span id="selectedDate">Chưa chọn</span></div>
            <div class="info-box1">Giờ khám: <span id="selectedTime">Chưa chọn</span></div>
            <div class="info-box1">Bệnh nhân: <span id="patientName"><?php echo $_SESSION['username']; ?></span></div>
            
            <button onclick="confirmAppointment()" style="border-radius: 10px;width:300px">Đặt lịch khám</button>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php include("../interface/footer.php"); ?>
</body>
</html>
