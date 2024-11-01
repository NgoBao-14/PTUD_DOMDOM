<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
 <!-- header -->
 <?php include("../interface/header.php"); ?>
<div class="main">
<div class="container mt-4">
        <h1 class="mb-4">Welcome, Admin...!</h1>
        
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Quản Lý Thông Tin Bệnh Nhân</h5>
                        <p class="card-text display-4">1,234</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <a href="doctor.php" class="text-white text-decoration-none"><h5 class="card-title">Quản Lý Thông Tin Bác Sĩ</h5></a>
                        <p class="card-text display-4">42</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <a href="nurse.php" class="text-white text-decoration-none"><h5 class="card-title">Quản Lý Thông Tin Nhân Viên Y Tế</h5></a>
                        <p class="card-text display-4">18</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Thống Kê Hóa Đơn</h5>
                        <p class="card-text display-4">27</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mb-3">Quick Actions</h2>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admit Patient</h5>
                        <p class="card-text">Register and admit a new patient to the hospital.</p>
                        <a href="#" class="btn btn-primary">Admit Patient</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Schedule Appointment</h5>
                        <p class="card-text">Schedule a new appointment for a patient.</p>
                        <a href="#" class="btn btn-primary">Schedule Appointment</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generate Report</h5>
                        <p class="card-text">Create and download various hospital reports.</p>
                        <a href="#" class="btn btn-primary">Generate Report</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <!-- footer -->
 <?php include("../interface/footer.php"); ?>
</body>
</html>