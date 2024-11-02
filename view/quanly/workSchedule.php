<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch làm việc - Dom Đóm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/workSchedule.css">
    <style>
        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
        .schedule-day {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #f8f9fa;
        }
        .doctor-list {
            max-height: 200px;
            overflow-y: auto;
        }
        .shift {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .shift-morning {
            background-color: #e6f3ff;
        }
        .shift-afternoon {
            background-color: #fff0e6;
        }
        .doctor-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .doctor-drag-handle {
            cursor: move;
            margin-right: 5px;
        }
        .form-check-label {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
<?php include("../interface/header.php"); ?>
    <div class="main">
        <div class="container-fluid mt-3 mb-3">
            <div class="row">
                <div class="col-md-2 p-3 border-end">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Danh sách các khoa</h5>
                            <div class="list-group" id="department-list">
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
                <div class="col-md-10 p-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Thời khóa biểu - <span id="current-department">Nội</span></h5>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="doctor-search" placeholder="Tìm kiếm bác sĩ...">
                            </div>
                            <div class="schedule-grid">
                                <!-- Schedule grid will be populated by JavaScript -->
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
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const departmentLinks = document.querySelectorAll('.sidebar-item');
            const scheduleGrid = document.querySelector('.schedule-grid');
            const currentDepartment = document.getElementById('current-department');
            const confirmButton = document.getElementById('confirm-schedule');
            const doctorSearch = document.getElementById('doctor-search');

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

            const days = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ nhật'];

            function updateSchedule(department) {
                scheduleGrid.innerHTML = '';
                const doctors = doctorsByDepartment[department] || [];

                days.forEach(day => {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'schedule-day';
                    dayElement.innerHTML = `
                        <h6>${day}</h6>
                        <div class="shift shift-morning">
                            <strong><i class="bi bi-brightness-high"></i> Sáng:</strong>
                            <div class="doctor-list" data-shift="morning" data-day="${day}">
                                ${doctors.map(doctor => `
                                    <div class="doctor-item" draggable="true" data-doctor="${doctor}">
                                        <span class="doctor-drag-handle"><i class="bi bi-grip-vertical"></i></span>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="${doctor}-${day}-sang" name="morning">
                                            <label class="form-check-label" for="${doctor}-${day}-sang">${doctor}</label>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                        <div class="shift shift-afternoon">
                            <strong><i class="bi bi-sun"></i> Chiều:</strong>
                            <div class="doctor-list" data-shift="afternoon" data-day="${day}">
                                ${doctors.map(doctor => `
                                    <div class="doctor-item" draggable="true" data-doctor="${doctor}">
                                        <span class="doctor-drag-handle"><i class="bi bi-grip-vertical"></i></span>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="${doctor}-${day}-chieu" name="afternoon">
                                            <label class="form-check-label" for="${doctor}-${day}-chieu">${doctor}</label>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `;
                    scheduleGrid.appendChild(dayElement);
                });

                // Initialize drag and drop
                const doctorLists = document.querySelectorAll('.doctor-list');
                doctorLists.forEach(list => {
                    new Sortable(list, {
                        group: 'shared',
                        animation: 150,
                        handle: '.doctor-drag-handle',
                        onEnd: function (evt) {
                            const item = evt.item;
                            const checkbox = item.querySelector('input[type="checkbox"]');
                            const newShift = evt.to.dataset.shift;
                            const newDay = evt.to.dataset.day;
                            const doctor = item.dataset.doctor;
                            
                            checkbox.id = `${doctor}-${newDay}-${newShift === 'morning' ? 'sang' : 'chieu'}`;
                            checkbox.name = newShift;
                            checkbox.nextElementSibling.htmlFor = checkbox.id;
                        }
                    });
                });
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
                    updateSchedule(department);
                });
            });

            confirmButton.addEventListener('click', function() {
                const checkedDoctors = document.querySelectorAll('.schedule-grid input:checked');
                if (checkedDoctors.length === 0) {
                    showAlert('Vui lòng chọn ít nhất một bác sĩ', 'warning');
                } else {
                    showAlert('Xác nhận lịch làm việc thành công', 'success');
                    // Thêm logic xử lý dữ liệu ở đây nếu cần
                }
            });

            doctorSearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const doctorItems = document.querySelectorAll('.doctor-item');
                doctorItems.forEach(item => {
                    const doctorName = item.querySelector('.form-check-label').textContent.toLowerCase();
                    if (doctorName.includes(searchTerm)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Hiển thị lịch làm việc cho khoa Nội khi trang được tải
            updateSchedule('Nội');
        });
    </script>
</body>
</html>