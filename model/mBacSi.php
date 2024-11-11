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
    }
?>