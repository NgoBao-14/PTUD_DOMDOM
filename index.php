<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Đom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
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
            </div>';
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