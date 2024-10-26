<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Dom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/thongKe.css">
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
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thống kê hóa đơn</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="statisticCriteria" class="form-label">Tiêu chí thống kê:</label>
                                    <select class="form-select" id="statisticCriteria">
                                        <option selected>Chọn tiêu chí thống kê</option>
                                        <option value="1">Thống kê theo dịch vụ</option>
                                        <option value="2">Thống kê theo thời gian</option>
                                    </select>
                                </div>
                                <div id="serviceOptions" class="mb-3 d-none">
                                    <label class="form-label">Chọn loại dịch vụ:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="serviceType" id="examination">
                                        <label class="form-check-label" for="examination">
                                            Khám bệnh
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="serviceType" id="testing">
                                        <label class="form-check-label" for="testing">
                                            Xét nghiệm
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="serviceType" id="treatment">
                                        <label class="form-check-label" for="treatment">
                                            Điều trị
                                        </label>
                                    </div>
                                </div>
                                <div id="timeOptions" class="mb-3 d-none">
                                    <label for="timePeriod" class="form-label">Chọn khoảng thời gian:</label>
                                    <select class="form-select mb-2" id="timePeriod">
                                        <option selected>Chọn khoảng thời gian</option>
                                        <option value="day">Theo ngày</option>
                                        <option value="week">Theo tuần</option>
                                        <option value="month">Theo tháng</option>
                                        <option value="year">Theo năm</option>
                                    </select>
                                    <div id="specificDateContainer" class="d-none">
                                        <label for="specificDate" class="form-label">Chọn ngày cụ thể:</label>
                                        <input type="date" class="form-control" id="specificDate">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Xác nhận thống kê</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Biểu đồ thống kê</h5>
                            <div id="chart"></div>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary">In báo cáo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('statisticCriteria').addEventListener('change', function() {
            const serviceOptions = document.getElementById('serviceOptions');
            const timeOptions = document.getElementById('timeOptions');
            if (this.value === '1') {
                serviceOptions.classList.remove('d-none');
                timeOptions.classList.add('d-none');
            } else if (this.value === '2') {
                serviceOptions.classList.add('d-none');
                timeOptions.classList.remove('d-none');
            } else {
                serviceOptions.classList.add('d-none');
                timeOptions.classList.add('d-none');
            }
        });

        document.getElementById('timePeriod').addEventListener('change', function() {
            const specificDateContainer = document.getElementById('specificDateContainer');
            if (this.value === 'day') {
                specificDateContainer.classList.remove('d-none');
            } else {
                specificDateContainer.classList.add('d-none');
            }
        });
    </script>
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