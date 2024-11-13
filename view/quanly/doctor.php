<?php
include_once('../../model/ketnoi.php');

class Doctor {
    private $conn;

    public function __construct() {
        $ketnoi = new ketnoi();
        $this->conn = $ketnoi->moketnoi();
    }

    public function getAllDoctors() {
        $query = "SELECT nhanvien.*, chuyenkhoa.TenKhoa 
                  FROM nhanvien 
                  INNER JOIN bacsi ON nhanvien.MaNV = bacsi.MaNV 
                  INNER JOIN chuyenkhoa ON bacsi.MaKhoa = chuyenkhoa.MaKhoa 
                  WHERE nhanvien.ChucVu = 'Bác sĩ' AND nhanvien.TrangThaiLamViec != 'Đã nghỉ việc'";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDoctorById($id) {
        $query = "SELECT nhanvien.*, chuyenkhoa.TenKhoa, chuyenkhoa.MaKhoa 
                  FROM nhanvien 
                  INNER JOIN bacsi ON nhanvien.MaNV = bacsi.MaNV 
                  INNER JOIN chuyenkhoa ON bacsi.MaKhoa = chuyenkhoa.MaKhoa 
                  WHERE nhanvien.MaNV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addDoctor($data) {
        $this->conn->begin_transaction();

        try {
            if ($this->isDuplicatePhone($data['SoDT'])) {
                throw new Exception("Số điện thoại đã được sử dụng.");
            }
            if ($this->isDuplicateEmail($data['Email'])) {
                throw new Exception("Email đã được sử dụng.");
            }

            $newId = $this->generateNewEmployeeId();

            $query = "INSERT INTO nhanvien (MaNV, HovaTen, NgaySinh, SoDT, ChucVu, GioiTinh, TrangThaiLamViec, Email) 
                      VALUES (?, ?, ?, ?, 'Bác sĩ', ?, 'Đang làm việc', ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssssss", $newId, $data['HovaTen'], $data['NgaySinh'], $data['SoDT'], $data['GioiTinh'], $data['Email']);
            $stmt->execute();

            $query = "INSERT INTO bacsi (MaNV, MaKhoa) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("si", $newId, $data['MaKhoa']);
            $stmt->execute();

            $this->conn->commit();

            return $this->getDoctorById($newId);
        } catch (Exception $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function updateDoctor($id, $data) {
        $this->conn->begin_transaction();

        try {
            if ($this->isDuplicatePhone($data['SoDT'], $id)) {
                throw new Exception("Số điện thoại đã được sử dụng.");
            }
            if ($this->isDuplicateEmail($data['Email'], $id)) {
                throw new Exception("Email đã được sử dụng.");
            }

            $query = "UPDATE nhanvien SET NgaySinh = ?, SoDT = ?, GioiTinh = ?, Email = ? WHERE MaNV = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssss", $data['NgaySinh'], $data['SoDT'], $data['GioiTinh'], $data['Email'], $id);
            $stmt->execute();

            $query = "UPDATE bacsi SET MaKhoa = ? WHERE MaNV = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("is", $data['MaKhoa'], $id);
            $stmt->execute();

            $this->conn->commit();
            return $this->getDoctorById($id);
        } catch (Exception $e) {
            $this->conn->rollback();
            throw $e;
        }
    }

    public function softDeleteDoctor($id) {
        $query = "UPDATE nhanvien SET TrangThaiLamViec = 'Đã nghỉ việc' WHERE MaNV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }

    private function isDuplicatePhone($phone, $excludeId = null) {
        $query = "SELECT MaNV FROM nhanvien WHERE SoDT = ? AND MaNV != ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $phone, $excludeId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    private function isDuplicateEmail($email, $excludeId = null) {
        $query = "SELECT MaNV FROM nhanvien WHERE Email = ? AND MaNV != ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $email, $excludeId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    private function generateNewEmployeeId() {
        $query = "SELECT MAX(CAST(SUBSTRING(MaNV, 3) AS UNSIGNED)) as max_id FROM nhanvien";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        $newId = $row['max_id'] + 1;
        return 'NV' . str_pad($newId, 5, '0', STR_PAD_LEFT);
    }
}

$doctor = new Doctor();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'add':
            try {
                $newDoctor = $doctor->addDoctor($_POST);
                echo json_encode(['success' => true, 'message' => 'Thêm bác sĩ thành công', 'doctor' => $newDoctor]);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
            exit;

        case 'update':
            try {
                $updatedDoctor = $doctor->updateDoctor($_POST['MaNV'], $_POST);
                echo json_encode(['success' => true, 'message' => 'Cập nhật thông tin bác sĩ thành công', 'doctor' => $updatedDoctor]);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            }
            exit;

        case 'delete':
            $result = $doctor->softDeleteDoctor($_POST['MaNV']);
            echo json_encode(['success' => $result, 'message' => $result ? 'Xóa bác sĩ thành công' : 'Xóa bác sĩ thất bại']);
            exit;

        case 'get':
            $doctorData = $doctor->getDoctorById($_POST['MaNV']);
            echo json_encode($doctorData);
            exit;
    }
}

$doctors = $doctor->getAllDoctors();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bác Sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/doctor.css">
</head>
<body>
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
                                    <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm...">
                                    <button class="btn btn-outline-secondary" type="button" id="searchBtn">OK</button>
                                </div>
                                <h2 class="card-title">Danh Sách Bác Sĩ</h2>
                                <button class="btn btn-secondary" id="filterBtn">Bộ Lọc</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Bác Sĩ</th>
                                            <th>Chuyên Khoa</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorTableBody">
                                        <?php foreach ($doctors as $index => $doctor): ?>
                                        <tr class="doctor-row" data-id="<?php echo $doctor['MaNV']; ?>">
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $doctor['MaNV']; ?></td>
                                            <td><?php echo $doctor['HovaTen']; ?></td>
                                            <td><?php echo $doctor['TenKhoa']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <button id="add-doctor-btn" class="btn btn-primary mt-3">Thêm Bác Sĩ Mới +</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding/editing doctor -->
    <div class="modal fade" id="doctorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Thêm Bác Sĩ Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="doctorForm">
                        <input type="hidden" id="MaNV" name="MaNV">
                        <div class="mb-3 row">
                            <label for="HovaTen" class="col-sm-4 col-form-label">Họ và tên bác sĩ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="HovaTen" name="HovaTen" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="NgaySinh" class="col-sm-4 col-form-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="GioiTinh" class="col-sm-4 col-form-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="SoDT" class="col-sm-4 col-form-label">SDT</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="SoDT" name="SoDT" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="Email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="Email" name="Email" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="MaKhoa" class="col-sm-4 col-form-label">Chuyên khoa</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="MaKhoa" name="MaKhoa" required>
                                    <option value="1">Thần kinh</option>
                                    <option value="2">Tim mạch</option>
                                    <option value="3">Nội tiết</option>
                                    <option value="4">Ngoại khoa</option>
                                    <option value="5">Sản phụ khoa</option>
                                    <option value="6">Nhi khoa</option>
                                    <option value="7">Mắt</option>
                                    <option value="8">Răng hàm mặt</option>
                                    <option value="9">Tai mũi họng</option>
                                    <option value="10">Da liễu</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="saveDoctor">Lưu</button>
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
                            <td id="detailMaNV"></td>
                        </tr>
                        <tr>
                            <th>Họ và tên bác sĩ</th>
                            <td id="detailHovaTen"></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td id="detailNgaySinh"></td>
                        </tr>
                        <tr>
                            <th>Giới tính</th>
                            <td id="detailGioiTinh"></td>
                        </tr>
                        <tr>
                            <th>SDT</th>
                            <td id="detailSoDT"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="detailEmail"></td>
                        </tr>
                        <tr>
                            <th>Chuyên khoa</th>
                            <td id="detailTenKhoa"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="editDoctorBtn">Sửa</button>
                    <button type="button" class="btn btn-danger" id="deleteDoctorBtn">Xóa</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <?php include("../interface/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        const doctorModal = new bootstrap.Modal(document.getElementById('doctorModal'));
        const doctorDetailsModal = new bootstrap.Modal(document.getElementById('doctorDetailsModal'));
        let currentDoctorId = null;

        // Add new doctor
        $('#add-doctor-btn').click(function() {
            $('#modalTitle').text('Thêm Bác Sĩ Mới');
            $('#doctorForm')[0].reset();
            $('#MaNV').val('');
            $('#HovaTen').prop('readonly', false);
            doctorModal.show();
        });

        // Save doctor (add or update)
        $('#saveDoctor').click(function() {
            if (validateForm()) {
                const formData = new FormData($('#doctorForm')[0]);
                formData.append('action', $('#MaNV').val() ? 'update' : 'add');

                $.ajax({
                    url: 'doctor.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            doctorModal.hide();
                            if (formData.get('action') === 'add') {
                                addDoctorToTable(response.doctor);
                            } else {
                                updateDoctorInTable(response.doctor);
                            }
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            }
        });

        // Show doctor details
        $(document).on('click', '.doctor-row', function() {
            const doctorId = $(this).data('id');
            currentDoctorId = doctorId;

            $.ajax({
                url: 'doctor.php',
                type: 'POST',
                data: { action: 'get', MaNV: doctorId },
                dataType: 'json',
                success: function(doctor) {
                    $('#detailMaNV').text(doctor.MaNV);
                    $('#detailHovaTen').text(doctor.HovaTen);
                    $('#detailNgaySinh').text(doctor.NgaySinh);
                    $('#detailGioiTinh').text(doctor.GioiTinh);
                    $('#detailSoDT').text(doctor.SoDT);
                    $('#detailEmail').text(doctor.Email);
                    $('#detailTenKhoa').text(doctor.TenKhoa);
                    doctorDetailsModal.show();
                },
                error: function() {
                    alert('Đã xảy ra lỗi khi tải thông tin bác sĩ. Vui lòng thử lại.');
                }
            });
        });

        // Edit doctor
        $('#editDoctorBtn').click(function() {
            doctorDetailsModal.hide();
            $('#modalTitle').text('Sửa Thông Tin Bác Sĩ');

            $.ajax({
                url: 'doctor.php',
                type: 'POST',
                data: { action: 'get', MaNV: currentDoctorId },
                dataType: 'json',
                success: function(doctor) {
                    $('#MaNV').val(doctor.MaNV);
                    $('#HovaTen').val(doctor.HovaTen).prop('readonly', true);
                    $('#NgaySinh').val(doctor.NgaySinh);
                    $('#GioiTinh').val(doctor.GioiTinh);
                    $('#SoDT').val(doctor.SoDT);
                    $('#Email').val(doctor.Email);
                    $('#MaKhoa').val(doctor.MaKhoa);
                    doctorModal.show();
                },
                error: function() {
                    alert('Đã xảy ra lỗi khi tải thông tin bác sĩ. Vui lòng thử lại.');
                }
            });
        });

        // Delete doctor
        $('#deleteDoctorBtn').click(function() {
            if (confirm('Bạn có chắc chắn muốn xóa bác sĩ này?')) {
                $.ajax({
                    url: 'doctor.php',
                    type: 'POST',
                    data: { action: 'delete', MaNV: currentDoctorId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            doctorDetailsModal.hide();
                            $(`tr[data-id="${currentDoctorId}"]`).remove();
                            updateSTTColumn();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi khi xóa bác sĩ. Vui lòng thử lại.');
                    }
                });
            }
        });

        function addDoctorToTable(doctor) {
            const newRow = `
                <tr class="doctor-row" data-id="${doctor.MaNV}">
                    <td>${$('#doctorTableBody tr').length + 1}</td>
                    <td>${doctor.MaNV}</td>
                    <td>${doctor.HovaTen}</td>
                    <td>${doctor.TenKhoa}</td>
                </tr>
            `;
            $('#doctorTableBody').append(newRow);
        }

        function updateDoctorInTable(doctor) {
            const row = $(`tr[data-id="${doctor.MaNV}"]`);
            row.find('td:eq(2)').text(doctor.HovaTen);
            row.find('td:eq(3)').text(doctor.TenKhoa);
        }

        function updateSTTColumn() {
            $('#doctorTableBody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        function validateForm() {
            const name = $('#HovaTen').val().trim();
            const phone = $('#SoDT').val().trim();
            const email = $('#Email').val().trim();
            const dob = new Date($('#NgaySinh').val());
            const today = new Date();
            const age = today.getFullYear() - dob.getFullYear();

            if (!name || !phone || !email) {
                alert('Vui lòng điền đầy đủ thông tin.');
                return false;
            }

            if (!/^[a-zA-ZÀ-ỹ\s]+$/.test(name)) {
                alert('Họ tên không được chứa số.');
                return false;
            }

            if (!/^[0-9]{10}$/.test(phone)) {
                alert('Số điện thoại phải có 10 chữ số.');
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('Email không hợp lệ.');
                return false;
            }

            if (age < 25) {
                alert('Bác sĩ phải trên 25 tuổi.');
                return false;
            }

            return true;
        }

        // Search functionality
        $('#searchBtn').click(function() {
            const searchTerm = $('#searchInput').val().toLowerCase();
            $('.doctor-row').each(function() {
                const doctorName = $(this).find('td:eq(2)').text().toLowerCase();
                if (doctorName.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Filter functionality (placeholder)
        $('#filterBtn').click(function() {
            alert('Chức năng lọc sẽ được triển khai sau.');
        });
    });
    </script>
</body>
</html>