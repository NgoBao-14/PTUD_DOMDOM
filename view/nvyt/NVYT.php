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
                                    <h2>Thông tin khách hàng</h2>
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
                                    </div>
                                </div>
                                <h2>Order Items</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Product</th>
                                            <th style="text-align: center;">Quantity</th>
                                            <th style="text-align: center;">Price</th>
                                            <th style="text-align: center;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Widget A</td>
                                            <td>2</td>
                                            <td>$25.00</td>
                                            <td>$50.00</td>
                                        </tr>
                                        <tr>
                                            <td>Gadget B</td>
                                            <td>1</td>
                                            <td>$40.00</td>
                                            <td>$40.00</td>
                                        </tr>
                                        <tr>
                                            <td>Tool C</td>
                                            <td>3</td>
                                            <td>$10.00</td>
                                            <td>$30.00</td>
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