<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nurse.css">

    <title>Document</title>
</head>
<body>
 <!-- header -->
 <?php include("../interface/header.php"); ?>
<div class="main">
<div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">THÔNG TIN QUẢN LÝ</h2>
                            <div class="d-grid gap-3">
                            <a href="doctor.php" class="btn btn-primary">Thông tin bác sĩ</a>
                            <a href="nurse.php" class="btn btn-secondary">Thông tin nhân viên y tế</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="input-group w-25">
                                  <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                  <button class="btn btn-outline-secondary" type="button">OK</button>
                                </div>
                                <h2 class="card-title">Danh Sách Nhân Viên Y Tế</h2>
                                <button class="btn btn-secondary">Bộ Lọc</button>
                              </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Nhân Viên Y Tế</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="nurse-row" data-id="1">
                                            <td>1</td>
                                            <td>21055152</td>
                                            <td>Nguyễn Thị Hoa</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button id="add-nurse-btn" class="btn btn-primary mt-3">Thêm Nhân Viên Y Tế Mới +</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal for adding new nurse -->
    <div class="modal fade" id="addNurseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Nhân Viên Y Tế Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addNurseForm">
                        <div class="mb-3 row">
                            <label for="nurseName" class="col-sm-4 col-form-label">Họ và tên nhân viên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nurseName" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nurseDob" class="col-sm-4 col-form-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="nurseDob" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nurseGender" class="col-sm-4 col-form-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="nurseGender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nurseAddress" class="col-sm-4 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nurseAddress" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nurseEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="nurseEmail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nursePhone" class="col-sm-4 col-form-label">SDT</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="nursePhone" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nurseRole" class="col-sm-4 col-form-label">Vai trò</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="nurseRole" required>
                                    <option value="Điều dưỡng">Điều dưỡng</option>
                                    <option value="Hộ lý">Hộ lý</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nurseDepartment" class="col-sm-4 col-form-label">Khoa</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="nurseDepartment" required>
                                    <option value="Khoa Nội">Khoa Nội</option>
                                    <option value="Khoa Ngoại">Khoa Ngoại</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="submitNewNurse">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for nurse details -->
    <div class="modal fade" id="nurseDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông Tin Chi Tiết Nhân Viên Y Tế</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Mã Nhân Viên</th>
                            <td id="detailNurseEmployeeId"></td>
                        </tr>
                        <tr>
                            <th>Họ và tên nhân viên</th>
                            <td id="detailNurseName"></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td id="detailNurseDob"></td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td id="detailNurseGender"></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td id="detailNurseAddress"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="detailNurseEmail"></td>
                        </tr>
                        <tr>
                            <th>SDT</th>
                            <td id="detailNursePhone"></td>
                        </tr>
                        <tr>
                            <th>Vai trò</th>
                            <td id="detailNurseRole"></td>
                        </tr>
                        <tr>
                            <th>Khoa</th>
                            <td id="detailNurseDepartment"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editNurseBtn">Sửa</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    <button type="button" class="btn btn-danger" id="deleteNurseBtn">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing nurse information -->
    <div class="modal fade" id="editNurseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Thông Tin Nhân Viên Y Tế</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editNurseForm">
                        <div class="mb-3 row">
                            <label for="editNurseEmployeeId" class="col-sm-4 col-form-label">Mã Nhân Viên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editNurseEmployeeId" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseName" class="col-sm-4 col-form-label">Họ và tên nhân viên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editNurseName" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseDob" class="col-sm-4 col-form-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="editNurseDob" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseGender" class="col-sm-4 col-form-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="editNurseGender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseAddress" class="col-sm-4 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editNurseAddress" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="editNurseEmail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNursePhone" class="col-sm-4 col-form-label">SDT</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="editNursePhone" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseRole" class="col-sm-4 col-form-label">Vai trò</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="editNurseRole" required>
                                    <option value="Điều dưỡng">Điều dưỡng</option>
                                    <option value="Hộ lý">Hộ lý</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editNurseDepartment" class="col-sm-4 col-form-label">Khoa</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="editNurseDepartment" required>
                                    <option value="Khoa Nội">Khoa Nội</option>
                                    <option value="Khoa Ngoại">Khoa Ngoại</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="submitEditNurse">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Buttons
    const addNurseBtn = document.getElementById('add-nurse-btn');

    // Modals
    const addNurseModal = new bootstrap.Modal(document.getElementById('addNurseModal'));
    const nurseDetailsModal = new bootstrap.Modal(document.getElementById('nurseDetailsModal'));
    const editNurseModal = new bootstrap.Modal(document.getElementById('editNurseModal'));

    // Forms
    const addNurseForm = document.getElementById('addNurseForm');
    const editNurseForm = document.getElementById('editNurseForm');

    // Nurse functionality
    addNurseBtn.addEventListener('click', function() {
        addNurseModal.show();
    });

    document.getElementById('submitNewNurse').addEventListener('click', function() {
        if (addNurseForm.checkValidity()) {
            const formData = new FormData(addNurseForm);
            const nurseData = Object.fromEntries(formData);
            console.log('New nurse data:', nurseData);
            
            // Here you would typically send this data to a server
            // For now, we'll just add it to the table
            addNurseToTable(nurseData);
            
            addNurseModal.hide();
            addNurseForm.reset();
        } else {
            addNurseForm.reportValidity();
        }
    });

    function addNurseToTable(nurseData) {
        const table = document.querySelector('table tbody');
        const newRow = table.insertRow();
        newRow.classList.add('nurse-row');
        newRow.setAttribute('data-id', Date.now().toString()); // Using timestamp as a temporary ID
        newRow.innerHTML = `
            <td>${table.rows.length}</td>
            <td>${nurseData.employeeId || 'N/A'}</td>
            <td>${nurseData.nurseName}</td>
        `;
        addNurseClickListener(newRow);
    }

    function addNurseClickListener(row) {
        row.addEventListener('click', function() {
            const nurseId = this.getAttribute('data-id');
            // In a real application, you would fetch the nurse data from a server
            // For this example, we'll use the data in the row
            const nurseData = {
                employeeId: this.cells[1].textContent,
                name: this.cells[2].textContent,
                // For demonstration, we'll use placeholder data for other fields
                dob: '1990-01-01',
                gender: 'Nữ',
                address: '123 Đường ABC, Quận XYZ, TP.HCM',
                email: 'nurse@example.com',
                phone: '0123456789',
                role: 'Điều dưỡng',
                department: 'Khoa Nội'
            };

            populateNurseDetails(nurseData);
            nurseDetailsModal.show();
        });
    }

    function populateNurseDetails(nurseData) {
        document.getElementById('detailNurseEmployeeId').textContent = nurseData.employeeId;
        document.getElementById('detailNurseName').textContent = nurseData.name;
        document.getElementById('detailNurseDob').textContent = nurseData.dob;
        document.getElementById('detailNurseGender').textContent = nurseData.gender;
        document.getElementById('detailNurseAddress').textContent = nurseData.address;
        document.getElementById('detailNurseEmail').textContent = nurseData.email;
        document.getElementById('detailNursePhone').textContent = nurseData.phone;
        document.getElementById('detailNurseRole').textContent = nurseData.role;
        document.getElementById('detailNurseDepartment').textContent = nurseData.department;
    }

    document.querySelectorAll('.nurse-row').forEach(addNurseClickListener);

    document.getElementById('editNurseBtn').addEventListener('click', function() {
        nurseDetailsModal.hide();
        
        // Populate the edit form with the current nurse data
        document.getElementById('editNurseEmployeeId').value = document.getElementById('detailNurseEmployeeId').textContent;
        document.getElementById('editNurseName').value = document.getElementById('detailNurseName').textContent;
        document.getElementById('editNurseDob').value = document.getElementById('detailNurseDob').textContent;
        document.getElementById('editNurseGender').value = document.getElementById('detailNurseGender').textContent;
        document.getElementById('editNurseAddress').value = document.getElementById('detailNurseAddress').textContent;
        document.getElementById('editNurseEmail').value = document.getElementById('detailNurseEmail').textContent;
        document.getElementById('editNursePhone').value = document.getElementById('detailNursePhone').textContent;
        document.getElementById('editNurseRole').value = document.getElementById('detailNurseRole').textContent;
        document.getElementById('editNurseDepartment').value = document.getElementById('detailNurseDepartment').textContent;

        editNurseModal.show();
    });

    document.getElementById('submitEditNurse').addEventListener('click', function() {
        if (editNurseForm.checkValidity()) {
            const formData = new FormData(editNurseForm);
            const updatedNurseData = Object.fromEntries(formData);
            console.log('Updated nurse data:', updatedNurseData);
            
            // Here you would typically send this data to a server to update the nurse information
            // For now, we'll just update the nurse details modal and the table
            updateNurseDetails(updatedNurseData);
            updateNurseInTable(updatedNurseData);
            
            editNurseModal.hide();
            nurseDetailsModal.show();
        } else {
            editNurseForm.reportValidity();
        }
    });

    function updateNurseDetails(nurseData) {
        populateNurseDetails(nurseData);
    }

    function updateNurseInTable(nurseData) {
        const rows = document.querySelectorAll('.nurse-row');
        for (let row of rows) {
            if (row.cells[1].textContent === nurseData.editNurseEmployeeId) {
                row.cells[2].textContent = nurseData.editNurseName;
                break;
            }
        }
    }

    document.getElementById('deleteNurseBtn').addEventListener('click', function() {
        const employeeId = document.getElementById('detailNurseEmployeeId').textContent;
        console.log('Delete nurse with Employee ID:', employeeId);
        
        // Here you would typically send a request to the server to delete the nurse
        // For now, we'll just remove the nurse from the table
        deleteNurseFromTable(employeeId);
        
        nurseDetailsModal.hide();
    });

    function deleteNurseFromTable(employeeId) {
        const rows = document.querySelectorAll('.nurse-row');
        for (let row of rows) {
            if (row.cells[1].textContent === employeeId) {
                row.remove();
                break;
            }
        }
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const doctorBtn = document.querySelector('a[href="../HTML/doctor.html"]');
    const nurseBtn = document.querySelector('a[href="../HTML/nurse.HTML"]');

    function setActiveButton(activeBtn, inactiveBtn) {
        activeBtn.classList.add('active');
        activeBtn.classList.remove('btn-secondary');
        activeBtn.classList.add('btn-primary');

        inactiveBtn.classList.remove('active');
        inactiveBtn.classList.remove('btn-primary');
        inactiveBtn.classList.add('btn-secondary');
    }

    doctorBtn.addEventListener('click', function(e) {
        setActiveButton(doctorBtn, nurseBtn);
    });

    nurseBtn.addEventListener('click', function(e) {
        setActiveButton(nurseBtn, doctorBtn);
    });

    // Set initial active state based on current page
    if (window.location.href.includes('doctor.html')) {
        setActiveButton(doctorBtn, nurseBtn);
    } else if (window.location.href.includes('nurse.HTML')) {
        setActiveButton(nurseBtn, doctorBtn);
    }
});
    </script>
</div>

 <!-- footer -->
 <?php include("../interface/footer.php"); ?>
</body>
</html>