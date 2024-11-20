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

