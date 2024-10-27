<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/doctor.css">
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
                                <h2 class="card-title">Danh Sách Bác Sĩ</h2>
                                <button class="btn btn-secondary">Bộ Lọc</button>
                              </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Bác Sĩ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="doctor-row" data-id="1">
                                            <td>1</td>
                                            <td>21055151</td>
                                            <td>Đoàn Duy Khương</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button id="add-doctor-btn" class="btn btn-primary mt-3">Thêm Bác Sĩ Mới +</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal for adding new doctor -->
    <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Bác Sĩ Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addDoctorForm">
                        <div class="mb-3 row">
                            <label for="doctorName" class="col-sm-4 col-form-label">Họ và tên bác sĩ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="doctorName" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorDob" class="col-sm-4 col-form-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="doctorDob" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorGender" class="col-sm-4 col-form-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="doctorGender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorAddress" class="col-sm-4 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="doctorAddress" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="doctorEmail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorPhone" class="col-sm-4 col-form-label">SDT</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="doctorPhone" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorRole" class="col-sm-4 col-form-label">Vai trò</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="doctorRole" required>
                                    <option value="Khám Bệnh">Khám Bệnh</option>
                                    <option value="Phẫu Thuật">Phẫu Thuật</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="doctorSpecialty" class="col-sm-4 col-form-label">Chuyên khoa</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="doctorSpecialty" required>
                                    <option value="Khoa Mắt">Khoa Mắt</option>
                                    <option value="Khoa Xương khớp">Khoa Xương khớp</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="submitNewDoctor">Thêm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for doctor details -->
    <div class="modal fade" id="doctorDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông Tin Chi Tiết Bác Sĩ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Mã Nhân Viên</th>
                            <td id="detailDoctorEmployeeId"></td>
                        </tr>
                        <tr>
                            <th>Họ và tên bác sĩ</th>
                            <td id="detailDoctorName"></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td id="detailDoctorDob"></td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td id="detailDoctorGender"></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td id="detailDoctorAddress"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="detailDoctorEmail"></td>
                        </tr>
                        <tr>
                            <th>SDT</th>
                            <td id="detailDoctorPhone"></td>
                        </tr>
                        <tr>
                            <th>Vai trò</th>
                            <td id="detailDoctorRole"></td>
                        </tr>
                        <tr>
                            <th>Chuyên khoa</th>
                            <td id="detailDoctorSpecialty"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editDoctorBtn">Sửa</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    <button type="button" class="btn btn-danger" id="deleteDoctorBtn">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing doctor information -->
    <div class="modal fade" id="editDoctorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Thông Tin Bác Sĩ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDoctorForm">
                        <div class="mb-3 row">
                            <label for="editDoctorEmployeeId" class="col-sm-4 col-form-label">Mã Nhân Viên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editDoctorEmployeeId" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorName" class="col-sm-4 col-form-label">Họ và tên bác sĩ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editDoctorName" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorDob" class="col-sm-4 col-form-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="editDoctorDob" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorGender" class="col-sm-4 col-form-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="editDoctorGender" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorAddress" class="col-sm-4 col-form-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editDoctorAddress" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="editDoctorEmail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorPhone" class="col-sm-4 col-form-label">SDT</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="editDoctorPhone" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorRole" class="col-sm-4 col-form-label">Vai trò</label>
                            <div class="col-sm-8">
                                
                                <select class="form-select" id="editDoctorRole" required>
                                    <option value="Khám Bệnh">Khám Bệnh</option>
                                    <option value="Phẫu Thuật">Phẫu Thuật</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="editDoctorSpecialty" class="col-sm-4 col-form-label">Chuyên khoa</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="editDoctorSpecialty" required>
                                    <option value="Khoa Mắt">Khoa Mắt</option>
                                    <option value="Khoa Xương khớp">Khoa Xương khớp</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="submitEditDoctor">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Buttons
    const addDoctorBtn = document.getElementById('add-doctor-btn');

    // Modals
    const addDoctorModal = new bootstrap.Modal(document.getElementById('addDoctorModal'));
    const doctorDetailsModal = new bootstrap.Modal(document.getElementById('doctorDetailsModal'));
    const editDoctorModal = new bootstrap.Modal(document.getElementById('editDoctorModal'));

    // Forms
    const addDoctorForm = document.getElementById('addDoctorForm');
    const editDoctorForm = document.getElementById('editDoctorForm');

    // Doctor functionality
    addDoctorBtn.addEventListener('click', function() {
        addDoctorModal.show();
    });

    document.getElementById('submitNewDoctor').addEventListener('click', function() {
        if (addDoctorForm.checkValidity()) {
            const formData = new FormData(addDoctorForm);
            console.log('New doctor data:', Object.fromEntries(formData));
            addDoctorModal.hide();
            addDoctorForm.reset();
        } else {
            addDoctorForm.reportValidity();
        }
    });

    document.querySelectorAll('.doctor-row').forEach(row => {
        row.addEventListener('click', function() {
            const doctorId = this.getAttribute('data-id');
            // Fetch doctor data (replace with actual data fetching)
            const doctorData = {
                employeeId: '21055151',
                name: 'Đoàn Duy Khương',
                dob: '2003-01-01',
                gender: 'Nam',
                address: '12, Nguyễn Văn Bảo, p4, Gò Vấp, tp.HCM',
                email: 'khuong@gmail.com',
                phone: '0123456789',
                role: 'Khám Bệnh',
                specialty: 'Khoa Mắt'
            };

            // Populate the modal with doctor data
            document.getElementById('detailDoctorEmployeeId').textContent = doctorData.employeeId;
            document.getElementById('detailDoctorName').textContent = doctorData.name;
            document.getElementById('detailDoctorDob').textContent = doctorData.dob;
            document.getElementById('detailDoctorGender').textContent = doctorData.gender;
            document.getElementById('detailDoctorAddress').textContent = doctorData.address;
            document.getElementById('detailDoctorEmail').textContent = doctorData.email;
            document.getElementById('detailDoctorPhone').textContent = doctorData.phone;
            document.getElementById('detailDoctorRole').textContent = doctorData.role;
            document.getElementById('detailDoctorSpecialty').textContent = doctorData.specialty;

            doctorDetailsModal.show();
        });
    });

    document.getElementById('editDoctorBtn').addEventListener('click', function() {
        doctorDetailsModal.hide();
        
        // Populate the edit form with the current doctor data
        document.getElementById('editDoctorEmployeeId').value = document.getElementById('detailDoctorEmployeeId').textContent;
        document.getElementById('editDoctorName').value = document.getElementById('detailDoctorName').textContent;
        document.getElementById('editDoctorDob').value = document.getElementById('detailDoctorDob').textContent;
        document.getElementById('editDoctorGender').value = document.getElementById('detailDoctorGender').textContent;
        document.getElementById('editDoctorAddress').value = document.getElementById('detailDoctorAddress').textContent;
        document.getElementById('editDoctorEmail').value = document.getElementById('detailDoctorEmail').textContent;
        document.getElementById('editDoctorPhone').value = document.getElementById('detailDoctorPhone').textContent;
        document.getElementById('editDoctorRole').value = document.getElementById('detailDoctorRole').textContent;
        document.getElementById('editDoctorSpecialty').value = document.getElementById('detailDoctorSpecialty').textContent;

        editDoctorModal.show();
    });

    document.getElementById('submitEditDoctor').addEventListener('click', function() {
        if (editDoctorForm.checkValidity()) {
            const formData = new FormData(editDoctorForm);
            console.log('Updated doctor data:', Object.fromEntries(formData));
            editDoctorModal.hide();
        } else {
            editDoctorForm.reportValidity();
        }
    });

    document.getElementById('deleteDoctorBtn').addEventListener('click', function() {
        console.log('Delete doctor');
        doctorDetailsModal.hide();
    });
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
 <!-- footer -->
 <?php include("../interface/footer.php"); ?>
</body>
</html>