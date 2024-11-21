<?php
include_once('ketnoi.php');

class mLichLamViec
{
    public function addLichLamViec($MaBS, $NgayLamViec, $CaLamViec)
    {
        $p = new ketnoi();
        $con = $p->moketnoi();
        if ($con) {
            $NgayLamViec = mysqli_real_escape_string($con, $NgayLamViec);
            $CaLamViec = mysqli_real_escape_string($con, $CaLamViec);

            // Kiểm tra xem lịch đã tồn tại hay chưa
            $checkQuery = "SELECT * FROM LichLamViec 
                           WHERE MaLLV = '$MaBS' AND NgayLamViec = '$NgayLamViec' AND CaLamViec = '$CaLamViec'";
            $checkResult = $con->query($checkQuery);

            if ($checkResult && $checkResult->num_rows > 0) {
                $p->dongketnoi($con);
                return false; // Lịch đã tồn tại
            }

            // Thêm lịch mới
            $TrangThai = 'Chưa duyệt';
            $query = "INSERT INTO LichLamViec (MaLLV, NgayLamViec, TrangThai, CaLamViec)
                      VALUES ('$MaBS', '$NgayLamViec', '$TrangThai', '$CaLamViec')";
            $result = $con->query($query);
            $p->dongketnoi($con);
            return $result;
        }
        return false;
    }
}
