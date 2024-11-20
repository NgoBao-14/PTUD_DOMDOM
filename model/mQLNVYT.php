<?php
include_once('ketnoi.php');
class mNVYT
{
    private $con;

    public function __construct()
    {
        $p = new ketnoi();
        $this->con = $p->moketnoi();
    }

    public function getAllNVYT()
    {
        if($this->con)
        {
            $str = 'SELECT DISTINCT n.* FROM nhanvienyte AS yt JOIN nhanvien AS n ON yt.MaNV = n.MaNV WHERE n.TrangThaiLamViec = "Đang làm việc" ORDER BY yt.MaNV DESC';
            $tblNVYT = $this->con->query($str);
            return $tblNVYT;
        }
        return false;
    }

    public function getNVYT($MaNV)
    {
        if($this->con)
        {
            $MaNV = mysqli_real_escape_string($this->con, $MaNV);
            $str = "SELECT * FROM nhanvienyte AS yt
                        JOIN nhanvien AS n ON yt.MaNV = n.MaNV
                        WHERE yt.MaNV = '$MaNV'";
            $tblNVYT = $this->con->query($str);
            return $tblNVYT;
        }
        return false;
    }

    public function setInactive($MaNV)
    {
        if($this->con)
        {
            $MaNV = mysqli_real_escape_string($this->con, $MaNV);
            $str = "UPDATE nhanvien SET TrangThaiLamViec = 'Nghỉ làm' WHERE MaNV = '$MaNV'";
            $result = $this->con->query($str);
            return $result;
        }
        return false;
    }

    public function updateNVYT($MaNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV)
    {
        if($this->con)
        {
            $MaNV = mysqli_real_escape_string($this->con, $MaNV);
            $NgaySinh = mysqli_real_escape_string($this->con, $NgaySinh);
            $GioiTinh = mysqli_real_escape_string($this->con, $GioiTinh);
            $SoDT = mysqli_real_escape_string($this->con, $SoDT);
            $EmailNV = mysqli_real_escape_string($this->con, $EmailNV);
            
            $str = "UPDATE nhanvien SET NgaySinh = '$NgaySinh', GioiTinh = '$GioiTinh', SoDT = '$SoDT', EmailNV = '$EmailNV' WHERE MaNV = '$MaNV'";
            $result = $this->con->query($str);
            
            return $result;
        }
        return false;
    }

    public function checkDuplicatePhoneOrEmail($SoDT, $EmailNV)
    {
        if($this->con)
        {
            $SoDT = mysqli_real_escape_string($this->con, $SoDT);
            $EmailNV = mysqli_real_escape_string($this->con, $EmailNV);
            $query = "SELECT * FROM nhanvien WHERE SoDT = '$SoDT' OR EmailNV = '$EmailNV'";
            $result = $this->con->query($query);
            return $result->num_rows > 0;
        }
        return false;
    }

    public function addNVYT($HovaTenNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV)
    {
        if($this->con)
        {
            $this->con->begin_transaction();

            try {
                $HovaTenNV = mysqli_real_escape_string($this->con, $HovaTenNV);
                $NgaySinh = mysqli_real_escape_string($this->con, $NgaySinh);
                $GioiTinh = mysqli_real_escape_string($this->con, $GioiTinh);
                $SoDT = mysqli_real_escape_string($this->con, $SoDT);
                $EmailNV = mysqli_real_escape_string($this->con, $EmailNV);

                $query = "SELECT MAX(CAST(MaNV AS UNSIGNED)) as max_id FROM nhanvien";
                $result = $this->con->query($query);
                $row = $result->fetch_assoc();
                $MaNV = $row['max_id'] + 1;

                $query = "SELECT MAX(ID) as max_id FROM nhanvien";
                $result = $this->con->query($query);
                $row = $result->fetch_assoc();
                $ID = $row['max_id'] + 1;

                $query = "SELECT MAX(MaLLV) as max_id FROM nhanvien";
                $result = $this->con->query($query);
                $row = $result->fetch_assoc();
                $MaLLV = $row['max_id'] + 1;

                $query = "INSERT INTO nhanvien (MaNV, HovaTenNV, NgaySinh, SoDT, ChucVu, GioiTinh, TrangThaiLamViec, EmailNV, ID, MaLLV) 
                        VALUES ('$MaNV', '$HovaTenNV', '$NgaySinh', '$SoDT', 'Nhân viên y tế', '$GioiTinh', 'Đang làm việc', '$EmailNV', '$ID', '$MaLLV')";
                $result1 = $this->con->query($query);

                if (!$result1) {
                    throw new Exception("Lỗi khi thêm vào bảng nhanvien: " . $this->con->error);
                }

                $query = "INSERT INTO nhanvienyte (MaNV, MaHD) VALUES ('$MaNV', '0')";
                $result2 = $this->con->query($query);

                if (!$result2) {
                    throw new Exception("Lỗi khi thêm vào bảng nhanvienyte: " . $this->con->error);
                }

                $this->con->commit();
                return true;
            } catch (Exception $e) {
                $this->con->rollback();
                return $e->getMessage();
            }
        }
        return false;
    }
}
?>
