<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Dom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/thongKe.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php include("../interface/header.php"); ?>
    <div class="main">
        <div class="container mt-4 mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thống kê hóa đơn</h5>
                            <form id="statisticForm">
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
                            <canvas id="chartCanvas"></canvas>
                            </div>
                        </div>
                        <div class="card-footer text-end mt-2">
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
    <?php include("../interface/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>