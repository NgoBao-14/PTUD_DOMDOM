<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Dom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/workSchedule.css">
</head>
<body>
    <div class="header">
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
    </div>
    <div class="main">
        <div class="container mt-3 mb-3">
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
    </div>
    <div class="footer">
        <div class="contain1">
                    <div class="doc1">
                        <h4>
                            BỆNH VIỆN ĐOM ĐÓM
                        </h4>
                        <p>
                            Hệ thống bệnh viện uy tín, chất lượng, chuyên nghiệp với đội ngũ bác sĩ giỏi, nhiệt tình và chu đáo.
                        </p>
                        <img src="./img/logo.png" alt="">
                        <ul>
                            <li><a href="https://zalo.me/0346021604" class="doc">Zalo: 0764418902</a></li>
                            <li>Địa chỉ: F4/9C tổ 14 ấp 6C, xã Vĩnh Lộc A, huyện Bình Chánh, TP.HCM</li>
                            <li>Giờ mở cửa: 8:00 am – 9:00 pm</li>
                        </ul>
                    </div>
                    <div class="doc2">
                        <h4>CHÍNH SÁCH</h4>
                        <ul>
                            <li><a href="#" class="doc">Cách Đặt Lịch Tại Website</a></li>
                            <li><a href="#" class="doc">Chính Sách Bảo Mật</a></li>
                            <li><a href="#" class="doc">Phương Thức Thanh Toán</a></li>
                        </ul>
                    </div>
                    <div class="doc3">
                        <h4>Dịch vụ-Hỗ trợ</h4>
                        <ul>
                            <li><a href="#" class="doc">Đặt khám bác sĩ</a></li>
                            <li><a href="#" class="doc">Đặt khám bệnh viện</a></li>
                            <li><a href="#" class="doc">Đặt lịch xét nghiệm</a></li>
                        </ul>
                    </div>
                    <div class="doc4">
                        <h4>KÊNH TRUYỀN THÔNG</h4>
                        <ul>
                            <li><a href="#" class="doc">Giới Thiệu</a></li>
                            <li><a href="#" class="doc">Liên Hệ-Bản Đồ Đường Đi</a></li>
                            <li><a href="#" class="doc">Facebook</a></li>
                        </ul>
                    </div>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>