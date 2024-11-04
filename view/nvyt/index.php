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
                                <button class="tab_btn active" id="a">Danh sách hóa đơn</button>
                                <button class="tab_btn" id="a">Chi tiết hóa đơn</button>
                                <button class="tab_btn" id="a">Sửa lịch khám</button>
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
                                            <th style="text-align: center;">Mã hóa đơn</th>
                                            <th style="text-align: center;">Tên Bệnh Nhân</th>
                                            <th style="text-align: center;">Ngày tạo</th>
                                            <th style="text-align: center;">Thành tiền</th>
                                            <th style="text-align: center;">Trạng thái</th>
                                            <th style="text-align: center;">Dịch vụ</th>
                                            <th style="text-align: center;">Mô tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="STT">1</td>
                                            <td data-label="Order ID">#1001</td>
                                            <td data-label="Customer">Ngô Huỳnh Hoài Bảo</td>
                                            <td data-label="Date">27/10/2024</td>
                                            <td data-label="Total">4.000.000</td>
                                            <td data-label="Status"><span
                                                    class="status status-completed">Completed</span>
                                            <td data-label="DV">Khám bệnh</td>
                                            <td data-label="MT">
                                                1231313222222222222222222222222222222222222222222222222222222222222222222222222222222222222221
                                            </td>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="content" id="a1">
                                <h1>Hóa đơn #1001</h1>
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
                                <h2>Phương thức thanh toán</h2>
                                <table class="payment-table">
                                    <tr>
                                        <td onclick="selectPayment('momo')">
                                            <div class="payment-icon momo"></div>
                                            MoMo
                                        </td>
                                        <td onclick="selectPayment('bank')">
                                            <div class="payment-icon bank"></div>
                                            Ngân hàng
                                        </td>
                                    </tr>
                                    <tr>
                                        <td onclick="selectPayment('visa')">
                                            <div class="payment-icon visa"></div>
                                            Thẻ Visa
                                        </td>
                                        <td onclick="selectPayment('cash')">
                                            <div class="payment-icon cash"></div>
                                            Tiền mặt
                                        </td>
                                    </tr>
                                </table>

                                <div id="momoAction" class="action-section">
                                    <div class="qr-code"></div>
                                </div>

                                <div id="bankAction" class="action-section">
                                    <div class="qr-code"></div>
                                </div>

                                <div id="visaAction" class="action-section" >
                                    <table id="card-payment-details" class="action-button" >
                                        <tr>
                                            <td>
                                                <label for="card-name">Name on Card</label>
                                            </td>
                                            <td>
                                                <input type="text" id="card-name" name="card-name" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="card-number">Card Number</label>
                                            </td>
                                            <td>
                                                <input type="text" id="card-number" name="card-number" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="expiry-date">Expiry Date</label>
                                            </td>
                                            <td>
                                                <input type="text" id="expiry-date" name="expiry-date"
                                                    placeholder="MM/YY" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="cvv">CVV</label>
                                            </td>
                                            <td>
                                                <input type="number" id="cvv" name="cvv" required>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                <div id="cashAction" class="action-section">
                                    
                                    <a href="#" class="action-button">Xác nhận thanh toán tiền mặt</a>
                                </div>
                            </div>

                            <script>
                            function selectPayment(method) {
                                // Remove 'selected' class from all cells
                                document.querySelectorAll('.payment-table td').forEach(cell => {
                                    cell.classList.remove('selected');
                                });

                                // Add 'selected' class to the clicked cell
                                event.currentTarget.classList.add('selected');

                                // Hide all action sections
                                document.querySelectorAll('.action-section').forEach(section => {
                                    section.style.display = 'none';
                                });

                                // Show the selected action section
                                document.getElementById(method + 'Action').style.display = 'block';
                            }
                            </script>
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