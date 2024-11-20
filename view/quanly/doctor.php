<?php
include("../../controller/cQLBacSi.php");
include("../../controller/cChuyenKhoa.php");
$controller = new cbacsi();
$chuyenKhoaController = new CChuyenKhoa();

$message = '';
$error = '';
$formData = [
    'HovaTenNV' => '',
    'NgaySinh' => '',
    'GioiTinh' => '',
    'SoDT' => '',
    'EmailNV' => '',
    'MaKhoa' => ''
];
$formErrors = [
    'SoDT' => '',
    'Email' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        // Lưu dữ liệu form
        $formData = [
            'HovaTenNV' => $_POST['HovaTenNV'] ?? '',
            'NgaySinh' => $_POST['NgaySinh'] ?? '',
            'GioiTinh' => $_POST['GioiTinh'] ?? '',
            'SoDT' => $_POST['SoDT'] ?? '',
            'EmailNV' => $_POST['EmailNV'] ?? '',
            'MaKhoa' => $_POST['MaKhoa'] ?? ''
        ];

        // Kiểm tra số điện thoại
        if ($controller->checkPhoneExists($formData['SoDT'])) {
            $formErrors['SoDT'] = 'Số điện thoại đã được sử dụng.';
        }

        // Kiểm tra email
        if ($controller->checkEmailExists($formData['EmailNV'])) {
            $formErrors['EmailNV'] = 'Email đã được sử dụng.';
        }

        // Nếu không có lỗi, thêm bác sĩ mới
        if (empty($formErrors['SoDT']) && empty($formErrors['EmailNV'])) {
            $result = $controller->addBS($formData['HovaTenNV'], $formData['NgaySinh'], $formData['GioiTinh'], $formData['SoDT'], $formData['EmailNV'], $formData['MaKhoa']);
            if ($result === true) {
                $message = "Bác sĩ mới đã được thêm thành công.";
                // Reset form data after successful submission
                $formData = array_fill_keys(array_keys($formData), '');
                echo "<script>alert('Bác sĩ đã được thêm vào danh sách.'); window.location.href='doctor.php';</script>";
            } else {
                $error = $result;
            }
        }
    }
}
// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'delete':
                $controller->setInactive($_POST['MaNV']);
                $message = "Bác sĩ đã được ẩn khỏi danh sách.";
                break;
            case 'edit':
                $result = $controller->updateBS($_POST['MaNV'], $_POST['MaKhoa'], $_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['SoDT'], $_POST['EmailNV']);
                if ($result === true) {
                    $message = "Thông tin bác sĩ đã được cập nhật thành công.";
                } else {
                    $error = $result;
                }
                break;
            case 'add':
                $result = $controller->addBS($_POST['HovaTenNV'], $_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['SoDT'], $_POST['EmailNV'], $_POST['MaKhoa']);
                if ($result === true) {
                    $message = "Bác sĩ mới đã được thêm thành công.";
                } else {
                    $error = $result;
                }
                break;
        }
    }
}


// Xử lý tìm kiếm
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$filterKhoa = isset($_GET['filterKhoa']) ? $_GET['filterKhoa'] : '';

// Xử lý hiển thị chi tiết bác sĩ
$selectedDoctor = null;
if (isset($_GET['MaNV'])) {
    $result = $controller->getBS($_GET['MaNV']);
    if ($result && $result !== -1) {
        $selectedDoctor = $result->fetch_assoc();
    }
}

// Xử lý hiển thị form sửa thông tin bác sĩ
$editDoctor = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['MaNV'])) {
    $result = $controller->getBS($_GET['MaNV']);
    if ($result && $result !== -1) {
        $editDoctor = $result->fetch_assoc();
    }
}

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
                            <?php if ($message): ?>
                                <div class="alert alert-success"><?php echo $message; ?></div>
                            <?php endif; ?>
                            <?php if ($error): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <form action="" method="GET" class="d-flex">
                                    <input type="text" class="form-control me-2" name="search" placeholder="Tìm kiếm..." value="<?php echo htmlspecialchars($searchTerm); ?>">
                                    <button class="btn btn-outline-secondary" type="submit">Tìm</button>
                                </form>
                                <h2 class="card-title">Danh Sách Bác Sĩ</h2>
                                <form action="" method="GET">
                                    <select name="filterKhoa" class="form-select" onchange="this.form.submit()">
                                        <option value="">Tất cả chuyên khoa</option>
                                        <?php
                                        $chuyenkhoa = $chuyenKhoaController->getAllChuyenKhoa();
                                        if ($chuyenkhoa && $chuyenkhoa !== -1) {
                                            while ($khoa = $chuyenkhoa->fetch_assoc()) {
                                                $selected = ($khoa['MaKhoa'] == $filterKhoa) ? 'selected' : '';
                                                echo "<option value='" . $khoa['MaKhoa'] . "' $selected>" . htmlspecialchars($khoa['TenKhoa']) . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Bác Sĩ</th>
                                            <th>Chuyên Khoa</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorTableBody">
                                        <?php
                                            $tblBS = $controller->getAllBS();
                                            if($tblBS !== false && $tblBS !== -1) {
                                                $stt = 1;
                                                while($r = $tblBS->fetch_assoc()) {
                                                    // Kiểm tra điều kiện tìm kiếm và lọc
                                                    if (
                                                        ($searchTerm === '' || 
                                                         strpos(strtolower($r['MaNV']), strtolower($searchTerm)) !== false ||
                                                         strpos(strtolower($r['HovaTenNV']), strtolower($searchTerm)) !== false) &&
                                                        ($filterKhoa === '' || $r['MaKhoa'] == $filterKhoa) &&
                                                        $r['TrangThaiLamViec'] == 'Đang làm việc'
                                                    ) {
                                        ?>
                                                    <tr>
                                                        <td><?= $stt++ ?></td>
                                                        <td><?= htmlspecialchars($r['MaNV']) ?></td>
                                                        <td><?= htmlspecialchars($r['HovaTenNV']) ?></td>
                                                        <td><?= htmlspecialchars($r['TenKhoa']) ?></td>
                                                        <td>
                                                            <a href="?MaNV=<?= $r['MaNV'] ?>" class="btn btn-primary btn-sm">Xem</a>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    }
                                                }
                                            }
                                            if ($stt == 1) {
                                                echo "<tr><td colspan='5'>Không tìm thấy bác sĩ nào</td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="?action=showAddForm" class="btn btn-primary mt-3">Thêm Bác Sĩ Mới +</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal hiển thị thông tin chi tiết bác sĩ -->
    <?php if ($selectedDoctor): ?>
        <div class="modal fade show" id="doctorDetailsModal" tabindex="-1" aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông Tin Chi Tiết Bác Sĩ</h5>
                        <a href="doctor.php" class="btn-close" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['MaNV']); ?></td>
                            </tr>
                            <tr>
                                <th>Họ và tên bác sĩ</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['HovaTenNV']); ?></td>
                            </tr>
                            <tr>
                                <th>Ngày sinh</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['NgaySinh']); ?></td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['GioiTinh']); ?></td>
                            </tr>
                            <tr>
                                <th>SDT</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['SoDT']); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['EmailNV']); ?></td>
                            </tr>
                            <tr>
                                <th>Chuyên khoa</th>
                                <td><?php echo htmlspecialchars($selectedDoctor['TenKhoa']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="?action=edit&MaNV=<?php echo $selectedDoctor['MaNV']; ?>" class="btn btn-primary">Sửa</a>
                        <a href="?action=delete&MaNV=<?php echo $selectedDoctor['MaNV']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bác sĩ này?');">Xóa</a>
                        <a href="doctor.php" class="btn btn-secondary">Đóng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    <?php endif; ?>

    <!-- Modal sửa thông tin bác sĩ -->
    <?php if ($editDoctor): ?>
        <div class="modal fade show" id="doctorSuaModal" tabindex="-1" aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa Thông Tin Bác Sĩ</h5>
                        <a href="doctor.php" class="btn-close" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <form action="doctor.php" method="POST">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="MaNV" value="<?php echo htmlspecialchars($editDoctor['MaNV']); ?>">
                            <div class="mb-3">
                                <label class="form-label">Mã Nhân Viên</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($editDoctor['MaNV']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên bác sĩ</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($editDoctor['HovaTenNV']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" name="NgaySinh" value="<?php echo htmlspecialchars($editDoctor['NgaySinh']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giới tính</label>
                                <select class="form-select" name="GioiTinh" required>
                                    <option value="Nam" <?php echo $editDoctor['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                    <option value="Nữ" <?php echo $editDoctor['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SDT</label>
                                <input type="tel" class="form-control" name="SoDT" value="<?php echo htmlspecialchars($editDoctor['SoDT']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="EmailNV" value="<?php echo htmlspecialchars($editDoctor['EmailNV']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chuyên khoa</label>
                                <select class="form-select" name="MaKhoa" required>
                                <?php
                                $chuyenkhoa = $chuyenKhoaController->getAllChuyenKhoa();
                                if ($chuyenkhoa && $chuyenkhoa !== -1) {
                                    while ($khoa = $chuyenkhoa->fetch_assoc()) {
                                        $selected = ($khoa['MaKhoa'] == $editDoctor['MaKhoa']) ? 'selected' : '';
                                        echo "<option value='" . $khoa['MaKhoa'] . "' $selected>" . htmlspecialchars($khoa['TenKhoa']) . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không có chuyên khoa nào</option>";
                                }
                            ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <a href="doctor.php" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    <?php endif; ?>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'showAddForm'): ?>
    <div class="modal fade show" id="addDoctorModal" tabindex="-1" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Bác Sĩ Mới</h5>
                    <a href="doctor.php" class="btn-close" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <?php if ($message): ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="doctor.php?action=showAddForm" method="POST">
                        <input type="hidden" name="action" value="add">
                        <div class="mb-3">
                            <label for="HovaTenNV" class="form-label">Họ và tên bác sĩ</label>
                            <input type="text" class="form-control" id="HovaTenNV" name="HovaTenNV" required pattern="^[a-zA-ZÀ-ỹ\s]+$" value="<?php echo htmlspecialchars($formData['HovaTenNV']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="NgaySinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required value="<?php echo htmlspecialchars($formData['NgaySinh']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="GioiTinh" class="form-label">Giới tính</label>
                            <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                                <option value="Nam" <?php echo $formData['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                <option value="Nữ" <?php echo $formData['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="SoDT" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control <?php echo !empty($formErrors['SoDT']) ? 'is-invalid' : ''; ?>" id="SoDT" name="SoDT" required value="<?php echo htmlspecialchars($formData['SoDT']); ?>">
                            <?php if (!empty($formErrors['SoDT'])): ?>
                                <div class="invalid-feedback"><?php echo $formErrors['SoDT']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="EmailNV" class="form-label">Email</label>
                            <input type="email" class="form-control <?php echo !empty($formErrors['EmailNV']) ? 'is-invalid' : ''; ?>" id="EmailNV" name="EmailNV" required value="<?php echo htmlspecialchars($formData['EmailNV']); ?>">
                            <?php if (!empty($formErrors['Email'])): ?>
                                <div class="invalid-feedback"><?php echo $formErrors['EmailNV']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="MaKhoa" class="form-label">Chuyên khoa</label>
                            <select class="form-select" id="MaKhoa" name="MaKhoa" required>
                                <?php
                                $chuyenkhoa = $chuyenKhoaController->getAllChuyenKhoa();
                                if ($chuyenkhoa && $chuyenkhoa !== -1) {
                                    while ($khoa = $chuyenkhoa->fetch_assoc()) {
                                        $selected = ($khoa['MaKhoa'] == $formData['MaKhoa']) ? 'selected' : '';
                                        echo "<option value='" . $khoa['MaKhoa'] . "' $selected>" . htmlspecialchars($khoa['TenKhoa']) . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không có chuyên khoa nào</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm bác sĩ</button>
                        <a href="doctor.php" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    <?php endif; ?>
    <?php
    // Xử lý xóa bác sĩ
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['MaNV'])) {
        $controller->setInactive($_GET['MaNV']);
        echo "<script>alert('Bác sĩ đã được ẩn khỏi danh sách.'); window.location.href='doctor.php';</script>";
    }
    ?>

    <?php include("../interface/footer.php"); ?>
</body>
</html>
