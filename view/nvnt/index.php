<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nvyt.css">
    <title>Document</title>
</head>

<body>
    <!-- header -->
    <?php include("../interface/header.php"); ?>
    <div class="main">
        <div class="container mt-3 mb-3">
            <div class="row">
                <div class="col-md-3 p-3 border-end">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Chức năng</h5>
                            <div class="list-group">
                                <button class="tab_btn active" id="a">Danh sách đơn thuốc</button>
                                <button class="tab_btn" id="a">Chi tiết đơn thuốc</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 p-3">
                    <div class="card mb-4">
                        <div class="table-panel">
                            <div class="content active" id="a1">
                                <h1>Danh Sách Hóa Đơn</h1>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã đơn thuốc</th>
                                            <th style="text-align: center;">Tên Bệnh Nhân</th>
                                            <th style="text-align: center;">Ngày tạo</th>
                                            <th style="text-align: center;">Trạng thái</th>
                                            <th style="text-align: center;">Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="STT">1</td>
                                            <td data-label="Order ID">#1001</td>
                                            <td data-label="Customer">Ngô Huỳnh Hoài Bảo</td>
                                            <td data-label="Date">27/10/2024</td>
                                            <td data-label="Status"><span class="status status-completed">Completed</span>
                                            <td data-label="MT"></td>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="content" id="a1">
                                <h1>Đơn thuốc #1001</h1>
                                <span class="status status-completed">Processing</span>
                                <div class="customer-info">
                                    <h2>Thông tin bệnh nhân</h2>
                                    <div class="info-grid">
                                        <div class="info-item">
                                            <div class="info-label">Họ và tên:</div>
                                            <div>Ngô Huỳnh Hoài Bảo</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Email:</div>
                                            <div>ngobao3861@gmail.com</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Điện thoại:</div>
                                            <div>0948520853</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">BHYT:</div>
                                            <div>XXXXXXXXXX</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Bác sĩ:</div>
                                            <div>Đoàn Duy Khương</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Dịch vụ:</div>
                                            <div>Khám tổng quát</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Thời gian</div>
                                            <div>27/10/2024</div>
                                        </div>
                                    </div>
                                </div>
                                <h2>Thuốc: </h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">STT</th>
                                            <th style="text-align: center;">Mã thuốc</th>
                                            <th style="text-align: center;">Tên thuốc</th>
                                            <th style="text-align: center;">Số lượng</th>
                                            <th style="text-align: center;">Giá</th>
                                            <th style="text-align: center;">Mô tả</th>
                                            <th style="text-align: center;">Thành tiền</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>001</td>
                                            <td>Paracetamon</td>
                                            <td>2</td>
                                            <td>2,000</td>
                                            <td>Uống sau khi ăn</td>
                                            <td>4,000</td>
                                        </tr>
                                        <tr>
                                            <th colspan="6" style="text-align: center;">Tổng cộng</th>
                                            <td>4,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- footer -->
    <?php include("../interface/footer.php"); ?>

    <script>
    function initializeTabs(tabClass, contentClass) {
        const tabs = document.querySelectorAll(tabClass);
        const allContent = document.querySelectorAll(contentClass);

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                allContent.forEach(content => content.classList.remove('active'));
                allContent[index].classList.add('active');
            });
        });
    }

    // Initialize tabs for each section
    initializeTabs('#a', '#a1');
    </script>
</body>

</html>