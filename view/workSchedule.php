<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Dom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar-item {
            cursor: pointer;
        }
        .sidebar-item:hover {
            background-color: #e9ecef;
        }
        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .schedule-day {
            text-align: center;
        }
        .btn-sm {
            width: 100%;
            margin-bottom: 5px;
        }
        .navbar-brand, .sidebar-item, .navbar-nav a {
            font-weight: bold;
        }
        .sidebar-item.active {
            background-color: #e9ecef;
            color: #0d6efd;
            border: none;
            border-bottom: 4px solid #0d6efd;
        }
        .navbar-nav .nav-link {
            margin-right: 20px;
        }
        .card {
            border: none;
            box-shadow: 1px 7px 9px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Đom Đóm</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#">Trang chủ</a>
                <a class="nav-link" href="#">Bệnh nhân</a>
                <a class="nav-link" href="#">Nhân viên</a>
                <a class="nav-link active" href="#">Lịch làm việc</a>
                <a class="nav-link" href="#">Thống kê</a>
            </div>
            <div class="navbar-nav">
                <a class="nav-link" href="#">Quản lý-Duy Khương</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 p-3 border-end">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Danh sách các khoa</h5>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active sidebar-item">Nội</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Ngoại</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Nhi</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Sản</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Tai mũi họng</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Da liễu</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Răng hàm mặt</a>
                            <a href="#" class="list-group-item list-group-item-action sidebar-item">Mắt</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 p-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Thời khóa biểu-Khoa</h5>
                        <div class="schedule-grid">
                            <div class="schedule-day">
                                <div>Thứ 2</div>
                                <button class="btn btn-outline-primary btn-sm active">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                            <div class="schedule-day">
                                <div>Thứ 3</div>
                                <button class="btn btn-outline-primary btn-sm">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                            <div class="schedule-day">
                                <div>Thứ 4</div>
                                <button class="btn btn-outline-primary btn-sm">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                            <div class="schedule-day">
                                <div>Thứ 5</div>
                                <button class="btn btn-outline-primary btn-sm">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                            <div class="schedule-day">
                                <div>Thứ 6</div>
                                <button class="btn btn-outline-primary btn-sm">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                            <div class="schedule-day">
                                <div>Thứ 7</div>
                                <button class="btn btn-outline-primary btn-sm">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                            <div class="schedule-day">
                                <div>Chủ nhật</div>
                                <button class="btn btn-outline-primary btn-sm">sáng</button>
                                <button class="btn btn-outline-primary btn-sm">Chiều</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Danh sách bác sĩ đăng ký ca Thứ 2-Sáng</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="doctor1">
                            <label class="form-check-label" for="doctor1">Dr.Nguyễn Văn A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="doctor2">
                            <label class="form-check-label" for="doctor2">Dr.Nguyễn Văn A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="doctor3">
                            <label class="form-check-label" for="doctor3">Dr.Nguyễn Văn A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="doctor4">
                            <label class="form-check-label" for="doctor4">Dr.Nguyễn Văn A</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="doctor5">
                            <label class="form-check-label" for="doctor5">Dr.Nguyễn Văn A</label>
                        </div>
                    </div>
                </div>
                    <div class="text-end mt-2">
                        <button class="btn btn-primary">Xác nhận lịch làm việc</button>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>