<?php
include("../../controller/cQLBNhan.php");

$p = new cBNhan();

if (!isset($_POST["btnsearch"])) {
    echo "Vui lòng tìm kiếm bệnh nhân.";
} else {
    $search = trim($_POST["txtsearch"]);

    if (empty($search)) {
        echo "Vui lòng nhập mã bệnh nhân để tìm kiếm.";
    } else {
        $tblBNhan = $p->get1BNhan($_POST["txtsearch"]);

        if (!$tblBNhan) {
            echo "Không tìm thấy bệnh nhân.";
        } elseif (mysqli_num_rows($tblBNhan) === 0) {
            echo "Không tìm thấy bệnh nhân";
        } else {
            // Hiển thị thông tin bệnh nhân và phiếu khám
            echo '
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Thông tin bệnh nhân</h5>';
                            while ($r = mysqli_fetch_assoc($tblBNhan)) {
                                echo '
                                <p><strong>ID:</strong> ' . $r["MaBN"] . '</p>
                                <p><strong>Họ và Tên:</strong> ' . $r["HovaTen"] . '</p>
                                <p><strong>Ngày sinh:</strong> ' . $r["NgaySinh"] . '</p>
                                <p><strong>Giới tính:</strong> ' . $r["GioiTinh"] . '</p>
                                <p><strong>BHYT:</strong> ' . $r["BHYT"] . '</p>
                                <p><strong>Địa chỉ:</strong> ' . $r["DiaChi"] . '</p>
                                <p><strong>Số điện thoại:</strong> ' . $r["SoDT"] . '</p>';
                            }
                            echo '
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách phiếu khám</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ngày khám</th>
                                        <th>Bác sĩ</th>
                                        <th>Chuẩn đoán</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>';

                            // Truy vấn danh sách phiếu khám theo mã bệnh nhân
                            $tblPKham = $p->getPKham($_POST["txtsearch"]);  
                            $stt = 0;
                            if (!$tblPKham) {
                                echo "<tr><td colspan='5'>Không thể kết nối tới cơ sở dữ liệu.</td></tr>";
                            } elseif (mysqli_num_rows($tblPKham) == 0) {
                                echo "<tr><td colspan='5'>Không có phiếu khám nào.</td></tr>";
                            } else {
                                while ($r = mysqli_fetch_assoc($tblPKham)) {
                                    $stt++;
                                    echo '  
                                    <tr>
                                        <td>' . $stt . '</td>
                                        <td>' . $r["NgayTaoPhieuKham"] . '</td>
                                        <td>' . $r["BacSiPhuTrach"] . '</td>
                                        <td>' . $r["KetQua"] . '</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" onclick="toggleDetails(' . $r["MaPK"] . ')">Xem chi tiết</button>
                                        </td>
                                    </tr>
                                    <tr id="details-' . $r["MaPK"] . '" style="display:none;">
                                        <td colspan="5">
                                            <div class="card mt-3">
                                                <div class="card-body">
                                                    <h6 class="card-title">Chi tiết phiếu khám</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><strong>Ngày khám:</strong> ' . $r["NgayTaoPhieuKham"] . '</p>
                                                            <p><strong>Bác sĩ:</strong> ' . $r["BacSiPhuTrach"] . '</p>
                                                            <p><strong>Chuẩn đoán:</strong> ' . $r["KetQua"] . '</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><strong>Xét nghiệm:</strong> Không</p>
                                                            <p><strong>Đơn thuốc:</strong> Paracetamol 500mg, uống 3 lần/ngày</p>
                                                            <p><strong>Lời dặn:</strong> Nghỉ ngơi, uống nhiều nước</p>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-2" onclick="printExaminationRecord(' . $r["MaPK"] . ')">In phiếu khám</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
                                }
                            }
                            echo '
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
}
?>

<script>
    function toggleDetails(maPK) {
        var detailsRow = document.getElementById("details-" + maPK);
        if (detailsRow.style.display === "none") {
            detailsRow.style.display = "table-row";
        } else {
            detailsRow.style.display = "none";
        }
    }

    function printExaminationRecord(maPK) {
        var detailsRow = document.getElementById("details-" + maPK);
        var printWindow = window.open('', '', 'height=800,width=800');
        
        printWindow.document.write('<html><head><title>In Phiếu Khám</title>');
        printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div class="container">');
        printWindow.document.write('<h2 class="mb-4">Phiếu Khám Bệnh</h2>');
        printWindow.document.write(detailsRow.querySelector('.card-body').innerHTML);
        printWindow.document.write('</div>');
        printWindow.document.write('</body></html>');
        
        printWindow.document.close();
        printWindow.focus();
        
        setTimeout(function() {
            printWindow.print();
            printWindow.close();
        }, 250);
    }
</script>