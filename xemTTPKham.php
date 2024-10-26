<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Dom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/xTTPKham.css">
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Đom Đóm</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#">Trang chủ</a>
                <a class="nav-link active" href="#">Bệnh nhân</a>
                <a class="nav-link" href="#">Nhân viên</a>
                <a class="nav-link" href="#">Lịch làm việc</a>
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
            <div class="row mb-3">
                <div class="col mt-2">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Nhập ID bệnh nhân" aria-label="Search">
                    <button class="btn btn-custom-search" type="submit">Tìm kiếm</button>
                </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thông tin bệnh nhân</h5>
                            <p><strong>ID:</strong> 33A11A</p>
                            <p><strong>Họ và Tên:</strong> Nguyễn Văn A</p>
                            <p><strong>Ngày sinh:</strong> 21-05-1999</p>
                            <p><strong>Giới tính:</strong> Nam</p>
                            <p><strong>BHYT:</strong> XXX-XXX-XXX-XXX</p>
                            <p><strong>Địa chỉ:</strong> Quang Trung, Gò Vấp, Tp.Hồ Chí Minh</p>
                            <p><strong>Số điện thoại:</strong> 0123456789</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách phiếu khám</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ngày khám</th>
                                        <th>Bác sĩ</th>
                                        <th>Chuẩn đoán</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2024-05-15</td>
                                        <td>Dr.A</td>
                                        <td>Viêm họng</td>
                                        <td><button class="btn btn-sm btn-outline-primary active">Xem chi tiết</button></td>
                                    </tr>
                                    <tr>
                                        <td>2024-05-XX</td>
                                        <td>Dr.A</td>
                                        <td>Đau lưng</td>
                                        <td><button class="btn btn-sm btn-outline-primary">Xem chi tiết</button></td>
                                    </tr>
                                    <tr>
                                        <td>2024-05-XX</td>
                                        <td>Dr.B</td>
                                        <td>Cảm cúm</td>
                                        <td><button class="btn btn-sm btn-outline-primary">Xem chi tiết</button></td>
                                    </tr>
                                    <tr>
                                        <td>2024-05-XX</td>
                                        <td>Dr.B</td>
                                        <td>Viêm họng</td>
                                        <td><button class="btn btn-sm btn-outline-primary">Xem chi tiết</button></td>
                                    </tr>
                                    <tr>
                                        <td>2024-05-XX</td>
                                        <td>Dr.C</td>
                                        <td>Viêm họng</td>
                                        <td><button class="btn btn-sm btn-outline-primary">Xem chi tiết</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Chi tiết phiếu khám</h5>
                            <p><strong>Ngày khám:</strong> 2024-05-15</p>
                            <p><strong>Bác sĩ:</strong> Dr.A</p>
                            <p><strong>Chuẩn đoán:</strong> Viêm họng</p>
                            <p><strong>Xét nghiệm:</strong> Không</p>
                            <p><strong>Đơn thuốc:</strong> Paracetamol 500mg, uống 3 lần/ngày</p>
                            <p><strong>Lời dặn:</strong> Nghỉ ngơi, uống nhiều nước</p>
                            <button class="btn btn-primary">In phiếu khám</button>
                        </div>
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