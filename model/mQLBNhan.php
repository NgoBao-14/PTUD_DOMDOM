<?php
    include_once('ketnoi.php');
    class mBNhan
    {
        public function getAllBNhan()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'select * from benhnhan';
                $tblBNhan = $con->query($str);
                $p->dongketnoi($con);
                return $tblBNhan;
            }
            else
            {
                return false;
            }
        }

        public function get1BNhan($mabn)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = "select * from benhnhan where mabn = '$mabn'";
                $tblBNhan = $con->query($str);
                $p->dongketnoi($con);
                return $tblBNhan;
            }
            else
            {
                return false;
            }
        }

        //danh sách phiếu khám
        public function getPKham($mabn)
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = "SELECT 
            pk.MaPK AS MaPK,
            pk.NgayTao AS NgayTaoPhieuKham,
            nv.HovaTenNV AS BacSiPhuTrach,
            pk.KetQua AS KetQua
        FROM 
            phieukham pk
        JOIN 
            bacsi bs ON pk.MaBS = bs.MaNV
        JOIN 
            nhanvien nv ON bs.MaNV = nv.MaNV
        WHERE 
            pk.MaBN = $mabn";
                $tblBNhan = $con->query($str);
                $p->dongketnoi($con);
                return $tblBNhan;
            }
            else
            {
                return false;
            }
        }

        //chi tiết phiếu khám
        public function getCTPK($mapk)
{
    $p = new ketnoi();
    $con = $p->moketnoi(); // Open the connection

    if ($con) {
        // Create the SQL query with sanitized mapk
        $str = "SELECT 
    pk.MaPK AS MaPK,
    pk.NgayTao AS NgayTaoPhieuKham,
    nv.HovaTenNV AS BacSiPhuTrach,
    pk.KetQua AS KetQua
FROM 
    phieukham pk
JOIN 
    bacsi bs ON pk.MaBS = bs.MaNV
JOIN 
    nhanvien nv ON bs.MaNV = nv.MaNV
WHERE 
    pk.MaPK = $mapk;
";

        // Execute the query
        $tblBNhan = $con->query($str);

        // Close the connection
        $p->dongketnoi($con);

        // Check if query was successful
        if ($tblBNhan) {
            return $tblBNhan;
        } else {
            return false;
        }
    } else {
        // Could not establish the connection
        return false;
    }
}

    }
?>