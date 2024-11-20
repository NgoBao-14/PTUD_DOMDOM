<?php
    include_once('ketnoi.php');
    class mKhoa
    {
        public function getAllKhoa()
        {
            $p = new ketnoi;
            $con = $p->moketnoi();
            if($con)
            {
                $str = 'select * from chuyenkhoa';
                $tblKhoa = $con->query($str);
                $p->dongketnoi($con);
                return $tblKhoa;
            }
            else
            {
                return false;
            }
        }
    }
?>