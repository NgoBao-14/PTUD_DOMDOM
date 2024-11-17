<?php
    include_once('ketnoi.php');
    class mNVYT
    {
        public function getAllHD()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'select * from hoadon as h join chitiethoadon as hd on h.MaHD = hd.MaHD join benhnhan as b on h.MaBN=b.MaBN order by h.MaHD desc';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
            else
            {
                return false;
            }
     
        }

        public function getCTHD($MaHD)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT *
                            FROM hoadon AS h
                            JOIN chitiethoadon AS hd ON h.MaHD = hd.MaHD
                            JOIN benhnhan AS b ON h.MaBN = b.MaBN
                            WHERE h.MaHD = '.$MaHD.'
                            ORDER BY h.MaHD DESC';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
            else
            {
                return false;
            }
        }


        public function getAllNVYT()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'SELECT DISTINCT n.* FROM nhanvienyte AS yt JOIN nhanvien AS n ON yt.MaNV = n.MaNV WHERE n.TrangThaiLamViec = "Đang làm việc" ORDER BY yt.MaNV DESC';
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
            else
            {
                return false;
            }
        }
    
        public function getNVYT($MaNV)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $MaNV = mysqli_real_escape_string($con, $MaNV);
                $str = "SELECT * FROM nhanvienyte AS yt
                            JOIN nhanvien AS n ON yt.MaNV = n.MaNV
                            WHERE yt.MaNV = '$MaNV'";
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
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
        public function updateNVYT($MaNV, $NgaySinh, $GioiTinh, $SoDT, $Email)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $MaNV = mysqli_real_escape_string($con, $MaNV);
                $NgaySinh = mysqli_real_escape_string($con, $NgaySinh);
                $GioiTinh = mysqli_real_escape_string($con, $GioiTinh);
                $SoDT = mysqli_real_escape_string($con, $SoDT);
                $Email = mysqli_real_escape_string($con, $Email);
                
                $str = "UPDATE nhanvien SET NgaySinh = '$NgaySinh', GioiTinh = '$GioiTinh', SoDT = '$SoDT', Email = '$Email' WHERE MaNV = '$MaNV'";
                $result = $con->query($str);
                
                $p->dongketnoi($con);
                return $result ;
            }
            else
            {
                return false;
            }
        }
        public function checkDuplicatePhoneOrEmail($SoDT, $Email)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $SoDT = mysqli_real_escape_string($con, $SoDT);
                $Email = mysqli_real_escape_string($con, $Email);
                $query = "SELECT * FROM nhanvien WHERE SoDT = '$SoDT' OR Email = '$Email'";
                $result = $con->query($query);
                $p->dongketnoi($con);
                return $result->num_rows > 0;
            }
            return false;
        }
        public function addNVYT($HovaTen, $NgaySinh, $GioiTinh, $SoDT, $Email)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $HovaTen = mysqli_real_escape_string($con, $HovaTen);
                $NgaySinh = mysqli_real_escape_string($con, $NgaySinh);
                $GioiTinh = mysqli_real_escape_string($con, $GioiTinh);
                $SoDT = mysqli_real_escape_string($con, $SoDT);
                $Email = mysqli_real_escape_string($con, $Email);

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
                $query = "INSERT INTO nhanvien (MaNV, HovaTen, NgaySinh, SoDT, ChucVu, GioiTinh, TrangThaiLamViec, Email, ID, MaLLV) 
                        VALUES ('$MaNV', '$HovaTen', '$NgaySinh', '$SoDT', 'Nhân viên y tế', '$GioiTinh', 'Đang làm việc', '$Email', '$ID', '$MaLLV')";
                $result1 = $con->query($query);

                $p->dongketnoi($con);
                return $result1;
            }
            return false;
        }

        public function searchNVYT($searchTerm)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $searchTerm = mysqli_real_escape_string($con, $searchTerm);
                $str = "SELECT DISTINCT n.* FROM nhanvienyte AS yt 
                        JOIN nhanvien AS n ON yt.MaNV = n.MaNV 
                        WHERE (n.MaNV LIKE '%$searchTerm%' OR n.HovaTen LIKE '%$searchTerm%') 
                        AND n.TrangThaiLamViec = 'Đang làm việc' 
                        ORDER BY yt.MaNV DESC";
                $tblNVYT = $con->query($str);
                $p->dongketnoi($con);
                return $tblNVYT;
            }
            else
            {
                return false;
            }
        } 
    }

?>