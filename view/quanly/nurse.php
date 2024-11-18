<?php
include("../../controller/cNVYT.php");
$controller = new cNVYT();

$message = '';
$error = '';

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'delete':
                $controller->setInactive($_POST['MaNV']);
                $message = "Nhân viên y tế đã được ẩn khỏi danh sách.";
                break;
            case 'edit':
                $controller->updateNVYT($_POST['MaNV'], $_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['SoDT'], $_POST['Email']);
                $message = "Thông tin nhân viên y tế đã được cập nhật thành công.";
                break;
            case 'add':
                $result = $controller->addNVYT($_POST['HovaTen'], $_POST['NgaySinh'], $_POST['GioiTinh'], $_POST['SoDT'], $_POST['Email']);
                if ($result === true) {
                    $message = "Nhân viên y tế mới đã được thêm thành công.";
                } else {
                    $error = $result;
                }
                break;
        }
    }
}


// Xử lý tìm kiếm
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$tblNVYT = $searchTerm ? $controller->searchNVYT($searchTerm) : $controller->getAllNVYT();

// Xử lý hiển thị chi tiết nhân viên y tế
$selectedNurse = null;
if (isset($_GET['MaNV'])) {
    $result = $controller->getNVYT($_GET['MaNV']);
    if ($result && $result !== -1) {
        $selectedNurse = $result->fetch_assoc();
    }
}

// Xử lý hiển thị form sửa thông tin nhân viên y tế
$editNurse = null;
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['MaNV'])) {
    $result = $controller->getNVYT($_GET['MaNV']);
    if ($result && $result !== -1) {
        $editNurse = $result->fetch_assoc();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Nhân Viên Y Tế</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/nurse.css">
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
                                <a href="doctor.php" class="btn btn-secondary">Thông tin bác sĩ</a>
                                <a href="nurse.php" class="btn btn-primary">Thông tin nhân viên y tế</a>
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
                                <h2 class="card-title">Danh Sách Nhân Viên Y Tế</h2>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Nhân Viên Y Tế</th>
                                            
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="nurseTableBody">
                                        <?php
                                            $tblNVYT = $controller->getAllNVYT();
                                            if($tblNVYT !== false && $tblNVYT !== -1) {
                                                $stt = 1;
                                                while($r = $tblNVYT->fetch_assoc()) {
                                                    // Kiểm tra điều kiện tìm kiếm và lọc
                                                    if (
                                                        ($searchTerm === '' || 
                                                         strpos(strtolower($r['MaNV']), strtolower($searchTerm)) !== false ||
                                                         strpos(strtolower($r['HovaTen']), strtolower($searchTerm)) !== false) &&
                                                        $r['TrangThaiLamViec'] == 'Đang làm việc'
                                                    ) {
                                        ?>
                                                    <tr>
                                                        <td><?= $stt++ ?></td>
                                                        <td><?= htmlspecialchars($r['MaNV']) ?></td>
                                                        <td><?= htmlspecialchars($r['HovaTen']) ?></td>
                                                        
                                                        <td>
                                                            <a href="?MaNV=<?= $r['MaNV'] ?>" class="btn btn-primary btn-sm">Xem</a>
                                                        </td>
                                                    </tr>
                                        <?php
                                                    }
                                                }
                                            }
                                            if ($stt == 1) {
                                                echo "<tr><td colspan='5'>Không tìm thấy nhân viên y tế nào</td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="?action=showAddForm" class="btn btn-primary mt-3">Thêm Nhân Viên Y Tế Mới +</a>
                            <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNurseModal">Thêm Nhân Viên Y Tế Mới +</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal hiển thị thông tin chi tiết nhân viên y tế -->
    <?php if ($selectedNurse): ?>
        <div class="modal fade show" id="nurseDetailsModal" tabindex="-1" aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông Tin Chi Tiết Nhân Viên Y Tế</h5>
                        <a href="nurse.php" class="btn-close" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <td><?php echo htmlspecialchars($selectedNurse['MaNV']); ?></td>
                            </tr>
                            <tr>
                                <th>Họ và tên</th>
                                <td><?php echo htmlspecialchars($selectedNurse['HovaTen']); ?></td>
                            </tr>
                            <tr>
                                <th>Ngày sinh</th>
                                <td><?php echo htmlspecialchars($selectedNurse['NgaySinh']); ?></td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td><?php echo htmlspecialchars($selectedNurse['GioiTinh']); ?></td>
                            </tr>
                            <tr>
                                <th>SDT</th>
                                <td><?php echo htmlspecialchars($selectedNurse['SoDT']); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo htmlspecialchars($selectedNurse['Email']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="?action=edit&MaNV=<?php echo $selectedNurse['MaNV']; ?>" class="btn btn-primary">Sửa</a>
                        <a href="?action=delete&MaNV=<?php echo $selectedNurse['MaNV']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên y tế này?');">Xóa</a>                        
                        <a href="nurse.php" class="btn btn-secondary">Đóng</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    <?php endif; ?>

    <!-- Modal sửa thông tin nhân viên y tế -->
    <?php if ($editNurse): ?>
        <div class="modal fade show" id="nurseSuaModal" tabindex="-1" aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa Thông Tin Nhân Viên Y Tế</h5>
                        <a href="nurse.php" class="btn-close" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <form action="nurse.php" method="POST">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="MaNV" value="<?php echo htmlspecialchars($editNurse['MaNV']); ?>">
                            <div class="mb-3">
                                <label class="form-label">Mã Nhân Viên</label>
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($editNurse['MaNV']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="HovaTen" value="<?php echo htmlspecialchars($editNurse['HovaTen']); ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="date" class="form-control" name="NgaySinh" value="<?php echo htmlspecialchars($editNurse['NgaySinh']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giới tính</label>
                                <select class="form-select" name="GioiTinh" required>
                                    <option value="Nam" <?php echo $editNurse['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                    <option value="Nữ" <?php echo $editNurse['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SDT</label>
                                <input type="tel" class="form-control" name="SoDT" value="<?php echo htmlspecialchars($editNurse['SoDT']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="Email" value="<?php echo htmlspecialchars($editNurse['Email']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            <a href="nurse.php" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    <?php endif; ?>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'showAddForm'): ?>
    <!-- Modal for adding new doctor -->
    <div class="modal fade show" id="addNurseModal" tabindex="-1" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Nhân Viên Y Tế Mới</h5>
                    <a href="nurse.php" class="btn-close" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form action="nurse.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <div class="mb-3">
                            <label for="HovaTen" class="form-label">Họ và tên Nhân Viên Y Tế</label>
                            <input type="text" class="form-control" id="HovaTen" name="HovaTen" required pattern="^[a-zA-ZÀ-ỹ\s]+$">
                        </div>
                        <div class="mb-3">
                            <label for="NgaySinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
                        </div>
                        <div class="mb-3">
                            <label for="GioiTinh" class="form-label">Giới tính</label>
                            <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="SoDT" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="SoDT" name="SoDT" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="Email" name="Email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm nhân viên y tế</button>
                        <a href="nurse.php" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    <?php endif; ?>
    <?php
    // Xử lý xóa nhân viên y tế
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['MaNV'])) {
        $controller->setInactive($_GET['MaNV']);
        echo "<script>alert('Nhân viên y tế đã được ẩn khỏi danh sách.'); window.location.href='nurse.php';</script>";
    }
    ?>
    <?php include("../interface/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
