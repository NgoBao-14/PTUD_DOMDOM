<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/doctor.css">
    <title>ChucNangCuaBacSi</title>
</head>
<body>
<!-- header -->
<?php include("../interface/header.php"); ?>
<!-- NhatCuong test -->
<div class="container mt-4 mb-3 doctor-functions">
        <div class="row">
            <!-- Danh sách chức năng -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DANH SÁCH CHỨC NĂNG</h5>
                        <button class="btn btn-function w-100 mb-2" onclick="showContent('đăng-ký-lịch-làm-việc', this)">Đăng ký lịch làm việc</button>
                        <button class="btn btn-function w-100 mb-2" onclick="showContent('xem-lịch-làm-việc', this)">Xem lịch làm việc</button>
                        <button class="btn btn-function w-100 mb-2" onclick="showContent('xem-danh-sách-khám', this)">Xem danh sách khám</button>
                        <button class="btn btn-function w-100 mb-2" onclick="showContent('xem-thông-tin-bệnh-nhân', this)">Xem thông tin bệnh nhân</button>
                        <button class="btn btn-function w-100" onclick="showContent('xem-lịch-sử-khám-bệnh', this)">Xem lịch sử khám bệnh</button>
                    </div>
                </div>
            </div>

            <!-- Khu vực nội dung chức năng -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" id="content-area">
                        <h5 class="card-title">Chọn một chức năng từ danh sách bên trái</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include("../interface/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentWeek = new Date();

        // Hiển thị nội dung tương ứng với chức năng được chọn
        function showContent(contentType, button) {
            document.querySelectorAll('.card-body .btn-function').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');

            const contentArea = document.getElementById('content-area');
            let content = '';

            switch (contentType) {
                case 'đăng-ký-lịch-làm-việc':
                    content = generateScheduleContent('Đăng ký lịch làm việc', true);
                    break;
                case 'xem-lịch-làm-việc':
                    content = generateScheduleContent('Xem lịch làm việc', false);
                    break;
                case 'xem-danh-sách-khám':
                    content = '<h5 class="card-title">Xem danh sách khám</h5><p>Danh sách các cuộc hẹn khám sẽ được hiển thị ở đây.</p>';
                    break;
                case 'xem-thông-tin-bệnh-nhân':
                    content = `
                        <h5 class="card-title">Xem thông tin bệnh nhân</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nhập mã ID bệnh nhân" id="patient-id">
                            <button class="btn btn-outline-secondary" type="button" onclick="searchPatient()">Tìm kiếm</button>
                        </div>
                        <div id="patient-info"></div>
                    `;
                    break;
                case 'xem-lịch-sử-khám-bệnh':
                    content = '<h5 class="card-title">Xem lịch sử khám bệnh</h5><p>Lịch sử khám bệnh của bệnh nhân sẽ được hiển thị ở đây.</p>';
                    break;
                default:
                    content = '<h5 class="card-title">Chọn một chức năng từ danh sách bên trái</h5>';
            }

            contentArea.innerHTML = content;
        }

        // Hàm tạo nội dung lịch làm việc theo tuần
        function generateScheduleContent(title, isEditable) {
            const weekStart = new Date(currentWeek);
            weekStart.setDate(weekStart.getDate() - weekStart.getDay() + 1);
            const weekEnd = new Date(weekStart);
            weekEnd.setDate(weekEnd.getDate() + 6);

            let content = `
                <h5 class="card-title">${title}</h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button class="btn btn-secondary" onclick="changeWeek(-1)">Tuần trước</button>
                    <span>${weekStart.toLocaleDateString('vi-VN')} - ${weekEnd.toLocaleDateString('vi-VN')}</span>
                    <button class="btn btn-secondary" onclick="changeWeek(1)">Tuần sau</button>
                </div>
                <div class="text-center mb-3">
                    <button class="btn btn-primary" onclick="resetToCurrentWeek()">Tuần hiện tại</button>
                    ${!isEditable ? '<button class="btn btn-info ms-2" onclick="printSchedule()">In lịch làm việc</button>' : ''}
                </div>
                <table class="table table-bordered schedule-table">
                    <thead>
                        <tr>
                            <th>Thứ 2</th>
                            <th>Thứ 3</th>
                            <th>Thứ 4</th>
                            <th>Thứ 5</th>
                            <th>Thứ 6</th>
                            <th>Thứ 7</th>
                            <th>Chủ nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
            `;

            for (let i = 0; i < 7; i++) {
                content += `
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="${i}-morning" ${isEditable ? '' : 'disabled'}>
                            <label class="form-check-label" for="${i}-morning">Sáng</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="${i}-afternoon" ${isEditable ? '' : 'disabled'}>
                            <label class="form-check-label" for="${i}-afternoon">Chiều</label>
                        </div>
                    </td>
                `;
            }

            content += `
                        </tr>
                    </tbody>
                </table>
            `;

            if (isEditable) {
                content += '<button class="btn btn-primary mt-3" onclick="saveSchedule()">Đăng ký lịch làm việc</button>';
            }

            return content;
        }

        function changeWeek(direction) {
            currentWeek.setDate(currentWeek.getDate() + direction * 7);
            const activeButton = document.querySelector('.btn-function.active');
            if (activeButton) {
                showContent(activeButton.textContent.trim().toLowerCase().replace(/\s+/g, '-'), activeButton);
            }
        }

        function saveSchedule() {
            alert('Lịch làm việc đã được đăng ký!');
        }

        function searchPatient() {
            const patientId = document.getElementById('patient-id').value;
            const patientInfo = document.getElementById('patient-info');

            const patientData = {
                id: patientId,
                name: 'Nguyễn Văn A',
                age: 35,
                gender: 'Nam',
                address: '123 Đường ABC, Quận XYZ, TP.HCM'
            };

            patientInfo.innerHTML = `
                <h6>Thông tin bệnh nhân</h6>
                <p><strong>Mã ID:</strong> ${patientData.id}</p>
                <p><strong>Họ và tên:</strong> ${patientData.name}</p>
                <p><strong>Tuổi:</strong> ${patientData.age}</p>
                <p><strong>Giới tính:</strong> ${patientData.gender}</p>
                <p><strong>Địa chỉ:</strong> ${patientData.address}</p>
            `;
        }

        function resetToCurrentWeek() {
            currentWeek = new Date();
            const activeButton = document.querySelector('.btn-function.active');
            if (activeButton) {
                showContent(activeButton.textContent.trim().toLowerCase().replace(/\s+/g, '-'), activeButton);
            }
        }

        function printSchedule() {
            window.print();
        }
    </script>
</body>
</html>