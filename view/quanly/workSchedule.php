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
<?php include("../interface/header.php"); ?>
    <div class="main">
        <div class="container mt-3 mb-3">
            <div class="row">
                <div class="col-md-3 p-3 border-end">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Danh sách các khoa</h5>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active sidebar-item" data-department="Nội">Nội</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Ngoại">Ngoại</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Nhi">Nhi</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Sản">Sản</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Tai mũi họng">Tai mũi họng</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Da liễu">Da liễu</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Răng hàm mặt">Răng hàm mặt</a>
                                <a href="#" class="list-group-item list-group-item-action sidebar-item" data-department="Mắt">Mắt</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 p-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Thời khóa biểu-<span id="current-department">Nội</span></h5>
                            <div class="schedule-grid">
                                <div class="schedule-day">
                                    <div>Thứ 2</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 2" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 2" data-shift="Chiều">Chiều</button>
                                </div>
                                <div class="schedule-day">
                                    <div>Thứ 3</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 3" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 3" data-shift="Chiều">Chiều</button>
                                </div>
                                <div class="schedule-day">
                                    <div>Thứ 4</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 4" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 4" data-shift="Chiều">Chiều</button>
                                </div>
                                <div class="schedule-day">
                                    <div>Thứ 5</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 5" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 5" data-shift="Chiều">Chiều</button>
                                </div>
                                <div class="schedule-day">
                                    <div>Thứ 6</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 6" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 6" data-shift="Chiều">Chiều</button>
                                </div>
                                <div class="schedule-day">
                                    <div>Thứ 7</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 7" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Thứ 7" data-shift="Chiều">Chiều</button>
                                </div>
                                <div class="schedule-day">
                                    <div>Chủ nhật</div>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Chủ nhật" data-shift="Sáng">Sáng</button>
                                    <button class="btn btn-outline-primary btn-sm" data-day="Chủ nhật" data-shift="Chiều">Chiều</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3" id="doctor-list-title">Vui lòng chọn khoa và ca làm việc</h5>
                            <div id="doctor-list">
                                <!-- Doctor list will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <div id="alert-message" class="alert d-none" role="alert"></div>
                        <button id="confirm-schedule" class="btn btn-primary">Xác nhận lịch làm việc</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../interface/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const departmentLinks = document.querySelectorAll('.sidebar-item');
        const scheduleButtons = document.querySelectorAll('.schedule-day button');
        const doctorListTitle = document.getElementById('doctor-list-title');
        const doctorList = document.getElementById('doctor-list');
        const currentDepartment = document.getElementById('current-department');
        const confirmButton = document.getElementById('confirm-schedule');

        // Dummy data for doctors (you can replace this with actual data from your backend)
        const doctorsByDepartment = {
            'Nội': ['Dr. Nguyễn Văn A', 'Dr. Trần Thị B', 'Dr. Lê Văn C'],
            'Ngoại': ['Dr. Phạm Thị D', 'Dr. Hoàng Văn E', 'Dr. Nguyễn Thị F'],
            'Nhi': ['Dr. Nguyễn Văn B', 'Dr. Trần Thị C', 'Dr. Lê Văn D'],
            'Sản': ['Dr. Phạm Thị E', 'Dr. Hoàng Văn F', 'Dr. Nguyễn Thị G'],
            'Tai mũi họng': ['Dr. Lê Văn H', 'Dr. Trần Thị I', 'Dr. Nguyễn Văn J'],
            'Da liễu': ['Dr. Hoàng Văn K', 'Dr. Phạm Thị L', 'Dr. Lê Văn M'],
            'Răng hàm mặt': ['Dr. Nguyễn Thị N', 'Dr. Trần Văn O', 'Dr. Phạm Thị P'],
            'Mắt': ['Dr. Lê Văn Q', 'Dr. Hoàng Thị R', 'Dr. Nguyễn Văn S']
        };

        function updateDoctorList(department, day, shift) {
            if (!department || !day || !shift) {
                doctorListTitle.textContent = "Vui lòng chọn khoa và ca làm việc";
                doctorList.innerHTML = "";
                return;
            }
            const doctors = doctorsByDepartment[department] || [];
            doctorListTitle.textContent = `Danh sách bác sĩ đăng ký ca ${day}-${shift}`;
            doctorList.innerHTML = doctors.map(doctor => `
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="${doctor}">
                    <label class="form-check-label" for="${doctor}">${doctor}</label>
                </div>
            `).join('');
        }

        function showAlert(message, type) {
            const alertDiv = document.getElementById('alert-message');
            alertDiv.textContent = message;
            alertDiv.className = `alert alert-${type}`;
            alertDiv.classList.remove('d-none');
            setTimeout(() => {
                alertDiv.classList.add('d-none');
            }, 3000);
        }

        departmentLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                departmentLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                const department = this.getAttribute('data-department');
                currentDepartment.textContent = department;
                scheduleButtons.forEach(b => b.classList.remove('active'));
                updateDoctorList(department, null, null);
            });
        });

        scheduleButtons.forEach(button => {
            button.addEventListener('click', function() {
                scheduleButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const activeDepartment = document.querySelector('.sidebar-item.active').getAttribute('data-department');
                updateDoctorList(activeDepartment, this.getAttribute('data-day'), this.getAttribute('data-shift'));
            });
        });

        confirmButton.addEventListener('click', function() {
            const activeDepartment = document.querySelector('.sidebar-item.active');
            const activeShift = document.querySelector('.schedule-day button.active');
            const checkedDoctors = document.querySelectorAll('#doctor-list input:checked');

            if (!activeDepartment || !activeShift) {
                showAlert('Vui lòng chọn khoa và ca làm việc', 'warning');
            } else if (checkedDoctors.length === 0) {
                showAlert('Vui lòng chọn ít nhất một bác sĩ', 'warning');
            } else {
                showAlert('Xác nhận lịch làm việc thành công', 'success');
                // Ở đây bạn có thể thêm code để gửi dữ liệu đến server
            }
        });

        // Initialize with just the department selected
        updateDoctorList('Nội', null, null);
    });
    </script>
</body>
</html>