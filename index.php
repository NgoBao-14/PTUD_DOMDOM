<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Đom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Đom Đóm</a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                    <a class="nav-link" href="#">Bệnh nhân</a>
                    <a class="nav-link" href="#">Nhân viên</a>
                    <a class="nav-link" href="#">Lịch làm việc</a>
                    <a class="nav-link active" href="#">Thống kê</a>
                </div>

                <?php
                    if(!isset($_SESSION['dn'])){
                        echo '<nav>
                                    <ul class="menu">
                                        <li>
                                            <a class="nav-link" href="?hoso">Quản lý-Duy Khương</a>
                                            <ul class="submenu">
                                                <li><a href="?lichkham">Lịch khám</a></li>
                                                <li><a href="#">Lịch sử thanh toán</a></li>
                                                <li><a href="?hoso">Hồ sơ</a></li>
                                                <li><a href="#">Tài khoản</a></li>
                                                <li><a href="#">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>';
                    }else{
                        echo '<div id="nutdn" class="navbar-nav"><a class="nav-link" href="?dangnhap">Đăng nhập</a></div>';
                    }
                ?>
        </nav>
    </div>

    <?php
        if(isset($_GET['dangnhap'])){
            include_once("view/khachhang/Login/dangnhap.php");
        } else if(isset($_GET['dangky'])){
            include_once("view/khachhang/Login/dangky.php");
        } else if(isset($_GET['hoso'])){
            include_once("view/khachhang/Login/hoso.php");
        } else if(isset($_GET['capnhathoso'])){
            include_once("view/khachhang/Login/capnhathoso.php");
        } else if(isset($_GET['lichkham'])){
            include_once("view/khachhang/XemLichKham/xemlk.php");
        } else if(isset($_GET['bacsi'])){
            include_once("view/khachhang/XemLichKham/xembs.php");
        } else if(isset($_GET['lichkhambs'])){
            include_once("view/khachhang/XemLichKham/xemlkbs.php");
        } else if(isset($_GET['dkxn1'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem1.php");
        } else if(isset($_GET['dkxn2'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem2.php");
        } else if(isset($_GET['dkxn3'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem3.php");
        } else if(isset($_GET['dkxn4'])){
            include_once("view/khachhang/DKXetNghiem/dkxetnghiem4.php");
        } else {
            echo '
            
            <div class="option">
                <nav>
                    <ul>
                        <li><a href="">Đặt lịch khám</a></li>
                        <li><a href="?bacsi">Đặt khám bác sĩ</a></li>
                        <li><a href="?dkxn1">Đặt lịch xét nghiệm</a></li>
                    </ul>
                </nav>
            </div>
            
            <div class="list-dk">
                <div class="cl-top">
                    <div class="top">
                        <h1>Đặt khám bác sĩ</h1>
                        <p>Xem lịch khám của bác sĩ và các thông tin chi tiết để đặt khám</p>
                    </div>
                    <button class="xemthem"><a href="?bacsi">Xem thêm</a></button>
                </div>
                <form class="bsform" action="">
                    <div class="bacsi">
                        <a href="?lichkhambs">
                            <img src="img/bs1.png" alt="">
                            <b>Bác sĩ 1</b>
                        </a>
                    </div>
                    <div class="bacsi">
                        <a href="">
                            <img src="img/bs2.jpg" alt="">
                            <b>Bác sĩ 2</b>
                        </a>
                    </div>
                    <div class="bacsi">
                        <a href="">
                            <img src="img/bs3.jpg" alt="">
                            <b>Bác sĩ 3</b>
                        </a>
                    </div>
                    <div class="bacsi">
                        <a href="">
                            <img src="img/bs4.webp" alt="">
                            <b>Bác sĩ 4</b>
                        </a>
                    </div>
                </form>
            </div>
            
            <div class="healthcare-section">
                <div class="header-image">
                    <div class="banner-overlay">
                    <p>Tổng Quan Phòng Khám</p>
                    <h1>CHĂM SÓC SỨC KHỎE TRONG KHÔNG GIAN ĐẲNG CẤP</h1>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat-item">
                    <h2>100%</h2>
                    <p>Bảo Hiểm</p>
                    </div>
                    <div class="stat-item">
                    <h2>10K</h2>
                    <p>Các Dự Án Đã Hoàn Thành</p>
                    </div>
                    <div class="stat-item">
                    <h2>1K</h2>
                    <p>Khách Hàng</p>
                    </div>
                    <div class="stat-item">
                    <h2>18+</h2>
                    <p>Bác Sĩ Có Kinh Nghiệm</p>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="image-section">
                    <img src="img/gioithieu.jpg" alt="">
                </div>
                <div class="content-section">
                    <div class="info-section">
                        <h2>Giải Pháp Toàn Diện Uy Tín, An Toàn, và Chuyên Nghiệp</h2>
                        <p>BS. SAC Phòng Khám Nam Khoa - là địa chỉ tin cậy, an toàn, và chuyên nghiệp. Chúng tôi mang đến những dịch vụ thẩm mỹ an toàn, hiệu quả... Phòng khám chuyên khoa BS. SAC tự hào là địa chỉ thăm khám và điều trị tin cậy, đáp ứng mọi nhu cầu của khách hàng với tiêu chuẩn quốc tế. Chúng tôi cam kết mang đến dịch vụ y tế chất lượng cao, chuyên nghiệp, với đội ngũ y bác sĩ giàu kinh nghiệm và trang thiết bị hiện đại.</p>
                        <p>Hãy đến với Phòng khám chuyên khoa BS. SAC để trải nghiệm dịch vụ y tế cao cấp và sự chăm sóc tận tâm. Chúng tôi luôn sẵn sàng đồng hành cùng bạn trên hành trình bảo vệ sức khỏe và sắc đẹp.</p>
                        <a href="#">Xem Thêm...</a>
                    </div>
                    <div class="services-section">
                        <div class="service">
                            <i class="fa-sharp-duotone fa-solid fa-user-doctor"></i>
                            <p>Bác Sĩ Chuyên Khoa</p>
                        </div>
                        <div class="service">
                            <i class="fa-sharp-duotone fa-solid fa-eye-slash"></i>
                            <p>Bảo Mật Tuyệt Đối</p>
                        </div>
                        <div class="service">
                            <i class="fa-sharp-duotone fa-solid fa-calendar-days"></i>
                            <p>Thăm Khám 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
            
            ';
        }
    ?>

            
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

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

        function displayChart() {
            const ctx = document.getElementById('chartCanvas').getContext('2d');
            
            if (window.myChart) {
                window.myChart.destroy();
            }
            
            // Create new chart instance
            window.myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Dịch vụ 1', 'Dịch vụ 2', 'Dịch vụ 3'],
                    datasets: [{
                        label: 'Số lượng',
                        data: [12, 19, 7], 
                        backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                        borderColor: ['rgba(75, 192, 192, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        document.getElementById('statisticForm').addEventListener('submit', function(event) {
            event.preventDefault();
            displayChart();
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