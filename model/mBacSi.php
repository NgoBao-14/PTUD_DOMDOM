<?php
    include_once('ketnoi.php');
    class Mbacsi
    {
        public function getAllBacSi()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'select * from bacsi as b join nhanvien as n on b.MaNV = n.MaNV join chuyenkhoa as c on b.MaKhoa = c.MaKhoa order by b.MaNV desc';
                $tblBS = $con->query($str);
                $p->dongketnoi($con);
                return $tblBS;
            }
            else
            {
                return false;
            }
        }
        
        public function getBS($MaNV)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT * FROM bacsi AS b
                            join nhanvien as n on b.MaNV = n.MaNV
                            JOIN chuyenkhoa AS c ON b.MaKhoa = c.MaKhoa
                            WHERE b.MaNV = '.$MaNV.'
                            ORDER BY b.MaNV DESC';
                $tblBS = $con->query($str);
                $p->dongketnoi($con);
                return $tblBS;
            }
            else
            {
                return false;
            }
        }
        public function setInactive($MaNV)
    {
        $p = new ketnoi;
        $con = $p->moketnoi();
        if($con)
        {
            $MaNV = mysqli_real_escape_string($con, $MaNV);
            $str = "UPDATE nhanvien SET TrangThaiLamViec = 'Nghỉ làm' WHERE MaNV = '$MaNV'";
            $result = $con->query($str);
            $p->dongketnoi($con);
            return $result;
        }
        else
        {
            return false;
        }
    }

        public function updateBS($MaNV, $MaKhoa, $NgaySinh, $GioiTinh, $SoDT, $EmailNV)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $MaNV = mysqli_real_escape_string($con, $MaNV);
                $MaKhoa = mysqli_real_escape_string($con, $MaKhoa);
                $NgaySinh = mysqli_real_escape_string($con, $NgaySinh);
                $GioiTinh = mysqli_real_escape_string($con, $GioiTinh);
                $SoDT = mysqli_real_escape_string($con, $SoDT);
                $EmailNV = mysqli_real_escape_string($con, $EmailNV);
                
                $str = "UPDATE nhanvien SET NgaySinh = '$NgaySinh', GioiTinh = '$GioiTinh', SoDT = '$SoDT', EmailNV = '$EmailNV' WHERE MaNV = '$MaNV'";
                $result = $con->query($str);
                
                if($result) {
                    $str2 = "UPDATE bacsi SET MaKhoa = '$MaKhoa' WHERE MaNV = '$MaNV'";
                    $result2 = $con->query($str2);
                }
                
                $p->dongketnoi($con);
                return $result && $result2;
            }
            else
            {
                return false;
            }
        }
        private $con;

    public function __construct()
    {
        $p = new ketnoi();
        $this->con = $p->moketnoi();
    }

    // ... (keep other existing methods)
    public function checkPhoneExists($phone)
    {
        if($this->con)
        {
            $phone = mysqli_real_escape_string($this->con, $phone);
            $query = "SELECT * FROM nhanvien WHERE SoDT = '$phone'";
            $result = $this->con->query($query);
            return $result->num_rows > 0;
        }
        return false;
    }

    public function checkEmailExists($emailNV)
    {
        if($this->con)
        {
            $emailNV = mysqli_real_escape_string($this->con, $emailNV);
            $query = "SELECT * FROM nhanvien WHERE EmailNV = '$emailNV'";
            $result = $this->con->query($query);
            return $result->num_rows > 0;
        }
        return false;
    }
    public function checkDuplicatePhoneOrEmail($SoDT, $EmailNV, $MaNV = null)
    {
        if($this->con)
        {
            $SoDT = mysqli_real_escape_string($this->con, $SoDT);
            $EmailNV = mysqli_real_escape_string($this->con, $EmailNV);
            $query = "SELECT * FROM nhanvien WHERE (SoDT = '$SoDT' OR EmailNV = '$EmailNV')";
            if ($MaNV !== null) {
                $MaNV = mysqli_real_escape_string($this->con, $MaNV);
                $query .= " AND MaNV != '$MaNV'";
            }
            $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }
        }
        return false;
    }

        public function addBS($HovaTenNV, $NgaySinh, $GioiTinh, $SoDT, $EmailNV, $MaKhoa)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $HovaTenNV = mysqli_real_escape_string($con, $HovaTenNV);
                $NgaySinh = mysqli_real_escape_string($con, $NgaySinh);
                $GioiTinh = mysqli_real_escape_string($con, $GioiTinh);
                $SoDT = mysqli_real_escape_string($con, $SoDT);
                $EmailNV = mysqli_real_escape_string($con, $EmailNV);
                $MaKhoa = mysqli_real_escape_string($con, $MaKhoa);

                // Generate a new MaNV (you may want to implement a more sophisticated method)
                $query = "SELECT MAX(MaNV) as max_id FROM nhanvien";
                $result = $con->query($query);
                $row = $result->fetch_assoc();
                $MaNV = $row['max_id'] + 1;

                // Generate a new ID and MaLLV (you may want to implement a more sophisticated method)
                $query = "SELECT MAX(ID) as max_id FROM nhanvien";
                $result = $con->query($query);
                $row = $result->fetch_assoc();
                $ID = $row['max_id'] + 1;

                $query = "SELECT MAX(MaLLV) as max_id FROM nhanvien";
                $result = $con->query($query);
                $row = $result->fetch_assoc();
                $MaLLV = $row['max_id'] + 1;

                // Insert into nhanvien table
                $query = "INSERT INTO nhanvien (MaNV, HovaTenNV, NgaySinh, SoDT, ChucVu, GioiTinh, TrangThaiLamViec, EmailNV, ID, MaLLV) 
                        VALUES ('$MaNV', '$HovaTenNV', '$NgaySinh', '$SoDT', 'Bác sĩ', '$GioiTinh', 'Đang làm việc', '$EmailNV', '$ID', '$MaLLV')";
                $result1 = $con->query($query);

                // Insert into bacsi table
                $query = "INSERT INTO bacsi (MaNV, MaKhoa) VALUES ('$MaNV', '$MaKhoa')";
                $result2 = $con->query($query);

                $p->dongketnoi($con);
                return $result1 && $result2;
            }
            return false;
        }
    }
?> 
